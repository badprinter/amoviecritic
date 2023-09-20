<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function __invoke(Request $request){
        $data = $request->only(['email', 'password']);
        if(Auth::attempt($data)){
            return redirect()->intended(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизироваться!'
        ]);
    }
}
