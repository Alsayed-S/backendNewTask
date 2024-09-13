@extends('Dashboard.layouts.master')
@section('css')

    <!--Internal   Notify -->
    <link href="{{ URL::asset('Admin/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>
@endsection
@section('title')
    {{trans('product.update product')}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('product.Products')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('product.update product')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('products.update','test')}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        {{-- input hidden value => id   --}}
                        <input type="hidden" name="id" value="{{$products->id}}">

                        <div class="row">

                            <div class="col">
                                <label>{{trans('product.title')}}</label>
                                <input type="text" name="title" value="{{$products->title}}"
                                       class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{trans('product.brand')}}</label>
                                <input type="text" name="brand" value="{{$products->brand}}"
                                       class="form-control @error('brand') is-invalid @enderror">
                                @error('brand')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{trans('product.category_id')}}</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" >--{{ trans('login.choose from list') }}--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{trans('product.price')}} </label>
                                <input type="number" name="price"
                                    value="{{$products->price}}"  class="form-control @error ('price') is-invalid @enderror">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{trans('product.image')}} </label>
                                <input type="file" name="image" class="form-control @error ('image') is-invalid @enderror">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{trans('product.details')}}</label>
                                <textarea rows="5" cols="10" class="form-control"
                                          name="details">{{$products->details}}</textarea>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{trans('insurance.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('Admin/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('Admin/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
