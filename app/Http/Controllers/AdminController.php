<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function admin(){
        

        return view('admin');
    }
}
