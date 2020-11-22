
@extends('Admin.layouts.admin')
@section('title')
    <title>Đối tác</title>
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
        @include('Admin.partials.content-header',['name'=>'Partner','key'=>'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('partner.create')}}" class="btn btn-success float-right m-2">Thêm mới</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên đối tác</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Mô tả ngắn</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partners as $partner)
                                <tr>
                                    <th scope="row">{{$partner->id}}</th>
                                    <td>{{$partner->name}}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{$partner->image}}" alt="Ảnh sản phẩm ">
                                    </td>
                                    <td>{!! $partner->content !!}</td>
                                    <td>{!! $partner->description !!}</td>
                                    <td>
                                        <a href="{{route('partner.edit',['id'=>$partner->id] )}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('partner.delete',['id'=>$partner->id] )}}" class="btn btn-danger confirm_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $partners->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
