@extends('admin.master_layout')
@section('content')
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Product
                                <small>List</small>
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Hinh</th>
                                    <th>Tiêu Đề</th>
                                    <th>Tóm Tắt</th>
                                    <th>Thể Loại</th>
                                    <th>Loại Tin</th>
                                    <th>Xem</th>
                                    <th>Nổi Bật</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getAllTinTuc as $item)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$item->id}}</td>
                                        <td><img width="100px" src="{{asset("uploads/images/tintuc/{$item->Hinh}")}}" alt=""></td>
                                        <td>{{$item->TieuDe}}</td>
                                        <td>{{$item->TomTat}}</td>
                                        <td>{{$item->loaitin->theloai->Ten}}</td>
                                        <td>{{$item->loaitin->Ten}}</td>
                                        <td>{{$item->SoLuotXem}}</td>
                                        <td>{{$item->NoiBat}}</td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.news.destroy', ['id'=>$item->id]) }}"> Delete</a> | 
                                            <i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.news.edit',['id'=>$item->id])}}">Edit</a></td>
                                      
                                    </tr>
                                @endforeach
                                
                              
                            </tbody>
                        </table>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
@endsection