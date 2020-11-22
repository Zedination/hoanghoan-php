
@extends('Admin.layouts.admin')
@section('title')
    <title>Banner</title>
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
        @include('Admin.partials.content-header',['name'=>'Banner','key'=>'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('banner.create')}}" class="btn btn-success float-right m-2">Thêm mới</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Is_page</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <th scope="row">{{$banner->id}}</th>
                                    <td>{{$banner->title}}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{$banner->image}}" alt="Ảnh sản phẩm ">
                                    </td>
                                    <td>{{$banner->is_page}}</td>
                                    <td>
                                        <a href="{{route('banner.edit',['id'=>$banner->id] )}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('banner.delete',['id'=>$banner->id] )}}" class="btn btn-danger confirm_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $banners->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
