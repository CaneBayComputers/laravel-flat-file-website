--- Info
Name: {!! $form_data['name']!!}
Phone: {!! $form_data['phone']!!}
Email: {!! $form_data['email']!!}
Message: {!! $form_data['message']!!}
--- End info

--- Details
{!! json_encode($form_data, JSON_PRETTY_PRINT) !!}
--- End details