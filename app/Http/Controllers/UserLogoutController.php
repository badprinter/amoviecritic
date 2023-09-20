<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogoutController extends Controller
{
    public function __invoke(Request $request){
        Auth::logout();
        return redirect(route('user.login'));
    }
}
