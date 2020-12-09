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
                                <th>Tên User</th>
                                <th>Tin Tức</th>
                                <th>Noi Dung</th>
                                <th>Ngày bình luận</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($getAllComments as $item)
                             <tr class="even gradeC" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->tintuc->TieuDe}}</td>
                                <td>{{$item->NoiDung}}</td>
                                <td>{{$item->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{ route('admin.comment.destroy', ['id'=>$item->id]) }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.category.edit', ['id'=>$item->id]) }}">show</a></td>
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
