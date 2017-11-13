<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    public function index()
    {
        return view('spa');
    }

    public function textEditor()
    {
        return view('texteditor');
    }

    public function textEditorStore(Request $request)
    {
        dd($request);
    }
}
