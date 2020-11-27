@extends('admin.master_layout')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('admin.news.update',['id'=>$getById->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" id="theloai">
                                <option value="">Chọn Thể Loại</option>
                                    @foreach ($getTheLoai as $item)
                                    <option 
                                    @if ($getById->loaitin->TheLoai->id == $item->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$item->id}}">{{$item->Ten}}</option>
                                    @endforeach
                                </select>
                               
                            </div>
                            @error('idTheLoai')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="idLoaiTin" id="loaitin">
                                <option value="">Chọn Loại Tin</option>
                                    @foreach ($getLoaiTin as $item)
                                    <option 
                                    @if ($getById->loaitin->id == $item->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$item->id}}">{{$item->Ten}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            @error('idLoaiTin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            <div class="form-group">
                              
                                <label>Tiêu Đề</label>
                                <input class="form-control" value="{{$getById->TieuDe}}" name="TieuDe" placeholder="Nhập Tiêu Đề" />
                                @error('TieuDe')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                            </div>
                        
                            <div class="form-group">
                                <label>Tóm Tắc</label>
                                <textarea class="form-control ckeditor" id="demo" rows="5" name="TomTat" placeholder="Nhập Tóm tắc">{{$getById->TomTat}}</textarea>
                                @error('TomTat')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control ckeditor" id="demo" rows="5" name="NoiDung" placeholder="Nhập Nội Dung">{{$getById->NoiDung}}</textarea>
                                @error('NoiDung')
                                <span class="text-danger">{{$message}}</span>
                               @enderror
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label><br/>
                                <img width="200px" src="{{asset("uploads/images/tintuc/{$getById->Hinh}")}}" alt="">
                                <input type="file"  name="Hinh" value="{{old('Hinh')}}">
                                @error('Hinh')
                                <span class="text-danger">{{$message}}</span>
                               @enderror
                            </div>
                          
                        
                            <div class="form-group">
                                <label>Tin Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" 
                                    @if ($getById->NoiBat == 0)
                                    {{"checked"}}
                                    @endif
                                    type="radio"> Không Nổi Bật
                                   
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" 
                                    @if ($getById->NoiBat == 1)
                                    {{"checked"}}
                                    @endif
                                    type="radio">Nổi Bật
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#theloai").change(function(){
                var idTheLoai = $(this).val();
                $.get("ajax_loaitin/"+idTheLoai,function(data){
                    $("#loaitin").html(data);
                });
            });
        });
    </script>
@endsection
