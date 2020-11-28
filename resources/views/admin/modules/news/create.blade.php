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
                        <?php
                        $message = Session::get('message');
                        if($message)
                         {
                           echo"<div class='alert alert-success'>$message</div>";
                           Session::put('message',null);
                         }
                      ?>
                        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" id="theloai">
                                <option value="">Chọn Thể Loại</option>
                                    @foreach ($getTheLoai as $item)
                                    <option value="{{$item->id}}">{{$item->Ten}}</option>
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
                                    <option value="{{$item->id}}">{{$item->Ten}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            @error('idLoaiTin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            <div class="form-group">
                              
                                <label>Tiêu Đề</label>
                                <input class="form-control" value="{{old("TieuDe")}}" name="TieuDe" placeholder="Nhập Tiêu Đề" />
                                @error('TieuDe')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                            </div>
                        
                            <div class="form-group">
                                <label>Tóm Tắc</label>
                                <textarea class="form-control ckeditor" id="demo" rows="5" name="TomTat" placeholder="Nhập Tóm tắc">{{old("TomTat")}}</textarea>
                                @error('TomTat')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control ckeditor" id="demo" rows="5" name="NoiDung" placeholder="Nhập Nội Dung">{{old("NoiDung")}}</textarea>
                                @error('NoiDung')
                                <span class="text-danger">{{$message}}</span>
                               @enderror
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input type="file" name="Hinh" value="{{old('Hinh')}}">
                                @error('Hinh')
                                <span class="text-danger">{{$message}}</span>
                               @enderror
                            </div>
                          
                        
                            <div class="form-group">
                                <label>Tin Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" checked="" type="radio">Nổi Bật
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" type="radio">Không Nổi Bật
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
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
