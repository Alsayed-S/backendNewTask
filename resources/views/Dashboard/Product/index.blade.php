@extends('Dashboard.layouts.master')
@section('title')
    {{trans('product.Products')}}
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('product.Products')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('product.all products')}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <a href="{{ route('products.create') }}" class="btn btn-primary">{{ trans('product.add product') }}</a>

                                    </div>

                                    {{-- <form action="{{ route('search') }}" method="GET">
                                        <div>
                                            <input type="text" name="search" placeholder="Search by name or brand" value="{{ request()->search }}" class="form-control">
                                        </div>
                                        <br>
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </div>
                                    </form> --}}

                                    <form action="{{ route('products.search') }}" method="GET">
                                        <input type="text" name="search" placeholder="Search Products by brand" class="form-control">
                                        <input type="number" name="price" placeholder="Search Products by price" value="{{ request('price') }}" class="form-control">

                                        <br>
                                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                    </form>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-md-nowrap" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">#</th>
                                            <th class="wd-15p border-bottom-0">{{trans('product.title')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('product.brand')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('product.category_id')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('product.price')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('product.image')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('product.details')}}</th>
                                            <th class="wd-15p border-bottom-0">{{trans('category.actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->brand }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>
                                                    <img src="{{ url(asset('uploads/products/'.$product->image))}}" alt="image" width="75px" height="75px" >
                                                </td>
                                                <td>{{\Str::limit($product->details,20)}}</td>
                                                <td>
                                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary btn-sm"><i class="las la-pen"></i></a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$product->id}}"><i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                                </td>
                                            </tr>
                                            @include('Dashboard.Product.delete')
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
