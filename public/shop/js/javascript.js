$(window).scroll(function () {
    let header = $('header').height();
    if( $(window).scrollTop() > 20 ){
        $('header').addClass('fixed');
    }else{
        $('header').removeClass('fixed');
    }
});

$('.res-menu').click(function(){
    $(this).toggleClass('active');
    if( $('.menu').attr('data-show') == 0 ){
        $('.menu').addClass('active');
        $('.menu').removeClass('noactive');
        $('.menu').attr('data-show', 1);
    }else{
        $('.menu').addClass('noactive');

        setTimeout(function(){
            $('.menu').removeClass('active');
            $('.menu').attr('data-show', 0);
        }, 200)
    }
});
// Slick Banner Home
$('.banner-home').slick({
    arrow: true,
    infinite: true,
    slidesToScroll: 1,
    slidesToShow: 1
});

// Slick Banner Product
$('.banner-prod').slick({
    dots: true,
    arrow: true,
    infinite: true,
    slidesToScroll: 1,
    slidesToShow: 1
});

// Slick Hot Product
$('.slide-prd').slick({
    arrow: true,
    infinite: true,
    slidesToScroll: 1,
    slidesToShow: 4,
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

// Slick Partner
$('.slide-partner').slick({
    dots: false,
    arrow: false,
    infinite: false,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});

// $('.searchbar').hover(()=>{
//    $('body > header > nav > div.menu.active > div > ul').hide();
// });
let req = null;
function search(keyword) {
    if(req!=null) req.abort();
    req = $.ajax({
        type: 'get',
        url: 'api/product/search?q='+keyword,
        success: result=>{
            console.log(result);
            let html = "";
            result.forEach(e=>{
                html+='<li class="list-group-item"><a href="chi-tiet/'+e.slug+'"><img style="width: 30px; height: 30px; margin-right: 10px;" src="'+e.image+'" alt="">'+e.name+'</a></li>';
            });
            $('.search-result ul').html(html);
        },error: (xhr)=>{
            console.log(xhr);
        }
    })
}
function searchDelay(keyword){
    $.ajax({
        type: 'get',
        url: '/api/product/search?q='+keyword,
        success: result=>{
            console.log(result);
            let html = "";
            result.forEach(e=>{
                html+='<li class="list-group-item"><a href="shop/product_detail/'+e.slug+'/'+e.id+'"><img style="width: 30px; height: 30px; margin-right: 10px;" src="'+e.image+'" alt="">'+e.name+'</a></li>';
            });
            console.log(html);
            $('.search-result ul').html(html);
        },error: (xhr)=>{
            console.log(xhr);
        }
    });
}
let timeout = null;
$('.searchbar > input').keyup(()=>{
    let keyword = $('body > header > nav > div.searchbar > input').val();
    $('.search-result ul').html("");
    if(keyword.length > 2){
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            searchDelay(keyword);
        },1000);
    }else{
        $('.search-result ul').html("");
    }
});