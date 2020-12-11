@extends('master_layout')
@section('content')
     <!-- Page Content -->
     <div class="container">

    	<!-- slider -->
            @include('layout.slide')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : Trường Cao Dẳng Viễn Đông</h4>
                        <p></p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>daihuynhtrong@viendong.edu.vn</p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>028 3891 1111</p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15673.88357485709!2d106.6281711!3d10.8517441!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc623b505cddae0bf!2zQ2FvIMSR4bqzbmcgVmnhu4VuIMSQw7RuZw!5e0!3m2!1svi!2s!4v1607652146158!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection
   