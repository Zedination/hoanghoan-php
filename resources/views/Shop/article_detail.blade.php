@extends('Shop.layouts.main')
@section('title')
    <title>Tin tức</title>
@endsection
@section('content')
    <div class="container">
        <div class="breadcumb">
            <div class="d-flex align-items-center">
                <p><a href="/">Trang chủ </a></p>
                <span> <i class="fas fa-angle-right"></i> </span>
                <p><a href="#">Chi tiết bài viết</a></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="news-detail">
            <div class="row">
                <div class="col-md-8 content-left">
                    <h1>{{$article->title}}</h1>
                    <div>
                        {!! $article->content !!}
                    </div>
                </div>
                <div class="col-md-4 content-right">
                    <h2>Bài viết mới</h2>
                    @foreach($new_article as $new_art)
                        <ul class="list-unstyled">
                            <li class="d-flex">
                                <a href="">
                                    <img class="mr-2 mt-2" src="{{asset($new_art->image)}}" alt="{{$new_art->title}}"
                                         style="width:80px; height:80px;">
                                </a>
                                <div class="w-100">
                                    <p>
                                        <a href="{{route('article.detail',['slug'=>$new_art->slug ,'id'=>$new_art->id])}}">{{$new_art->title}}</a>
                                    </p>
                                    <p class="d-flex justify-content-between" style="color:#999">
                                        <i class="fas fa-calendar-alt mr-2"><span>{{$new_art->created_at}}</span></i>
                                        <i class="fas fa-eye">&nbsp;<span style="color:#ff0000">0</span></i>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
