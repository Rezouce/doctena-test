<?php

namespace App\Http\Controllers;

class LogController extends Controller
{

    public function index()
    {
        return view('logs/index', [
            'logs' => explode("\n", \Storage::disk('logs')->get('laravel.log'))
        ]);
    }
}
