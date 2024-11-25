<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NatureController extends Controller
{
    public function index()
    {
        return view('admin.nature.index');
    }
}
