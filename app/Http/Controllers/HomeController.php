<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends BasePrivatController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->is_activ_profil){
            $users = DB::table('users')
                ->where('show_profil', 1)
                ->where('is_activ_profil', 1)
                ->where('is_company', 0)
                ->get();
            return view('home', [
                'users' => $users,
                'isList' => true
            ]);
        }

        return view('home', [
            'users' => null,
            'isList' => true
        ]);

    }
}
