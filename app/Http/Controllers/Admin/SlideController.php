<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
use DateTime;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllSlide = Slide::all();
        return view('admin.modules.slide.index',compact('getAllSlide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.slide.create');
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
            'Ten' => 'required|unique:slide,Ten|min:3|max:255',
            'NoiDung'=>'required',
            'link'=>'required',
            'Hinh'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data = $request->except('_token');
        $file = $request->file("Hinh");
        $data['created_at'] = new DateTime();
        
        if($file) {
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("uploads/slide/".$image)) {
                $image = Str::random(4)."_".$name;
            }
            $file->move("uploads/slide/",$image);
            $data["Hinh"] = $image;
        } else {
            $data["Hinh"] = '';
        }

        Slide::insert($data);    

        return back()->with('message','Inserd SeccessFully');
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
        $getById = Slide::find($id);
        return view('admin.modules.slide.edit',compact('getById'));
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
            'NoiDung'=>'required',
            'link'=>'required',
            'Hinh'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data = $request->except('_token');
        $hinh = Slide::find($id);
        $file = $request->file("Hinh");
        $data['updated_at'] = new DateTime();
        
        if($file) {
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("uploads/slide/".$image)) {
                $image = Str::random(4)."_".$name;
            }

            $file->move("uploads/slide/",$image);
            unlink("uploads/slide/".$hinh->Hinh);
            $data["Hinh"] = $image;
        } 
        Slide::insert($data);    

        return redirect()->route('admin.slide.index')->with('message','Updated SeccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hinh = Slide::find($id);
        unlink("uploads/slide/".$hinh->Hinh);
        Slide::where('id',$id)->delete();
        return redirect()->route('admin.slide.index')->with('message','Deleted SeccessFully');
    }
}
