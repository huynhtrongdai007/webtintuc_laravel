@extends('master_layout')
@section('content')
        <!-- Page Content -->
        <div class="container">

            <!-- slider -->
            <div class="row carousel-holder">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                          <div class="panel-heading">Đăng nhập</div>
                          <div class="panel-body">
                            <form action="{{ route('progressLogin') }}" method="POST">
                                @csrf
                                <div>
                                    <label>Email</label>
                                      <input type="email" required class="form-control" placeholder="Email" name="email">
                                     
                                </div>
                                <br>	
                                <div>
                                    <label>Mật khẩu</label>
                                    <input type="password" required class="form-control" name="password">
                                    
                                </div>
                                <br>
                                <button type="submit" class="btn btn-default">Đăng nhập
                                </button>
                                <?php
                                $message = Session::get('message');
                                if($message)
                                 {
                                   echo"<div class='alert alert-danger'>$message</div>";
                                   Session::put('message',null);
                                 }
                              ?>
                            </form>
                          </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <!-- end slide -->
        </div>
        <!-- end Page Content -->
    
@endsection
