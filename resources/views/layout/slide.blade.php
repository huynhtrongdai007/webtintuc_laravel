<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $i = 0;
                @endphp
                @foreach($slide as $item)
                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"
                
                @if ($i==0)
                 class="active"
                @endif
                ></li>
                @php
                    $i++;
                @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php
                    $i = 0;
                @endphp
                @foreach ($slide as $item)
                <div 
                @if ($i==0)
                class="item active"
                @else
                     class="item"
                @endif 
                >
                @php
                    $i++;
                @endphp
                    <img class="slide-image" src="uploads/slide/{{$item->Hinh}}" alt="{{$item->Ten}}">
                </div>
                @endforeach
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>