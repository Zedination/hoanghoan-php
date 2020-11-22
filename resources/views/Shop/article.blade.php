@extends('Shop.layouts.main')
@section('title')
    <title>Tin tức</title>
@endsection
@section('content')
    <div class="container">
        <div class="box-news">
            <h1 class="header-news"> Tin tức </h1>
            <div class="row wrapper-news">
                @foreach($data as $item)
                    <div class="col-md-6 col-lg-4">

                        <div class="new-item">
                            <div class="img">
                                <img src="{{asset($item->image)}}" class="img-fluid" alt="TUYỆT CHIÊU THIẾT KẾ CHUNG CƯ MINI 2 PHÒNG NGỦ SIÊU ĐẸP" style="    width: 100%">
                            </div>
                            <div class="title">
                                <h4><a href="{{route('article.detail',['slug'=>$item->slug ,'id'=>$item->id])}}">{{$item->title}}</a></h4>
                                <p class="desc">
                                </p><p> {!! $item->description !!}
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="pagination d-flex justify-content-center">
                <ul class="d-flex"><li class="active" data-page="1">{{$data -> links()}} </li></ul>
            </div>
        </div>
    </div>
@endsection
