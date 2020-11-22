@extends('Shop.layouts.main')
@section('title')
    <title>Đối tác</title>
@endsection
@section('content')
    <div class="banner-abt-wrap">
        @foreach($banners as $item)
            @if($item->is_page == 2)
                <div class="img">
                    <img src="{{asset($item->image)}}" alt="Các đối tác của xưởng mộc giá tốt">
                </div>

                <div class="banner-content">
                    <h1 class="text-center">{!! $item->content !!}</h1>
                </div>
            @endif
        @endforeach
    </div>
    <!-- CONTENT -->
    <div class="container">
        <div class="introduce partner">
            @foreach($partner as  $item)
                <div class="partner-box d-flex">
                    <div class="row w-100">
                        <div class="col-md-3 col-lg-4 d-flex align-items-center">
                            <div class="img w-100 px-2 px-lg-5">
                                <img src="{{($item->image)}}" alt="Công ty cổ phần VInpearl">
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-8 d-flex align-items-center">
                            <div class="content text-justify">
                                <h3 class="title"> {{$item->name}} </h3>
                                <p class="desc">{!! $item->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="partner-box d-flex">
                    <div class="row w-100">
                        <div class="col-md-3 col-lg-4 d-flex align-items-center">
                        </div>
                        <div class="col-md-9 col-lg-8 d-flex align-items-center">
                            {{ $partner->links() }}
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
