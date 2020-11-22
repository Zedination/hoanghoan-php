
@extends('Admin.layouts.admin')
@section('title')
    <title>Add user</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'User','key'=>'Thêm user'])
        <form action="{{route('user.store')}}" method="POST" >
            {{csrf_field()}}
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Tên user</label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nhập tên user" name="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label >Nhập email</label>
                                <input type="email"
                                       class="form-control"
                                       placeholder="Nhập email" name="email" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Nhập password:</label>
                                <input type="password"
                                       class="form-control"
                                       placeholder="Nhập password" name="password" >
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


