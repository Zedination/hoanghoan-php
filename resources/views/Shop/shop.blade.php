@extends('shop.layouts.main')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')
    <div class="banner">
        <div class="banner-home">
            @foreach($banner as $item)
                @if($item->is_page==0)
                <div class="banner-home-item">
                    <img src="{{asset($item->image)}}" class="d-block w-100" alt="...">
                    <div class="content-box-banner">
                        <h2 class="text-uppercase header-banner">
                            THẾ GIỚI NỘI THẤT SỐ 1 VIỆT NAM <br> <span> Hoàng Hoan </span>
                        </h2>
                        <div class="sapo-banner">
                            <p>Sứ mệnh của chúng tôi là kết hợp hài hòa giữa ý tưởng và mong muốn của khách hàng, đem lại những phút giây thư giãn tuyệt vời bên gia đình và những người thân yêu.</p>
                        </div>
                        <a href="{{route('contact')}}" class="text-uppercase btn-banner"> Liên hệ ngay </a>
                    </div>
                </div>
                @endif

            @endforeach

        </div>
    </div>

    <div class="content-wrap container">
        <div class="categories">
            @foreach($categories as $item)
                <div class="category-item">
                    <a href="{{route('all.product.by.category',['slug'=>$item->slug ,'id'=>$item->id])}}">
                        <div class="category-img">
                            <img src="{{$item->image}}" alt="{{$item->name}}" class="img-cate">
                        </div>
                        <p> {{$item->name}} </p>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- HOT PRODUCT -->
        <div class="hot-product-wrap">
            <h2 class="header-prd"> Sản phẩm nổi bật </h2>

            <div class="slide-prd">
                @foreach($product_hot as $item)
                    <div class="product">
                        <div class="img">
                            <img src="{{asset($item->image)}}" alt="{{$item->name}}" class="img-fluid">
                        </div>
                        <div class="info">
                            <p class="name"><a href="{{route('product.detail',['slug'=>$item->slug,'id'=>$item->id])}}">{{$item->name}}</a></p>
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
                @endforeach

            </div>
        </div>
    </div>
    <!-- ABOUT US -->
    <div class="about-us">
        <div class="container">
            <h2 class="header-abt"> Về chúng tôi </h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="img h-100">
                        <img src="/shop/images/AnhCat/tintuc-0.png" alt="NỘI THẤT HOÀNG HOAN UY TÍN SONG HÀNH CHẤT LƯỢNG" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content h-100">
                        <h3> NỘI THẤT HOÀNG HOAN UY TÍN SONG HÀNH CHẤT LƯỢNG  </h3>
                        <div>
                            <p>Nội thất Hoàng Hoan chúng tôi tự hào là đứa con tinh thần ra đời sau hơn 30 năm hoạt động trong lĩnh vực kinh doanh đồ gỗ nội thất với thương hiệu ĐỒ GỖ HOÀNG HOAN nổi tiếng.</p>

                            <p>Tài nguyên của chúng tôi là đội ngũ kiến trúc sư tốt nghiệp ĐH Kiến Trúc Hà Nội với nhiều năm kinh nghiệm, luôn tràn đầy nhiệt huyết và sức sáng tạo của tuổi trẻ. Thế mạnh của chúng tôi là sở hữu xưởng nội thất hơn 10.000m2 tại Hà Nội sản xuất đa dạng các sản phẩm với giá cả luôn cạnh tranh.</p>
                        </div>
                        <div>
                            <p>  <img alt="giới thiệu" src="/shop/images/AnhCat/tintuc-1.png">&nbsp;  <img alt="giới thiệu" src="/shop/images/AnhCat/tintuc-2.png">&nbsp;  <img alt="giới thiệu" src="/shop/images/AnhCat/tintuc-3.png">&nbsp;<a href="#"><img alt="" src="images/AnhCat/tintuc-4.png"></a><a href="{{route('about')}}" style="margin: -95px;color: aliceblue;">Xem Thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <h2 class="header-abt"> Tại sao nên chọn hoàng hoan?</h2>
            <div class="row reason">
                <div class="col-md-6">
                    <div class="reason-index-item d-flex">
                        <div class="img">
                            <img src="/shop/images/AnhCat/money.png" alt="lý do 1">
                        </div>
                        <div class="content">
                            <h3 class="title"> Chính sách giá </h3>
                            <p class="desc"> Tốt nhất và công khai giá trên website</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-index-item d-flex">
                        <div class="img">
                            <img src="/shop/images/AnhCat/product.png" alt="lý do 1">
                        </div>
                        <div class="content">
                            <h3 class="title"> Sản xuất  </h3>
                            <p class="desc"> Trực tiếp sản xuất bởi đội ngũ nhân viên hàng đầu</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-index-item d-flex">
                        <div class="img">
                            <img src="/shop/images/AnhCat/medal.png" alt="lý do 1">
                        </div>
                        <div class="content">
                            <h3 class="title"> Chất lượng </h3>
                            <p class="desc"> Cam kết chất lượng sản phẩm và tốc độ thi công </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="reason-index-item d-flex">
                        <div class="img">
                            <img src="/shop/images/AnhCat/open-24-h.png" alt="lý do 1">
                        </div>
                        <div class="content">
                            <h3 class="title"> Bảo hành  </h3>
                            <p class="desc"> Dịch vụ bảo hành tốt nhất khu vực</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NEWS -->
    <div class="news">
        <div class="container">
            <h2 class="header-news"> Tin tức </h2>
            <div class="row">
                <div class="col-lg-7">
                    @foreach($article as $key =>  $item)
                        @if($key == 0)
                            <div class="box">
                                <div class="img">
                                    <img src="{{asset($item->image)}}" alt=" {{$item->title}}" class="w-100">
                                </div>
                                <div class="news-content">
                                    <p class="title">
                                        <a href="{{route('article.detail',['slug'=>$item->slug ,'id'=>$item->id])}}">
                                            {{$item->title}}
                                        </a>
                                    </p>
                                    <div class="desc">
                                        <p>{!! $item->description !!}</p>

                                    </div>
                                </div>
                            </div>

                </div>

                <div class="col-lg-5 ">
                    <ul>
                        @else
                            <li class="d-flex">
                                <div class="img">
                                    <img src="{{asset($item->image)}}" alt=" {{$item->title}}">
                                </div>
                                <div class="content">
                                    <p class="title">
                                        <a href="{{route('article.detail',['slug'=>$item->slug ,'id'=>$item->id])}}">
                                            {{$item->title}}
                                        </a>
                                    </p>
                                    <div class="desc sub-news-content"> <p>{!! $item->description !!}</p></div>
                                </div>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                    <div>
                        <a href="{{route('article')}}" class="see-more"> Xem thêm  <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PARTNER -->
    <div class="partner">
        <div class="container">
            <h2 class="header-ptn"> Đối tác </h2>

            <div class="slide-partner">
                @foreach($partner as $item)
                    <div class="ptn-item">
                        <div class="img">
                            <img src="{{asset($item->image)}}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('Shop.layouts.contact')
@endsection
