@extends('master_layout')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm Kiếm: {{$tukhoa}}</b></h4>
                    </div>
                    @php
                          function doimau($text,$tukhoa) {
                            preg_match_all('~\w+~', $tukhoa, $m);
                            if(!$m)
                                return $text;
                            $re = '~\\b(' . implode('|', $m[0]) . ')\\b~';
                            return preg_replace($re, '<b style="color:yellow">$0</b>', $text);
                        }
                    @endphp     
                    @foreach ($tintuc as $item)
                    <div class="row-item row">
                        <div class="col-md-3">
            
                            <a href="{{ route('detail', ['id'=>$item->id,'TenKhongDau'=>$item->TieuDeKhongDau]) }}">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="{{asset("uploads/tintuc/{$item->Hinh}")}}" alt="">
                            </a>
                        </div>
            
                        <div class="col-md-9">
                            <h3>{!! doimau($item->TieuDe,$tukhoa) !!}</h3>
                            <p>{{$item->TomTat}}</p>
                            <a class="btn btn-primary" href="{{ route('detail', ['id'=>$item->id,'TenKhongDau'=>$item->TieuDeKhongDau]) }}">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
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