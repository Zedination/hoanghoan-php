@extends('Shop.layouts.main')
@section('title')
    <title>Liên hệ</title>
@endsection
@section('content')
    @foreach($banners as $item)
        @if($item->is_page == 4)
            <div class="banner-abt-wrap">
                <div class="img">
                    <img src="{{asset($item->image)}}" alt="Liên hệ với xưởng mộc giá tốt" class="w-100">
                </div>
                <div class="banner-content">
                    <h1 class="text-center">{{$item->title}}</h1>
                </div>
            </div>
        @endif
    @endforeach
    <!-- CONTENT -->
    <div class="container">
        <div class="contact-box">
            <div class="box px-0  px-md-4">
                <div class="cont-box d-flex">
                    <div class="row">
                        <div class="col-lg-6 ">
                            @foreach($banners as $item)
                                @if($item->is_page == 5)
                                    <div class="img d-none d-lg-block">
                                        <img src="{{asset($item->image)}}" alt="Liên hệ" class="w-100">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-6">
                            <div class="content">
                                <p class="title lien-he mb-2"> liên hệ với chúng tôi  </p>
                                <form action="{{route('contact.post')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group lien-he">
                                        <input type="text" name="name" placeholder="Họ và tên" >
                                        @if($errors->has('name'))
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
                                                <p>{{ $errors->first('name') }}</p>
                                            </div>
                                        @endif
                                        <input type="text" name="email" placeholder="Email">
                                        @if($errors->has('email'))
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
                                                <p>{{ $errors->first('email') }}</p>
                                            </div>
                                        @endif
                                        <input type="text" name="phone" placeholder="Số điện thoại">
                                        @if($errors->has('phone'))
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
                                                <p>{{ $errors->first('phone') }}</p>
                                            </div>
                                        @endif
                                        <input type="text" name="contents" placeholder="Nội dung">
                                        @if($errors->has('content'))
                                            <div class="alert alert-danger alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
                                                <p>{{ $errors->first('content') }}</p>
                                            </div>
                                        @endif
                                        <br>
                                        <button class="contact-send"> Gửi </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
