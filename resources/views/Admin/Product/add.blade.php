@extends('Admin.layouts.admin')
@section('title')
    <title>Add product</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Product','key'=>'Thêm sản phẩm'])
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Tên sản phẩm</label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nhập tên sản phẩm" name="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label >Giá sản phẩm</label>
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Nhập giá sản phẩm"
                                       name="price" value="{{old('price')}}">
                            </div>
                            <div class="form-group">
                                <label >Chọn ảnh profile:</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                            <div class="form-group">
                                <label >Chọn ảnh chi tiết:</label>
                                <input type="file" class="form-control-file" name="image_path[]" multiple>
                            </div>
                            <div class="form-group">
                                <label >Chọn danh mục</label>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id" >
                                    <option value="">Chọn danh mục</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Chọn chất liệu cho sản phẩm</label>
                                <select class="form-control tags_select2_choose" multiple="multiple" name="materials[]">
                                    @foreach($materials as $material)
                                        <option value="{{$material->id}}">{{$material->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control tinymce_editor" name="contents" rows="10">{{old('contents')}}</textarea>
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
