@extends('master_layout')
@section('content')
      <!-- Page Content -->
      <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
				
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
					  <div class="panel-heading">Đăng ký tài khoản</div>
					  <?php
				$message = Session::get('message');
				if($message)
				 {
				   echo"<div class='alert alert-success'>$message</div>";
				   Session::put('message',null);
				 }
			  ?>
				  	<div class="panel-body">
				    	<form action="{{ route('storeregister') }}" method="POST">
							@csrf
							<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" value="{{old('name')}}" placeholder="Username" name="name" aria-describedby="basic-addon1">
								@error('name')
									<div class="text-danger">{{$message}}</div>
								@enderror
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="{{old('email')}}" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
								  @error('email')
								  <div class="text-danger">{{$message}}</div>
							     @enderror
							</div>
							<br>	
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
								  @error('password')
								  <div class="text-danger">{{$message}}</div>
							     @enderror
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
								  @error('passwordAgain')
								  <div class="text-danger">{{$message}}</div>
							     @enderror
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng ký
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->  
@endsection
