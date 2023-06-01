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

    public function show(User $user, Request $request)
    {

        $customer = User::find($user->id);

        return view('users.show', compact('customer'));
    }
}
