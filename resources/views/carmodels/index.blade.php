@extends('layouts.admin_master')
@section('title', 'Manage Products')
@section('content')




    <section class="section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-dark text-white-all">
                <li class="breadcrumb-item"><a href="{{ route('carmodels.index') }}"><i class="fas fa-home"></i>
                        Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Car Models</li>
                <li class="breadcrumb-item"><a href="{{ route('carmodels.create') }}"><i class="fas fa-plus"></i> Add
                        Car Models</a></li>
            </ol>
        </nav>
        <div class="card">

            <div class="card-header bg-dark text-white-all">
                <h4>Manage Car Models</h4>

                {{-- <form action="{{ route('users.export') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary btnSubmit">
                        <i class="fa fa-file-excel-o"></i> Export Excel
                    </button>
                </form> --}}
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $e)
                            {{--  <----- $errors->all() --}}
                            <li><strong>{{ $e }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">

                @if (Session::has('error'))
                    <div class="alert alert-warning ">
                        <span class="close" onclick="this.parentElement.style.display='none';"
                            style="cursor: pointer;">&times;</span>
                        {{-- @foreach ($errors->all() as $error) --}}
                        <li>
                            <span class="text-white">{{ Session::get('error') }}</span>
                        </li>
                        {{-- @endforeach --}}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success ">
                        <span class="close" onclick="this.parentElement.style.display='none';"
                            style="cursor: pointer;">&times;</span>
                        {{-- @foreach ($errors->all() as $error) --}}
                        <li>
                            <span class="text-white">{{ Session::get('success') }}</span>
                        </li>
                        {{-- @endforeach --}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover datatable" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Manufacturer Name</th>
                                <th>Model Name</th>
                                <th>Color</th>

                                <th>Manifacturing Year</th>
                                <th>Status</th>
                                <th>Added On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carmodels as $carmodels)
                                <tr>
                                    <td>{{ $carmodels->id }}</td>
                                    <td><img style="width:80px;height:80px;" src="{!! asset('storage/images/car_models/' . $carmodels->image1 ) !!}" alt=""></td>
                                    @if ($carmodels->Manufacture)
                                        <td>{{ $carmodels->Manufacture->name }}</td>
                                    @else
                                        <td>N/A</td>1
                                    @endif

                                    <td>{{ $carmodels->model_name }}</td>
                                    <td><span class="custom-color" style="background-color: {{$carmodels->color_code}}"></span></td>

                                    <th>{{ $carmodels->manufacturing_year }}</th>


                                    <td>
                                        {{ $carmodels->status == true ? 'Active' : 'Blocked' }}
                                    </td>
                                    <td>{{ date('d-M-Y h:i A', strtotime($carmodels->created_at)) }}</td>
                                    <td>
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('carmodels.edit', $carmodels->id) }}"
                                                    class="dropdown-item has-icon" title="Edit Detail">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="javascript:void(0)" data-role="delete-obj"
                                                    data-obj-id="{{ $carmodels->id }}"
                                                    class="dropdown-item has-icon delete-object" title="Delete Slider">
                                                    <i class="fa fa-trash text-danger"></i> Sold 
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td class="text-danger" colspan="9">
                                        <h5>No Record Found. </h5>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Manufacturer Name</th>
                                <th>Model Name</th>
                                <th>Color</th>

                                <th>manifacturing Year</th>
                                <th>Status</th>
                                <th>Added On</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <form id="formDelete" method="POST" action="{{ route('carmodels.delete') }}">
            @csrf
            <input type="hidden" name="carmodel_id" id="carmodel_id">
        </form>
    @endsection
    @section('extrajs')
        <script>
            $(document).ready(function() {
                // setTimeout(function() {
                //     if ($(".alert").is(":visible")) {
                //         $(".alert").fadeOut("fast");
                //     }
                // }, 3000)
                $(".delete-object").click(function() {
                    if (window.confirm("Are you sure, You want to Sold it ? ")) {
                        $("#carmodel_id").val($(this).attr("data-obj-id"));
                        $(this).attr('disabled', 'disabled');
                        $(this).html('<span class="fa fa-spinner fa-spin"></span> Loading...');
                        $("#formDelete").submit();
                    }
                });

            });
        </script>
    @endsection
