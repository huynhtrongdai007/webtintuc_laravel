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
                                    <th>Ten</th>
                                    <th>Hinh</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getAllSlide as $item)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->Ten}}</td>
                                        <td><img width="100px" src="{{asset("uploads/slide/{$item->Hinh}")}}" alt=""></td>
                                        <td>{{$item->link}}</td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.slide.destroy', ['id'=>$item->id]) }}"> Delete</a> | 
                                            <i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.slide.edit',['id'=>$item->id])}}">Edit</a></td>
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