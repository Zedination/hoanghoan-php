
@extends('Admin.layouts.admin')
@section('title')
    <title>Thêm giới thiệu</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'About','key'=>'Thêm giới thiệu'])
        <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Tiêu đề</label>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tiêu đề" name="title" value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label >Chọn ảnh :</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <textarea class="form-control tinymce_editor @error('content') is-invalid @enderror" name="contents" rows="10">{{old('content')}}</textarea>
                            </div>
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
