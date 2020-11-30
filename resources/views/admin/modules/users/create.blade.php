@extends('admin.master_layout')
@section('content')
      <!-- Page Content -->
      <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
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
                    <form action="{{route('admin.user.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="name" value="{{old('name')}}" placeholder="Please Enter Username" />
                            @error('name')
                                <span class="text-danger">{{$message}}</span>   
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control"  name="password" placeholder="Please Enter Password" />
                            @error('password')
                                <span class="text-danger">{{$message}}</span>   
                             @enderror
                        </div>
                        <div class="form-group">
                            <label>RePassword</label>
                            <input type="password" class="form-control" name="re_password" placeholder="Please Enter RePassword" />
                            @error('re_password')
                            <span class="text-danger">{{$message}}</span>  
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{old('email')}}"  name="email" placeholder="Please Enter Email" />
                            @error('email')
                            <span class="text-danger">{{$message}}</span>  
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>User Level</label>
                            <label class="radio-inline">
                                <input name="level" value="0" checked type="radio">Thành viên
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="1" type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">User Add</button>
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