<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use DateTime;
use Illuminate\Support\Str;

class TypeOfNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllLoaiTin = LoaiTin::all();
        return view('admin.modules.type_of_news.index',compact('getAllLoaiTin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getCategory = TheLoai::all();
        return view('admin.modules.type_of_news.create',compact('getCategory'));
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
            'Ten' => 'required|min:3|max:255',
            'idTheLoai' => 'required'
        ]);
        $data = $request->except('_token');
        $data['TenKhongDau'] = Str::slug($request->Ten);
        $data['created_at'] = new DateTime(); 
        LoaiTin::insert($data);
        return back()->with('message','insert SuccessFully');
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
        $getCategory = TheLoai::all();
        $getById = LoaiTin::find($id);
        return view('admin.modules.type_of_news.edit',compact('getCategory','getById'));
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
            'Ten' => 'required|min:3|max:255',
            'idTheLoai' => 'required'
        ]);
        $data = $request->except('_token');
        $data['updated_at'] = new DateTime();
        $data['TenKhongDau'] = Str::slug($request->Ten);
        LoaiTin::where('id',$id)->update($data);
        return redirect()->route('admin.typeofnews.index')->with('message','Update SuccessFully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LoaiTin::where('id',$id)->delete();
        return back()->with('message','Delete SuccessFully');
    }
}
