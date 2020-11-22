<header class="">
    <nav class="container">
        <div class="logo">
            <a href="/"> <img src="/shop/images/logo.png" alt="Xưởng mộc giá tốt hoàng hoan"></a>
        </div>
        <div class="menu" data-show="0">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <ul style="">
                    <li ><a href="/"> Trang chủ </a></li>
                    <li ><a href="{{route('about')}}"> Giới thiệu </a></li>
                    <li><a href="{{route('product')}}"> Sản phẩm </a></li>
                    <li><a href="{{route('article')}}"> Tin tức </a></li>
                    <li><a href="{{route('partner')}}"> Đối tác  </a></li>
                    <li><a href="{{route('contact')}}"> Liên hệ  </a></li>
                    {{--<li><button class="btn btn-primary"><i class="fas fa-search"></i></button></li>--}}

                </ul>
                {{--<div class="searchbar">--}}
                {{--<input class="search_input" type="text" name="" placeholder="Tìm kiếm sản phẩm...">--}}
                {{--<a href="#" class="search_icon"><i class="fas fa-search"></i></a>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="searchbar">
            <input class="search_input" type="text" name="" placeholder="Tìm kiếm sản phẩm...">
            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            <div class="search-result">
                <ul class="list-group" style="margin-top: 10px;">
                    {{--<li class="list-group-item">Cras justo odio</li>--}}
                </ul>
            </div>
        </div>
        <div class="d-flex align-items-center d-block d-lg-none">
            <button class="res-menu d-block d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
</header>
