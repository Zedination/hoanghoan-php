<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="/shop/slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/shop/slick/slick/slick-theme.css"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/shop/css/global.css">
    <link rel="stylesheet" type="text/css" href="/shop/css/style.css">
    <link rel="stylesheet" type="text/css" href="/shop/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/shop/css/search.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="icon" href="" type="image/png">
    @yield('css')
    @yield('title')
</head>
<body style="background: #f3f3f3">

@include('Shop.layouts.header')
@yield('content')
{{--@if(!isset($is_detail))--}}
{{--    @include('Shop.layouts.contact')--}}
{{--@endif--}}
<!-- CONTACT -->
@include('Shop.layouts.footer')

</body>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/bf61fecb7c.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- JQuery -->
<script type="text/javascript" src="/shop/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/shop/js/jquery-migrate-1.2.1.min.js"></script>
<!-- Slick -->
<script type="text/javascript" src="/shop/slick/slick/slick.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Script -->
<script type="text/javascript" src="/shop/js/javascript.js"></script>
@yield('my_javascript')
{{--firebase script--}}
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-messaging.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyDNITRMjPnUsnGFbfKCWCWJ2mdXWcVe6rE",
        authDomain: "xuongmoc-c1e83.firebaseapp.com",
        databaseURL: "https://xuongmoc-c1e83.firebaseio.com",
        projectId: "xuongmoc-c1e83",
        storageBucket: "xuongmoc-c1e83.appspot.com",
        messagingSenderId: "380833687706",
        appId: "1:380833687706:web:0b98ae685bd9036d0c5723",
        measurementId: "G-F5EXM636YK"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    const messaging = firebase.messaging();
    // messaging.usePublicVapidKey('BIPiSsxrZOJvSS1V_EX6A9zcX4mG9t88jUbdFj-aTw5fgb_WP5F50wSb_STkgtS158j0fYGKocbAYl0EZOLCi5c');
    // messaging
    //     .requestPermission()
    //     .then(function () {
    //         console.log("Notification permission granted.");
    //         // get the token in the form of promise
    //         return messaging.getToken()
    //     })
    //     .then(function (token) {
    //         console.log(token);
    //     })
    //     .catch(function (err) {
    //         console.log("Unable to get permission to notify.", err);
    //     });
    // messaging.onMessage((payload) => {
    //     console.log('Message received. ', payload);
    //     // Customize notification here
    //     const notificationTitle = "Background Message Title";
    //     const notificationOptions = {
    //         body: payload.data.content,
    //         icon: "/itwonders-web-logo.png",
    //     };
    //     let thongBao = new Notification(notificationTitle, notificationOptions);
    //     thongBao.onclick = function(event){
    //         thongBao.close();
    //         window.open("https://google.com.vn");
    //     }
    //
    // });
    // messaging.getToken({vapidKey: 'BIPiSsxrZOJvSS1V_EX6A9zcX4mG9t88jUbdFj-aTw5fgb_WP5F50wSb_STkgtS158j0fYGKocbAYl0EZOLCi5c'}).then((currentToken) => {
    //     if (currentToken) {
    //         console.log(currentToken);
    //     }
    // }).catch((err) => {
    //     console.log('An error occurred while retrieving token. ', err);
    // });
    messaging.onMessage((payload) => {
        console.log('Message received. ', payload);
        const notificationTitle = payload.data.title;
        const notificationOptions = {
                image: payload.data.image,
                body: payload.data.content,
                icon: "https://xuongmoc.org/shop/images/logo.png"
            };
            let thongBao = new Notification(notificationTitle, notificationOptions);
            thongBao.onclick = function(event){
                thongBao.close();
                window.open(payload.data.url);
            }
    });
</script>
<button style="position: fixed; bottom: 100px; right: 40px;" id = "subscribe" class="btn btn-danger"><i class="fas fa-bell"></i></button>
<script>
    $(()=>{
        $('#subscribe').click(()=>{
            let confirmBox = confirm("Bạn có muốn đăng ký nhận thông báo không!");
            if(confirmBox){
                messaging.getToken({vapidKey: 'BIPiSsxrZOJvSS1V_EX6A9zcX4mG9t88jUbdFj-aTw5fgb_WP5F50wSb_STkgtS158j0fYGKocbAYl0EZOLCi5c'}).then((currentToken) => {
                    if (currentToken) {
                        console.log(currentToken);
                        $.ajax({
                            type: 'post',
                            url: "/api/product/notification",
                            data: {
                                token: currentToken
                            }
                        })
                    }
                }).catch((err) => {
                    console.log('An error occurred while retrieving token. ', err);
                    alert("Bạn cần cho phép trang web gửi thông báo để nhập cập nhật các sản phẩm mới nhất!");
                });
            }
        });
    })
</script>
</html>
