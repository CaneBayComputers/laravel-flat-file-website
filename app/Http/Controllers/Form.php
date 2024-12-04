<?php 

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\FormSubmission;
use ElFactory\IpApi\IpApi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Jenssegers\Agent\Agent;

class Form extends Controller
{
    public function process(Request $request, Agent $agent, $form_name)
    {
        $form = _c('form.names' . $form_name);

        if ( ! $form ) abort(404);

        $form_data = $request->all();

        $validator = Validator::make($form_data, $form['rules']);

        if ( ! empty($form_data['return_to']))
        {
            $redirect = redirect($form_data['return_to']);
        }

          else
        {
            $redirect = back();
        }

        if( $validator->fails() )
        {
            return $redirect->withErrors($validator)->withInput();
        }

        $remoteip = $_SERVER['REMOTE_ADDR'];

        $form_data['timestamp'] = now()->toDayDateTimeString() . ' GMT';

        $form_data['device'] = $agent->device();

        $form_data['device_type'] = ucwords($agent->deviceType());

        $form_data['platform'] = $agent->platform();

        $form_data['browser'] = $agent->browser();

        $form_data['languages'] = implode(', ', $agent->languages());


        // Reject too many attempts with same IP
        $cache_key = 'form-' . $form_name . '-attempt-' . $remoteip;

        if( ! $req_count = Cache::get($cache_key) )
        {
            $req_count = 1;

            Cache::add($cache_key, $req_count, _c('form.ip_attempt_timeframe_seconds'));
        }

        if( ! is_dev() && $req_count > _c('form.ip_max_attempts_per_timeframe') )
        {
            return $redirect->withErrors(['Too many attempts'])->withInput();
        }

        Cache::increment($cache_key);


        // Eval user agent
        if( $form_data['device_type'] == 'Robot' )
        {
            return $redirect->withErrors(['Device type is robot'])->withInput();
        }


        // Check message for links
        if( ! empty($form_data['message']) )
        {
            if( preg_match('/http(s)*:/i', $form_data['message']) )
            {
                return $redirect->withErrors(['Please remove links'])->withInput();
            }
        }


        // Recaptcha
        $recaptcha_data = [
            'secret' => _c('form.recaptcha.secret_key'),
            'response' => $form_data['recaptcha'],
            'remoteip' => $remoteip,
        ];

        try
        {
            $response = Http::timeout(2)->asForm()->post(_c('form.recaptcha.url'), $recaptcha_data);

            $recaptcha_result = $response->json();

            $request_data['recaptcha_result'] = $recaptcha_result;

            if( ! isset($recaptcha_result['score']) )
            {
                throw new Exception('Recaptcha score returned blank');
            }

            if ( $recaptcha_result['score'] < _c('form.recaptcha.threshold') )
            {
                throw new Exception('Request appears automated');
            }
        }

        catch(Exception $e)
        {
            Log::error($e);

            return $redirect->withErrors([$e->getMessage()])->withInput();
        }


        // IP info
        $form_data['ip'] = $remoteip;

        if( ! is_dev() )
        {
            try
            {
                $form_data['ip'] = IpApi::default($remoteip)->lookup();
            }

            catch(Exception $e)
            {
                Log::warning($e);
            }
        }


        // Unset unecessary data
        unset($form_data['g-recaptcha-response']);

        unset($form_data['recaptcha']);

        unset($form_data['_token']);


        // Save to database in case we don't get the email
        $form_submission = new FormSubmission;

        $form_submission->data = $form_data;

        $form_submission->save();


        // Log, save and email form
        if( is_dev() ) _l($form_data);

        if( $form['mail_to'] ) Mail::to($form['mail_to'])->send(new ContactForm($form_data));

        return $redirect->with('success', true);
    }
}