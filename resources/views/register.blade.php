<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>USER REGISTER</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{!! asset('admin/css/app.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/bundles/bootstrap-social/bootstrap-social.css') !!}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{!! asset('admin/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/css/components.css') !!}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{!! asset('admin/css/custom.css') !!}">
    <link rel='shortcut icon' type='image/x-icon' href="{!! asset('admin/img/favicon.ico') !!}" />
    <style>
        .form-group {
            margin-bottom: 18px ;
        }

        .form_group_submit {
            margin-top: 28px;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>USER REGISTER</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.login.register') }}"
                                    class="md-float-material form-material needs-validation" id="formUpdateUser"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="control-label">Name</label>
                                        <input id="name" type="name" class="form-control" name="name"
                                            placeholder="Your Name">
                                        <span id="namespan" class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            placeholder="Your Email Address">
                                        </span>
                                        <span id="namespan_email" class="invalid-feedback2" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="mobile" class="control-label">Mobile</label>
                                        </div>
                                        <input id="mobile" type="number" class="form-control" name="mobile"
                                            placeholder="Your Mobile">
                                        <span id="namespan_mobile" class="invalid-feedback3" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-eye-slash" id="eye"></i>
                                                </div>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password"
                                                placeholder="Confirm Password">
                                        </div>
                                        <span id="namespan_password" class="invalid-feedback4" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                    <div class="form-group form_group_submit">
                                        <button type="button"  id="btnSubmit" class="btn btn-primary btn-lg btn-block btnSubmit"
                                            tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Designed & Developed By <a href="#" target="_blank">99Yrs Network LLP</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{!! asset('admin/js/app.min.js') !!}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{!! asset('admin/js/scripts.js') !!}"></script>
    <!-- Custom JS File -->
    <script src="{!! asset('admin/js/custom.js') !!}"></script>
    <script src="{!! asset('admin/js/jquery.validate.min.js') !!}"></script>

    <script type="text/javascript">
      
        $("#btnSubmit").on('click', function(event) {
            // event.preventDefault();

                console.log(' i m at  sent');
                let nameVal = $('#name').val();
                let mobile = $('#mobile').val();
                let emailVal = $('#email').val();
                let passwordVal = $('#password').val();
                        $.ajax({
                            url: "http://localhost:8000/api/register",
                            type: "POST",
                            data: {
                                'name': nameVal,
                                'email': emailVal,
                                'password': passwordVal,
                                'mobile':mobile,
                            },
                            success: function(response) {
                                console.log(response.message);
                                if(response.error!==1){
                                    alert(response.message);
                                    // console.log(response.authorisation.token);
                                    window.location = "{{route('user.login')}}";

                                }
                                else{
                                    alert(response.message);
                                }
                               
                            },
                            error: function (jqXHR, exception,err) {
                                console.log('jqXHR',jqXHR);
                                console.log('exception',exception);
                                console.log('err',err);
                                
                            },
                        });
           
        });
    </script>
</body>

</html>
