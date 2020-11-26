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
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="" id="theloai">
                                <option value="">Chọn Thể Loại</option>
                                    @foreach ($getTheLoai as $item)
                                    <option value="{{$item->id}}">{{$item->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="idLoaiTin" id="loaitin">
                                <option value="">Chọn Loại Tin</option>
                                    @foreach ($getLoaiTin as $item)
                                    <option value="{{$item->id}}">{{$item->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Username" />
                            </div>
                        
                            <div class="form-group">
                                <label>Tóm Tắc</label>
                                <textarea class="form-control" rows="3" name="txtIntro"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea class="form-control" rows="3" name="txtContent"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input type="file" name="fImages">
                            </div>
                          
                        
                            <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
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
