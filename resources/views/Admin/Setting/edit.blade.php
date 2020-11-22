
@extends('Admin.layouts.admin')
@section('title')
    <title>Cập nhật cài đặt</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Setting','key'=>'Cập nhật cài đặt'])
        <form action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Tên</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên" name="name" value="{{$settingEit->name}}">
                            </div>
                            <div class="form-group">
                                <label >Nhập email</label>
                                <input type="email"
                                       class="form-control"
                                       placeholder="Nhập email" name="email" value="{{$settingEit->email}}" >
                            </div>
                            <div class="form-group">
                                <label >Nhập số điện thoại</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập phone" name="phone" value="{{$settingEit->phone}}" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Nhập địa chỉ:</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập địa chỉ" name="address" value="{{$settingEit->address}}" >
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
                                       placeholder="Nhập facebook" name="facebook" value="{{$settingEit->facebook}}">
                            </div>
                            <div class="form-group">
                               <input type="hidden" name="id" value="{{$settingEit->id}}">
                                <button type="submit" class="btn btn-primary" style="margin: 15px;">Cập nhật</button>
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


