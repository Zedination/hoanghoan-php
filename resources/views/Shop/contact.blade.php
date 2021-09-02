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
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text"
                                               class="@error('name') is-invalid @enderror"
                                               placeholder="Họ và tên" name="name" value="{{old('name')}}">

                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" class="@error('name') is-invalid @enderror" name="email" placeholder="Email" value="{{old('email')}}">
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" name="phone" class="@error('phone') is-invalid @enderror"  placeholder="Số điện thoại" value="{{old('phone')}}">
                                        @error('contents')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" name="contents" class="@error('contents') is-invalid @enderror" placeholder="Nội dung" value="{{old('contents')}}">
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
