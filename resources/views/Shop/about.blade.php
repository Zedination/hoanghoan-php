@extends('shop.layouts.main')
@section('title')
    <title>Giới thiệu</title>
@endsection
@section('content')
    <!-- BANNER -->
    <div class="banner-abt-wrap">
        @foreach($banners as $item )
            @if($item->is_page==3)
                <div class="img">
                    <img src="{{asset($item->image)}}" alt="{{$item->content}}">
                </div>
                <div class="banner-content">
                    <h1 class="text-center">{{$item->title}}</h1>
                </div>
            @endif
        @endforeach
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="introduce">
            @foreach($about as $item)
                @if($item->position==1)
                    <div class="introduce-box">
                        <h2 class="header-introduce"> {{$item->title}}</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="img mb-4">
                                    <img src="{{asset($item->image)}}" alt="Thành lâp &amp; phát triển" class="img-fluid w-100">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="content text-justify">
                                    <p>
                                        {!! $item->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="view-box px-0 px-md-4">
                        <h2 class="header-view"> {{$item->title}} </h2>
                        <div class="img">
                            <img src="{{asset($item->image)}}" alt="tầm nhìn" class="w-100">
                        </div>
                        <div class="content text-justify mt-3">
                            <p>{!! $item->content !!}</p>

                        </div>
                    </div>
                @endif
            @endforeach
            <div class="duty-box">
                <h2 class="header-duty"> sứ mệnh </h2>
                <div class="row reason">
                    <div class="col-lg-6">
                        <div class="reason-item d-flex">
                            <div class="img">
                                <img src="/shop/images/AnhCat/voi-xa-hoi.png" alt="Với xã hội">
                            </div>
                            <div class="content">
                                <h3 class="title"> Với xã hội </h3>
                                <p class="desc">
                                </p><p>Hài hòa lợi ích doanh nghiệp với lợi ích xã hội, tích cực cùng cộng đồng xây dựng môi trường sống bền vững.</p>

                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="reason-item d-flex">
                            <div class="img">
                                <img src="/shop/images/AnhCat/voi-nhan-vien.jpg" alt="Với nhân viên">
                            </div>
                            <div class="content">
                                <h3 class="title"> Với nhân viên </h3>
                                <p class="desc">
                                </p><p>Xây dựng môi trường làm việc chuyên nghiệp, năng động, sáng tạo và nhân văn.</p>

                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="reason-item d-flex">
                            <div class="img">
                                <img src="/shop/images/AnhCat/voi-doi-tac.jpg" alt="Với đối tác">
                            </div>
                            <div class="content">
                                <h3 class="title"> Với đối tác </h3>
                                <p class="desc">
                                </p><p>Xây dựng môi trường làm việc chuyên nghiệp, năng động, sáng tạo và nhân văn.</p>

                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="reason-item d-flex">
                            <div class="img">
                                <img src="/shop/images/AnhCat/voi-thi-truong.png" alt="Với thị trường">
                            </div>
                            <div class="content">
                                <h3 class="title"> Với thị trường </h3>
                                <p class="desc">
                                </p><p>Cung cấp các sản phẩm với chất lượng quốc tế và phù hợp với con người Việt Nam.</p>

                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
