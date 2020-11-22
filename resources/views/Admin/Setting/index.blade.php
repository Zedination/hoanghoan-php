
@extends('Admin.layouts.admin')
@section('title')
    <title>Cài đặt chung</title>
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
        @include('Admin.partials.content-header',['name'=>'Setting','key'=>'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('setting.create')}}" class="btn btn-success float-right m-2">Thêm mới</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Facebook</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allSettings as $allSetting)
                                <tr>
                                    <th scope="row">{{$allSetting->id}}</th>
                                    <td>{{$allSetting->name}}</td>
                                    <td>{{$allSetting->email}}</td>
                                    <td>{{$allSetting->phone}}</td>
                                    <td>{{$allSetting->address}}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{$allSetting->logo}}" alt="Ảnh sản phẩm ">
                                    </td>
                                    <td>{{$allSetting->facebook}}</td>
                                    <td>
                                        <a href="{{route('setting.edit',['id'=>$allSetting->id] )}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('setting.delete',['id'=>$allSetting->id] )}}" class="btn btn-danger confirm_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $allSettings->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
