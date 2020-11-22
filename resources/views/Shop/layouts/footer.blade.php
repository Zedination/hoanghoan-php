<footer class="w-100" style="background:#363636">
    <div class="container">
        <div class="row mt-3 mb-3">
            <div class="col-md-6">
                <h5>
                    THÔNG TIN CHUNG
                    <span class="line-remove" style="width: 78px; "></span>
                </h5>
                <h4 class="mt-2 pt-2 com-name">XƯỞNG MỘC HOÀNG HOAN</h4>
                <p class="com-phone">
                    <i class="fas fa-phone-alt"></i>
                    <a href="#" title=""> 0985.367.024</a>
                </p>
                <p class="com-email">
                    <i class="fas fa-envelope"></i>
                    <a href="#" title="">noithatlanhoan@gmail.com</a>
                </p>
                <address class="com-address">
                    <i style="width: 22px;" class="fas fa-map-marker-alt"></i>Hiệp Thuận, Phúc Thọ, Hà Nội</address>
            </div>
            <div class="col-md-3">
                <h5>
                    VỀ CHÚNG TÔI
                    <span class="line-remove" style="width: 78px; "></span>
                </h5>
                <ul>
                    <li><a href="{{route('about')}}" title="Giới thiệu">Giới thiệu</a></li>
                    <li><a href="{{route('product')}}" title="Sản phẩm">Sản phẩm</a></li>
                    <li><a href="{{route('article')}}" title="Tin tức">Tin tức</a></li>
                    <li><a href="{{route('partner')}}" title="Đối tác">Đối tác</a></li>
                    <li><a href="{{route('contact')}}" title="Liên hệ">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>
                    KẾT NỐI VỚI CHÚNG TÔI
                    <span class="line-remove" style="width: 78px; "></span>
                </h5>
                <div class="mt-4 social-icon">
                    <a href="https://www.facebook.com/X%C6%B0%E1%BB%9Fng-M%E1%BB%99c-Ho%C3%A0ng-Hoan-110459754092742/" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="far fa-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v7.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution=setup_tool page_id="109420317439292" theme_color="#0084ff"
     logged_in_greeting="Chào bạn, đây là bot chat của Lê Anh Đức?"
     logged_out_greeting="Chào bạn, đây là bot chat của Lê Anh Đức?">
</div>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=3242529832428391&autoLogAppEvents=1" nonce="SkqAZPpx"></script>
{{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=3242529832428391&autoLogAppEvents=1" nonce="Ijab9THP"></script>--}}