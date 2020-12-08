<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;

class HomeController extends Controller
{

    function __construct() {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('slide',$slide);
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

    public function category($id) {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.category',compact('loaitin','tintuc'));
    }

    public function detail($id) {
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        TinTuc::where('id', $id)->update(['SoLuotXem' => $tintuc->SoLuotXem+1]);  
        return view('pages.detail',compact('tintuc','tinnoibat','tinlienquan'));
    }
}
