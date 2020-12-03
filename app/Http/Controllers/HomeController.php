<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
class HomeController extends Controller
{

    function __construct() {
        $theloai = TheLoai::all();
        view()->share('theloai',$theloai);
        
    }
    
    public function home() {
   
        return view('pages.home');
    }

    public function login() {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function contact() {
       
        return view('pages.contact');
    }

    public function about() {
  
        return view('pages.about');
    }
}
