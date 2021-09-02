@extends('Shop.layouts.main')
@section('title')
    <title>Chi tiết sản phẩm</title>
@endsection
@section('content')
    <style>
        .product-image-thumbs{margin-top: 1rem}
        .product-image-thumb{margin-right: 0}
    </style>
    <!-- CONTENT -->
    <div class="container">
        <div class="breadcumb">
            <div class="d-flex align-items-center">
                <p> <a href="/">Trang chủ </a> </p>
                <span> <i class="fas fa-angle-right"></i> </span>
                <p><a href="{{route('all.product.by.category',['slug'=>$product->getCategory->slug,'id'=>$product->getCategory->id])}}">{{$product->getCategory->name}}</a></p>
                <span> <i class="fas fa-angle-right"></i> </span>
                <p> <a href="#"> Chi tiết sản phẩm </a> </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="product-detail">
            <h1> {{$product->name}} </h1>
            <div class="row mb-4">
                <div class="col-lg-8">
                    <div class="">
                        <div class="">
                            <img src="{{asset($product->image)}}" class="product-image" alt="Product Image" style="width: 100%">
                        </div>
                        <div class="product-image-thumbs">
                            @foreach ($product->getProductImage as $image)
                                <div><img src="{{asset($image->image ?? 'không có')}}" alt="Product Image" style="height:7em; border: 2px solid #f5efef; float: left"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <p class="material"> Chất liệu </p>
                    <div class="d-flex material ">
                        @foreach($product->getMaterial as $data)
                            <button class="active">{{$data->name ?? 'Trống'}}</button>
                        @endforeach
                    </div>
                    <div class="price">
                        <p class="new">{{number_format($product->price)}}0 VNĐ</p>
                    </div>
                    <div class="certify d-flex align-items-center">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Bảo hành sản phẩm lên đến 36 tháng
                    </div>
                    <br>
                    <div class="fb-like" data-href="{{url()->current()}}" data-width="300" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
                </div>
            </div>
            <div class="detail-info">
                <nav class="d-flex">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-dt-tab" data-toggle="tab" href="#nav-dt" role="tab" aria-controls="nav-dt" aria-selected="true">Chi tiết</a>
                        <a class="nav-link" id="nav-ts-tab" data-toggle="tab" href="#nav-ts" role="tab" aria-controls="nav-ts" aria-selected="false">Bình luận</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-dt" role="tabpanel" aria-labelledby="nav-dt-tab">
                        {!! $product -> content !!}
                    </div>
                    <div class="tab-pane fade" id="nav-ts" role="tabpanel" aria-labelledby="nav-ts-tab">
{{--                        BÌNH LUẬN FACEBOOK--}}
                        <div class="fb-comments" data-href="{{url()->full()}}" data-numposts="5" data-width=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relate-product-wrapper container">
        <div class="relate-product">
            <div class="d-flex justify-content-between header-re-prod" style="margin-bottom: 1em">
                <h2> Sản phẩm tương tự  </h2>
            </div>
            <div class="box-relate-product">
                <div class="row">
                    @foreach($product_pr as $item)

                        <div class="col-lg-3 col-sm-6">
                            <div class="product">
                                <div class="img">
                                    <img src="{{asset($item->image)}}" alt="Kệ để đồ" class="img-fluid">
                                </div>
                                <div class="info">
                                    <p class="name"> <a href="{{route('product.detail',['slug'=>$item->slug,'id'=>$item->id])}}" title="Kệ để đồ"> {{$item->name}}</a></p>
                                    <p class="vote">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </p>
                                    <p class="price">
								<span>
									{{number_format($item->price)}}
								</span> VNĐ
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
