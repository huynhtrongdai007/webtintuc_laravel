@extends('admin.master_layout')
@section('content')
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <?php
                      $message = Session::get('message');
                      if($message)
                       {
                         echo"<div class='alert alert-success'>$message</div>";
                         Session::put('message',null);
                       }
                    ?>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category Parent</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($getAllData as $item)
                             <tr class="even gradeC" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->Ten}}</td>
                                <td>{{$item->parent_id}}</td>
                                <td>{{$item->TenKhongDau}}</td>
                                <td>
                                    @if($item->trangthai==1)
                                    <input type="checkbox" class="category_status_off" id="{{$item->id}}" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                    @else
                                     <input type="checkbox" class="category_status_on" id="{{$item->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{ route('admin.category.destroy', ['id'=>$item->id]) }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.category.edit', ['id'=>$item->id]) }}">Edit</a></td>
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