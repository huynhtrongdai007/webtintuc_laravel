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
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
						<form action="{{ route('update_account') }}" method="POST">
							@csrf
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" value="{{auth()->user()->name}}" placeholder="Username" name="name" aria-describedby="basic-addon1">
								@error('name')
									<div class="text-danger">{{$message}}</div>	
								@enderror
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="{{auth()->user()->email}}" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	disabled
								  >
								 
							</div>
							<br>	
							<div>
								<input type="checkbox" name="changePassword" id="changePassword" name="checkpassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" disabled class="form-control password" name="password" aria-describedby="basic-addon1">
								  @error('password')
								  <div class="text-danger">{{$message}}</div>	
							  @enderror
							
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" disabled class="form-control password" name="passwordAgain" aria-describedby="basic-addon1">
								  @error('passwordAgain')
								  	<div class="text-danger">{{$message}}</div>	
							 	 @enderror
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>

						</form>
						<?php
							$message = Session::get('message');
							if($message)
							{
								echo"<div class='alert alert-success'>$message</div>";
								Session::put('message',null);
							}
                	    ?>
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
@section('script')
	<script>
		$(document).ready(function(){
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