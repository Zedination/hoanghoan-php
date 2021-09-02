@extends('Shop.layouts.main')
@section('title')
    <title>Danh sách sản phẩm</title>
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
                            <img src="{{asset($item->image)}}">
                            <div class="slick-next"><i class="fa fa-chevron-right"></i></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="product-wrap container">
            <div class="list-product">
                <div class="d-flex justify-content-between box-title">
                    <h2 class="header-prod">{{$category->name}}</h2>
                </div>
                <div class="box-product">
                    <div class="row">
                        @foreach($category->getProductCate()->latest()->paginate(8) as  $product)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="product">
                                        <div class="img">
                                            <img src="{{asset($product->image)}}" alt="{{$product->name}}" class="img-fluid">
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
                    <div class="pagination d-flex justify-content-center">
                        <ul class="d-flex"><li class="active" data-page="1">{{$category->getProductCate()->latest()->paginate(8) -> links()}} </li></ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
