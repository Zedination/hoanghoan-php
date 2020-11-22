
@extends('Admin.layouts.admin')
@section('title')
    <title>Cập nhật chất liệu</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Material','key'=>'Cập nhật chất liệu'])
        <form action="{{route('material.update')}}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Tên chất liệu</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên chất liệu" name="name" value="{{$materialEdit->name}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{$materialEdit->id}}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection
