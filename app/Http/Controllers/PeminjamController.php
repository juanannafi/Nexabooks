<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function home(){
        return view('desain.landing_page');
    }

    public function about(){
        return view('desain.about');
    }

    public function best(){
        return view('desain.best');
    }

    public function contact(){
        return view('desain.contact');
    }
}
