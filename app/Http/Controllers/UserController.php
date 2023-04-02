<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        Session::forget('user_id');
        return view('user.index');
    }

    public function startQuiz(Request $request)
    {
        $name = $request->input('name');
        if (!empty($name)) {
            $user = User::create([
                'name' => $request->name
            ]);

            Session::put('user_id', $user->id);

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Please enter your name.']);
        }
    }
}
