@extends('layouts.admin_master')
@section('title', 'Edit Manufacturer')
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
                    <a href="{{ route('categories.all') }}"><i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('categories.all') }}"> Edit Manufacturer</a></li>
            </ol>
        </nav>

        <div class="card" ng-app="products">
            <div class="card-header bg-dark text-white-all">
                <h4>Edit Manufacturer</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('categories.add') }}" role="form" class="needs-validation"
                    id="formUpdateManufacturer" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="manufacturer_name">Manufacturer Name <span class="text-danger">*</span></label>
                                    <input type="text" name="manufacturer_name" id="manufacturer_name" class="form-control" 
                                        placeholder="Enter Manufacturer Name" value="{{$category->name}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span> </label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="1" {{ $category->status == true ? 'selected': '' }} >Active</option>
                                        <option value="0" {{ $category->status == false ? 'selected': '' }} >Inactive</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12 text-danger">
                                Note : All * Mark Fields are Compulsory !
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="button" id="button_submit" class="btn btn-primary btnSubmit">
                                    <i class="fa fa-plus"></i> Add Manfacturer
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


    <script>
        $("#button_submit").on('click', function(event) {

         let manufacturer_name_val= $('#manufacturer_name').val();
         let status_val=$('#status').val();
         let id={{$category->id}};
         console.log(id);

        console.log(manufacturer_name_val);
        console.log(status_val);


        $.ajax({
            url: "http://localhost:8000/api/update/"+id,
            type: "POST",
            data: {
                'name': manufacturer_name_val,
                'status': status_val
            },
            success: function(response) {
                console.log(response.message);
                if (response.error !== 1) {
                    alert(response.message);
                    // console.log(response.authorisation.token);
                    window.location = "{{ route('categories.all') }}";

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
