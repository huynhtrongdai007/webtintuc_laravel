@extends('admin.master_layout')
@section('content')
       <!-- Page Content -->
       <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Edit</small>
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
                    <form action="{{route('admin.user.update',['id'=>$getById->id])}}" method="POST">
                        @csrf   
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="name" value="{{$getById->name}}"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="changePassword" id="changePassword">
                            <label>Password</label>
                            <input type="password" class="form-control password" disabled  name="password" placeholder="Please Enter Password" />
                        </div>
                        <div class="form-group">
                           
                            <label>RePassword</label>
                            <input type="password" class="form-control password" disabled name="re_password" placeholder="Please Enter RePassword" />
                        </div>
                   
                        <div class="form-group">
                            <label>User Level</label>
                            <label class="radio-inline">
                                <input name="level" value="0" checked="" type="radio">Thành Viên
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="1" type="radio">Admin
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">User Edit</button>
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
        $(document).ready(function() {
            $("#changePassword").change(function() {
                if($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled','');
                }

            });
        });
    </script>
@endsection