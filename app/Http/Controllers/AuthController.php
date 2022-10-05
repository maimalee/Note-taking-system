<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): Factory|View|Application
    {
        if ($request->isMethod('post')){
            $data = $request->validate([
               'email' => 'required|email|min:4',
               'password' => 'required|min:4|max:100'
            ]);

//            $user = User::query()
//                ->where('email', $data['email'])
//                ->where('status', operator: User::STATUS_ACTIVE)
//                ->first();

        }

        return view('auth.login',[
            'showTopBar' => false,
            'showSideBar' => false,
            'showFooter' => false,

        ]);
    }
}
