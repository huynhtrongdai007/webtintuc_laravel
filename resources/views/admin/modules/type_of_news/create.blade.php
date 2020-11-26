@extends('admin.master_layout')

@section('content')
       <!-- Page Content -->
       <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Tin
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
                  
                    <form action="{{ route('admin.typeofnews.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Parent</label>
                            <select class="form-control" name="idTheLoai">
                                <option value="">Thể loại</option>
                                @foreach ($getCategory as $item)
                                   <option value="{{$item->id}}">{{$item->Ten}}</option>
                                @endforeach
                              
                            </select>
                            @error('idTheLoai')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" value="{{old('Ten')}}" name="Ten" placeholder="Please Enter Category Name" />
                            @error('Ten')
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