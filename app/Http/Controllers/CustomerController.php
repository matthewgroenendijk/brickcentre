<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data = User::latest()->paginate(5);

        return view('users.index', compact('data'));
    }
}
