<?php

return [

	'ip_attempt_timeframe_seconds' => 15,

	'ip_max_attempts_per_timeframe' => 3,

	'recaptcha' => [

		'site_key' => env('RECAPTCHA_SITE_KEY'),

		'secret_key' => env('RECAPTCHA_SECRET_KEY'),

        'url' => 'https://www.google.com/recaptcha/api/siteverify',

        'threshold' => 0.7,
    ],

	'names' => [

		'contact' => [

			'subject' => env('APP_NAME', 'Laravel') . ' Contact Form',

			'rules' => [
				'email' => 'required_without:phone|email|max:100',
				'phone' => 'required_without:email|max:100',
				'recaptcha' => 'required|string',
				'message' => 'required|string|max:2000',
				'name' => 'required_without:company|string|min:2|max:100',
				'company' => 'required_without:name|string|min:2|max:100',
				'timezone' => 'string',
				'return_to' => 'string',
			],

			'mail_to' => env('CONTACT_FORM_MAIL_TO'),
		],
	],
];