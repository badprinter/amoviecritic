<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegistrationController extends Controller
{
    public function __invoke(Request $request)
    {
        if(Auth::check()){
            redirect(route('user.private'));
        }
        $validateFiels = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required'
        ]);

        if(User::where('email', $validateFiels['email'])->exists() ){
            return redirect(route('user.registration')) ->withErrors([
                'formError' => "Произошла ошибка при создании пользователя!"
            ]);
        }

        $user = User::create($validateFiels);
        if($user){
            Auth::login($user);
            return redirect(route('user.private'));
        }

        return redirect(route('user.login')) ->withErrors([
            'formError' => "Произошла ошибка при создании пользователя!"
        ]);
    }
}
