<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    $view = 'content.index';

    if( ! View::exists($view)) abort(404);

    return view($view);
});

Route::post('forms/{form}', 'Form@process')->where('form', '^[A-Za-z0-9_\-]+$');

Route::get('{slug}', function ($template) {
    if($template == '') $template = 'index';

    $view = 'content.' . str_replace('/', '.', $template);

    if( ! View::exists($view)) abort(404);

    return view($view);
})->where('slug', '^[A-Za-z0-9_\/\-]+$');
