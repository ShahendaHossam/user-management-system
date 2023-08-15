<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function __invoke(Request $request)
    {
        switch (auth()->user()->role) {
            case 'user':
                return redirect()->route('user.dashboard');
                break;

            case 'admin':
                return redirect()->route('admin.dashboard');
                break;

            default:
            return redirect()->route('login');
                break;
        }
    }
}
