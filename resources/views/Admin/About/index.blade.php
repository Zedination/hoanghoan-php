
@extends('Admin.layouts.admin')
@section('title')
    <title>Giới thiệu</title>
@endsection
@section('css')
    <link href="{{asset('admins/product/list/list.css')}}" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{asset('vendors/sweetalert/sweetalert2@10.js')}}"></script>
    <script src="{{asset('admins/product/list/list.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'About','key'=>'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('about.create')}}" class="btn btn-success float-right m-2">Thêm mới</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <th scope="row">{{$about->id}}</th>
                                    <td>{{$about->title}}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{$about->image}}" alt="Ảnh sản phẩm ">
                                    </td>
                                    <td>
                                        <a href="{{route('about.edit',['id'=>$about->id] )}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('about.delete',['id'=>$about->id] )}}" class="btn btn-danger confirm_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $abouts->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
