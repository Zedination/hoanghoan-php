
@extends('Admin.layouts.admin')
@section('title')
    <title>Thêm cài đặt</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Setting','key'=>'Thêm cài đặt'])
        <form action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Tên</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên" name="name">
                            </div>
                            <div class="form-group">
                                <label >Nhập email</label>
                                <input type="email"
                                       class="form-control"
                                       placeholder="Nhập email" name="email" >
                            </div>
                            <div class="form-group">
                                <label >Nhập số điện thoại</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập phone" name="phone" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Nhập địa chỉ:</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập địa chỉ" name="address" >
                            </div>
                            <div class="form-group">
                                <label >Chọn logo:</label>
                                <input type="file"
                                       class="form-control" name="logo" >
                            </div>
                            <div class="form-group">
                                <label >Nhập facebook:</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập facebook" name="facebook" >
                            </div>
                            <div class="form-group">
                                <label ></label>
                                <button type="submit" class="btn btn-primary" style="margin: 15px;">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
@endsection


