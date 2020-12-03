<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\User;
class AdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllUsers = User::all();
        return view('admin.modules.users.index',compact('getAllUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|max:8',
            're_password'=>'required|same:password'        
            ]);
        $data = $request->except('_token','re_password');
        $data['password'] = Bcrypt($request->password);
        $data['created_at'] = new DateTime();
        User::insert($data);
        return back()->with('message','Inserted SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getById = User::find($id);
        return view('admin.modules.users.edit',compact('getById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',     
            ]);
        $data = $request->except('_token','re_password','changePassword');
      
        $data['updated_at'] = new DateTime();
        if($request->changePassword=="on") {
            $validatedData = $request->validate([
                'password'=>'required|max:8',
                're_password'=>'required|same:password'        
                ]);
            $data['password'] = Bcrypt($request->password);
        }
        User::where('id',$id)->update($data);
        return back()->with('message','Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('admin.user.index')->with('message','Deleted SuccessFully');
    }

    public function ViewLoginAdmin()
    {
        return view('admin.login');
    }

    public function progressLogin(Request $request)
    {
        $credentials = $request->only('email','password');	

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return view('admin.dashboard');
        } else {
        	return redirect()->route('admin.login')->with('message','Email or Password wrong');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
