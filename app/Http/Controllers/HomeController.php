<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    function __construct() {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('slide',$slide);
        view()->share('theloai',$theloai);
        if(Auth::check()===true) {
            view()->share('user',Auth::user());
        }
    }
    
    public function home() {
   
        return view('pages.home');
    }

    public function login() {
        return view('pages.login');
    }

    public function progressLogin(Request $request) {

            $credentials = $request->only('email','password');	

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect('home');
            } else {
                return redirect()->route('login')->with('message','Email or Password wrong');
            }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');  
    }

    public function register()
    {
        return view('pages.register');
    }

    public function storeregister(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email'=>'required|email',  
            'password'=>'required|max:8',
            'passwordAgain'=>'required|same:password'           
            ]);
        $data = $request->except('_token','passwordAgain');
        $data['password'] = Bcrypt($request->password);
        $data['created_at'] = new DateTime();
        User::insert($data);
        return back()->with('message','Register SuccessFully');
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

    public function account() {
        return view('pages.account');
    }

    public function update_account(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',     
            ]);
        $data = $request->except('_token','checkpassword','passwordAgain');
      
        $data['updated_at'] = new DateTime();
        if($request->changePassword=="on") {
            $validatedData = $request->validate([
                'password'=>'required|max:8',
                'passwordAgain'=>'required|same:password'        
                ]);
            $data['password'] = Bcrypt($request->password);
        }
        $id = auth()->user()->id;
        User::where('id',$id)->update($data);
        return back()->with('message','Updated SuccessFully');
    }

    public function search(Request $request) {
        $tukhoa = $request->tukhoa;
       
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")
        ->orWhere('TomTat','like',"%$tukhoa%")
        ->orWhere('NoiDung','like',"%$tukhoa%")
        ->take(30)->paginate(5);
     
        return view('pages.search',compact('tukhoa','tintuc'));
    }
    
   
}
