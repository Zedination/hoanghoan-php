@extends('Shop.layouts.main')
@section('title')
    <title>Sản phẩm</title>
@endsection
@section('content')

    <div class="wrap">

        <!-- BANNER -->
        <div class="banner-product">
            <div class="banner-prod">
                @foreach($banners as $item)
                    @if($item->is_page == 1)
                        <div class="item">
                            <div class="slick-prev"><i class="fa fa-chevron-left"></i></div>
                            <img src="{{($item->image)}}">
                            <div class="slick-next"><i class="fa fa-chevron-right"></i></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        @foreach($categories as $category)
            <div class="product-wrap container">
                <div class="list-product">
                    <div class="d-flex justify-content-between box-title">
                        <h2 class="header-prod">{{$category->name}}</h2>

                        <p class="see-all"> <a href="{{route('all.product.by.category',['slug'=>$category->slug ,'id'=>$category->id])}}"> Xem tất cả </a></p>
                    </div>
                    <div class="box-product">
                        <div class="row">
                            @foreach($category->getProductCate->take(4) as $product)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product">
                                        <div class="img">
                                            <img src="{{($product->image)}}" alt="{{$product->name}}" class="img-fluid">
                                        </div>
                                        <div class="info">
                                            <p class="name"> <a href="{{route('product.detail',['slug'=>$product->slug,'id'=>$product->id])}}"> {{$product->name}}</a>   </p>
                                            <p class="vote">
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                                <span><i class="fas fa-star"></i></span>
                                            </p>
                                            <p class="price">
                                                <span>
									                {{number_format($product->price)}}
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
        @endforeach
    </div>
@endsection
