@extends('master_layout')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$loaitin->Ten}}</b></h4>
                    </div>
            
                    @foreach ($tintuc as $item)
                    <div class="row-item row">
                        <div class="col-md-3">
            
                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="{{asset("uploads/tintuc/{$item->Hinh}")}}" alt="">
                            </a>
                        </div>
            
                        <div class="col-md-9">
                            <h3>{{$item->TieuDe}}</h3>
                            <p>{{$item->TomTat}}</p>
                            <a class="btn btn-primary" href="detail.html">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                  
            
       
            
                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <ul class="pagination">
                               {{$tintuc->links()}}
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
            
                </div>
            </div> 
        </div>
    </div>
    <!-- end Page Content -->
@endsection