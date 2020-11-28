<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use DateTime;
use session;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllTinTuc=TinTuc::orderBy('id','DESC')->get();
        return view('admin.modules.news.index',compact('getAllTinTuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getTheLoai = TheLoai::all();
        $getLoaiTin = LoaiTin::all();
        return view('admin.modules.news.create',compact('getTheLoai','getLoaiTin'));
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
            'TieuDe' => 'required|unique:tintuc,TieuDe|min:3|max:255',
            'idLoaiTin'=>'required',
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'Hinh'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->except('_token');
        $data['TieuDeKhongDau'] = Str::slug($request->TieuDe);
        $file = $request->file("Hinh");
        $data['created_at'] = new DateTime();
        if($file) {
          
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("uploads/images/tintuc/".$image)) {
                $image = Str::random(4)."_".$name;
            }
            $file->move('uploads/images/tintuc/',$image);
            $data['Hinh'] = $image;
        
        } else{
            $data['Hinh'] = '';
        }

        TinTuc::insert($data);
        return back()->with('message','Insertd Success');
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
        $getById = TinTuc::find($id);
        $getTheLoai = TheLoai::all();
        $getLoaiTin = LoaiTin::all();
        return view('admin.modules.news.edit',compact('getById','getTheLoai','getLoaiTin'));
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
        $hinh = TinTuc::find($id);
        $validatedData = $request->validate([
            'TieuDe' => 'required|min:3|max:255',
            'idLoaiTin'=>'required',
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'Hinh'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->except('_token');
        $data['TieuDeKhongDau'] = Str::slug($request->TieuDe);
        $file = $request->file("Hinh");
        $data['created_at'] = new DateTime();
        if($file) {
          
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("uploads/images/tintuc/".$image)) {
                $image = Str::random(4)."_".$name;
            }
            
            $file->move("uploads/images/tintuc/",$image);
            unlink("uploads/images/tintuc/".$hinh->Hinh);
            $data['Hinh'] = $image;
            
        }
       
        TinTuc::where('id',$id)->update($data);
        return redirect()->route('admin.news.index')->with('message','Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = TinTuc::find($id);
        TinTuc::where('id',$id)->delete();
        unlink("uploads/images/tintuc/".$img->Hinh);
        return redirect()->route('admin.news.index')->with('message','Deleted Success');
    }

    public function getLoaiTin($id)
    {   
        $loaitin = LoaiTin::where('idTheLoai',$id)->get();
      
        foreach($loaitin as $item) {
           echo"<option value='".$item->id."'>".$item->Ten."</option>";
        }
        
    }
}
