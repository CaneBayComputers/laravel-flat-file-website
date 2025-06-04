<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function show($slug)
    {
        $view = 'content.' . str_replace('/', '.', $slug);

        return view($view);
    }
}
