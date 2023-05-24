@extends('layouts.admin_master')
@section('title', 'Manage Manufacturer')
@section('content')

    <section class="section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-dark text-white-all">
                <li class="breadcrumb-item"><a href="{{ route('categories.all') }}"><i class="fas fa-home"></i>
                        Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Manufacturer</li>
                <li class="breadcrumb-item"><a href="{{ route('categories.create') }}"><i class="fas fa-plus"></i> Add
                        Manufacturer</a></li>
            </ol>
        </nav>

        <div class="card">

            <div class="card-header bg-dark text-white-all">
                <h4>Manage Manufacturer</h4>
            </div>


            <div class="card-body">
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
                @if (Session::has('error'))
                    <div class="alert alert-danger ">
                        <span class="close" onclick="this.parentElement.style.display='none';"
                            style="cursor: pointer;">&times;</span>
                        {{-- @foreach ($errors->all() as $error) --}}
                        <li>
                            <span class="text-white">{{ Session::get('error') }}</span>
                        </li>
                        {{-- @endforeach --}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Manufacturer Name</th>
                                <th>Status</th>
                                <th>Added On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>

                                    @if ($category->pcategory)
                                        <td>{{ $category->pcategory->name }} > {{ $category->name }} </td>
                                    @else
                                        <td>{{ $category->name }} </td>
                                    @endif
                                    <td>
                                        {{ $category->status == true ? 'Active' : 'Blocked' }}
                                    </td>
                                    <td>{{ date('d-M-Y h:i A', strtotime($category->created_at)) }}</td>
                                    <td>
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="dropdown-item has-icon" title="Edit Detail">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="javascript:void(0)" data-role="delete-obj"
                                                data-obj-id="{{$category->id}}"
                                                class="dropdown-item has-icon delete-object" title="Delete Manufacturer">
                                                <i class="fa fa-trash text-danger"></i> Delete
                                            </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td class="text-danger" colspan="5">
                                        <h5>No Record Found.
                                        </h5>
                                    </td>
                                </tr>
                            @endforelse
                            @if ($categories->total() > 50)
                                <tr class="text-center">
                                    <td colspan="5">
                                        {{ $categories->links() }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Added On</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </section>

    <form id="formDelete" method="POST" action="{{route('categories.delete') }}">
        @csrf
        <input type="hidden" name="manufacturer_id" id="manufacturer_id">
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
                if (window.confirm("Are you sure, You want to Delete ? ")) {
                    $("#manufacturer_id").val($(this).attr("data-obj-id"));
                    $(this).attr('disabled', 'disabled');
                    $(this).html('<span class="fa fa-spinner fa-spin"></span> Loading...');
                    $("#formDelete").submit();
                }
            });

        });
    </script>
@endsection
