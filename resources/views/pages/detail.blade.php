@extends('master_layout')
@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{asset("uploads/tintuc/$tintuc->Hinh")}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>Posted on: {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{!! $tintuc->NoiDung !!}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::check()===true)
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="{{ route('admin.comment.store', ['id'=>$tintuc->id]) }}" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <textarea required class="form-control" name="NoiDung" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                <hr>
                @endif
                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach ($tintuc->comment as $item)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$item->user->name}}
                            <small>{{$item->created_at}}</small>
                        </h4>
                        {{$item->NoiDung}}
                    </div>
                </div>
                @endforeach
               

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach ($tinlienquan as $item)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="{{ route('detail', ['id'=>$item->id]) }}">
                                    <img class="img-responsive" src="{{ asset("uploads/tintuc/$item->Hinh")}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="{{ route('detail', ['id'=>$item->id]) }}"><b>{{$item->TieuDe}}</b></a>
                            </div>
                            <p>{{$item->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                       
                        <!-- end item -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach ($tinnoibat as $item)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="{{ route('detail', ['id'=>$item->id]) }}">
                                    <img class="img-responsive" src="{{ asset("uploads/tintuc/$item->Hinh")}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="{{ route('detail', ['id'=>$item->id]) }}"><b>{{$item->TieuDe}}</b></a>
                            </div>
                            <p>{{$item->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                      
                        <!-- end item -->
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
    @endsection