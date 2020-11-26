@extends('admin.master_layout')

@section('content')
       <!-- Page Content -->
       <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Tin
                        <small>Edit</small>
                    </h1>
                </div>
               
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">  
                    <form action="{{ route('admin.typeofnews.update',['id'=>$getById->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>The Loai</label>
                            <select class="form-control" name="idTheLoai">
                                <option value="">Thể loại</option>
                                @foreach ($getCategory as $item)
                                @if($getById->idTheLoai == $item->id)
                                 <option selected value="{{$item->id}}">{{$item->Ten}}</option>
                                @else:
                                 <option value="{{$item->id}}">{{$item->Ten}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('idTheLoai')
                                 <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" value="{{$getById->Ten}}" name="Ten" placeholder="Please Enter Category Name" />
                            @error('Ten')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-default">Save</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection