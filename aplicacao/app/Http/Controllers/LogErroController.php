<?php

namespace App\Http\Controllers;

use App\Models\LogErro;
use Illuminate\Http\Request;

class LogErroController extends Controller
{
    public function index()
    {
        $logs = LogErro::all();

        return view('LogErro', compact('logs'));
    }

    public function show($id)
    {
        $log = LogErro::findOrFail($id);

        return view('LogErro', compact('log'));
    }
}
