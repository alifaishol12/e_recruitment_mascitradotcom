<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function create()
    {
        return view('form.dokumen.create');
    }
}
