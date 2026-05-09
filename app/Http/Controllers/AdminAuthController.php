<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin-login');
    }

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if($admin && Hash::check($request->password, $admin->password)){

            session([
                'admin_logged_in' => true
            ]);

            return redirect('/admin');
        }

        return back()->with('error', 'Identifiants incorrects');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');

        return redirect('/admin-login');
    }
}
