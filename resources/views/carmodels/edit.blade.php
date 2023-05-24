@extends('layouts.admin_master')
@section('title', 'Add Car Model')
<style>
    #namespan {
        color: red;
        font-size: 15px;
        font-weight: 600;
        margin-top: 5px;
    }

    #namespan_mobile {
        color: red;
        font-size: 15px;
        font-weight: 600;
        margin-top: 5px;
    }

    #namespan_email {
        color: red;
        font-size: 15px;
        font-weight: 600;
        margin-top: 5px;
    }
</style>
@section('content')

    <section class="section">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-dark text-white-all">
                <li class="breadcrumb-item">
                    <a href="{{ route('carmodels.index') }}"><i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('carmodels.index') }}"> All Car Models</a></li>
            </ol>
        </nav>

        <div class="card" ng-app="products">
            <div class="card-header bg-dark text-white-all">
                <h4>Add New Car Model</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('carmodels.store') }}" role="form" class="needs-validation"
                    id="formUpdateUser" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_id">Category <span class="text-danger">*</span></label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                <option value="">--Select Category--</option>
                                                @foreach ($categories as $cate)
                                                    <option value="{{ $cate->id }}"
                                                        {{ $cate->id == $carmodels->Manufacture->id ? 'selected' : '' }}>
                                                        {{ $cate->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="model_name">Model Name <span class="text-danger">*</span></label>
                                            <input type="text" name="model_name" id="model_name" class="form-control"
                                                placeholder="Enter Model Name" value="{{$carmodels->model_name}}" required>
                                            <span id="namespan"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="color_code">Choose Color <span class="text-danger">*</span></label>
                                            <input type="color" name="color_code" id="color_code" class="form-control"
                                                value="{{$carmodels->color_code}}" required>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="manufacturing_year">Manufacturing Year<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="manufacturing_year" id="manufacturing_year"
                                                class="form-control" placeholder="Enter Manufacturing Year" value="{{$carmodels->manufacturing_year	}}" required>
                                            <span id="namespan_mobile"></span>

                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="registration_number">Registration Number<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="registration_number" id="registration_number"
                                                class="form-control" value="{{$carmodels->registration_number}}"
                                                placeholder="Enter Registration Number " required>
                                            <span id="namespan_email"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image1">Image 1 <span class="text-danger">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" name="image1" class="custom-file-input"
                                                    id="image1" required>
                                                <label class="custom-file-label" for="image1">Choose file</label>
                                            </div>
                                            <label id="" class="error" for="image1"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image2">Image 2<span class="text-danger">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" name="image2" class="custom-file-input"
                                                    id="image2" required>
                                                <label class="custom-file-label" for="image2">Choose file</label>
                                            </div>
                                            <label id="" class="error" for="image_urls"></label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span>
                                            </label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div>
                                                <label>Existing Image </label>
                                            </div>
                                            <img src="{{ asset('storage/images/car_models/' . $carmodels->image1) }}"
                                                alt="{{ $carmodels->model_name }}"
                                                class="img img-responsive img-thumbnail" width="180px">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div>
                                                <label>Existing Image </label>
                                            </div>
                                            <img src="{{ asset('storage/images/car_models/' . $carmodels->image2) }}"
                                                alt="{{ $carmodels->model_name }}"
                                                class="img img-responsive img-thumbnail" width="180px">
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="" alt="asdasd">
                                    </div>

                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <img src="" alt="asdasd">
                                    </div>
                                </div>
                            </div> --}}



                    <div class="col-md-12 text-danger">
                        Note : All * Mark Fields are Compulsory !
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="button" id="button_submit" class="btn btn-primary btnSubmit">
                            <i class="fa fa-plus"></i> Add Car Model
                        </button>

                    </div>
            </div>
            </form>
        </div>
        </div>

    </section>

@endsection

@section('extracss')

    <style>
        #category_id+ul.category_div {
            height: 130px;
            overflow-x: auto;
        }

        #section_id {
            height: 155px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 42px !important;
        }
    </style>
@endsection

@section('extrajs')


    <script type="text/javascript">
        $("#button_submit").on('click', function(event) {
            event.preventDefault();
            let id = {{$carmodels->id}};

            let manufacturer_name = $('#category_id').val();
            let model_name = $('#model_name').val();
            let color_code = $('#color_code').val();
            let manufacturing_year = $('#manufacturing_year').val();
            let registration_number = $('#registration_number').val();
            let image1 = $('#image1')[0].files[0]; // Get the selected image file
            let image2 = $('#image2')[0].files[0]; // Get the selected image file
            let status = $('#status').val();

            let formData = new FormData(); // Create a new FormData object

            formData.append('manufacturer_name_id', manufacturer_name);
            formData.append('model_name', model_name);
            formData.append('color_code', color_code);
            formData.append('manufacturing_year', manufacturing_year);
            formData.append('registration_number', registration_number);
            formData.append('image1', image1); // Append the image file
            formData.append('image2', image2); // Append the image file
            formData.append('status', status);

            console.log('manufacturer_name_id', manufacturer_name);
            console.log('model_name', model_name);
            console.log('color_code', color_code);
            console.log('manufacturing_year', manufacturing_year);
            console.log('registration_number', registration_number);
            console.log('image1', image1);
            console.log('image2', image2);

            $.ajax({
                url: "http://localhost:8000/api/car_model/update/"+id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.message);
                    if (response.error !== 1) {
                        alert(response.message);
                        window.location = "{{ route('carmodels.index') }}";
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, exception, err) {
                    console.log('jqXHR', jqXHR);
                    console.log('exception', exception);
                    console.log('err', err);
                },
            });
        });
    </script>
@endsection
