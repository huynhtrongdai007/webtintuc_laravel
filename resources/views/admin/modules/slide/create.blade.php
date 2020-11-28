@extends('admin.master_layout')
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                        <form action="{{ route('admin.slide.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              
                                <label>Tên Slide</label>
                                <input class="form-control" value="{{old("Ten")}}" name="Ten" placeholder="Nhập tên slide" />
                                @error('Ten')
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
                                <label>Nội Dung</label>
                                <textarea rows="8" class="form-control" name="NoiDung" placeholder="Nhập Nội Dung">{{old('NoiDung')}}</textarea>
                                @error('NoiDung')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                              
                                <label>Link</label>
                                <input class="form-control" value="{{old("link")}}" name="link" placeholder="Nhập link" />
                                @error('link')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
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
