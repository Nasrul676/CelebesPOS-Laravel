<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;


class logoutController extends Controller
{
    public function logoutSession(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Alert::toast('Log Out Berhasil..!', 'success');

        return redirect()->route('login');
    }
}
