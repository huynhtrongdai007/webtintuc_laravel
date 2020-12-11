<div class="col-md-9">
    <div class="panel panel-default">            
        <div class="panel-heading" style="background-color:#337AB7; color:white;" >
            <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
        </div>

        <div class="panel-body">
            <!-- item -->
            @foreach ($theloai as $tl)
            @if (count($tl->loaitin) > 0)
            <div class="row-item row">
                <h3>
                    <a href="{{ route('category',['id'=>$tl->id,'TenKhongDau'=>$tl->TenKhongDau]) }}">{{$tl->Ten}}</a> | 	
                    @foreach ($tl->loaitin as $lt)
                     <small><a href="{{ route('category', ['id'=>$lt->id,'/','TenKhongDau'=>$lt->TenKhongDau]) }}"><i>{{$lt->TenKhongDau}}</i></a>/</small>
                    @endforeach
                </h3>
                @php
                    $data = $tl->tintuc->where('NoiBat',1)->SortByDesc('created_at')->take(5);
                    $news =  $data->shift();

                @endphp
                <div class="col-md-8 border-right">
                    <div class="col-md-5">
                        <a href="{{ route('detail', ['id'=>$news->id,'TenKhongDau'=>$news->TieuDeKhongDau]) }}">
                            <img class="img-responsive" src="uploads/tintuc/{{$news['Hinh']}}" alt="">
                        </a>
                    </div>

                    <div class="col-md-7">
                        <h3>{{$news['TieuDe']}}</h3>
                        <p>{{$news['TomTat']}}</p>
                      
                        <a class="btn btn-primary" href="{{ route('detail', ['id'=>$news['id'],'/','TenKhongDau'=>$news['TieuDeKhongDau'] ]) }}">{{$news['TenKhongDau']}}  Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>

                </div>
                

                <div class="col-md-4">
                    @foreach ($data->all() as $tintuc)
                    <a href="{{ route('detail',['id'=>$tintuc->id,'/','TenKhongDau'=>$tintuc->TieuDeKhongDau]) }}">
                        <h4>
                            <span class="glyphicon glyphicon-list-alt"></span>
                           {{$tintuc->TieuDe}}
                        </h4>
                    </a>
                    @endforeach
                    
                </div>
                
                <div class="break"></div>
            </div>
            @endif
            
            @endforeach
           
            <!-- end item -->


        </div>
    </div>
</div>