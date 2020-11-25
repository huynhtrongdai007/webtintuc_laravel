<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TheLoai;
use DateTime;
use Illuminate\Support\Str;
use App\Components\Recusive;
class CategoryController extends Controller
{

    private $htmlselect;
    public function __construct() {
        $this->htmlselect = '';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllData = TheLoai::all();
        return view('admin.modules.categorys.index',compact('getAllData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getAllData = TheLoai::all();
        return view('admin.modules.categorys.create',compact('getAllData'));
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
            'Ten' => 'required|unique:theloai|min:3|max:255'
        ]);
        $data = $request->except('_token');
        $data['TenKhongDau'] = Str::slug($request->Ten);
        $data['created_at'] = new DateTime();
        TheLoai::insert($data);
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

    public function getCategory($parent_id) {
        $data = TheLoai::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getById = TheLoai::find($id);
        $htmlOption = $this->getCategory($getById->parent_id);
        return view('admin.modules.categorys.edit',compact('getById','htmlOption'));
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
        $data = $request->except('_token');
        $data['updated_at'] = new DateTime();
        $data['TenKhongDau'] = Str::slug($request->Ten);
        TheLoai::where('id',$id)->update($data);
        return redirect()->route('admin.category.index')->with('message','Update SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return back()->with('message','Delete SuccessFully');


    }
}
