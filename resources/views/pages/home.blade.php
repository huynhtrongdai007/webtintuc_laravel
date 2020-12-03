@extends('master_layout')
@section('content')
        <!-- Page Content -->
        <div class="container">

            <!-- slider -->
                @include('layout.slide')
            <!-- end slide -->
    
            <div class="space20"></div>
    
    
            <div class="row main-left">
                <!--menu-left -->
                    @include('layout.menu')
                <!--end-menu-left-->
                @include('layout.content')
            </div>
            <!-- /.row -->
        </div>
        <!-- end Page Content -->
    
@endsection
