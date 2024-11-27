<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CadreController extends Controller
{
    public function index()
    {
        return view('admin.cadre.index');
    }
}
