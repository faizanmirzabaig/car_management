<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>User LOGIN </title>
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
        .alert {
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: -2px;
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
                            <div class="card-header">

                                <h4>USER LOGIN</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.login.store') }}"
                                    class="md-float-material form-material needs-validation" id="formLogin"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="password" class="control-label">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            placeholder="Your Email Address" required tabindex="1" autofocus>
                                        {{-- <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-eye-slash"
                                                        id="eye"></i>
                                                </div>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password"
                                                placeholder="Confirm Password">
                                        </div>
                                        {{-- <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                        </span> --}}
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="remember"
                                                id="remember" checked>
                                            <label class="custom-control-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="btnSubmit"
                                            class="btn btn-primary btn-lg btn-block btnSubmit" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <h5 style="text-align: center;font-size:18px;color: red;">OR</h5>
                                <hr style="border-top: 1px solid rgba(0, 0, 0, .3);                                ">
                                <a href="{{ route('user.register') }}"
                                    style="text-align: center;display: flex;justify-content: center;color: #6777ef;font-size: 18px;font-weight:bold;">Register</a>
                                <hr style="border-top: 1px solid rgba(0, 0, 0, .3);">
                                <div class="mt-5 text-muted text-left">
                                    <a href="{{ route('user.register') }}" target="_blank"><i
                                            class="fa fa-angle-double-left" aria-hidden="true"></i> Go to Website </a>
                                </div>
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


    {{-- <script type="text/javascript">
        console.log('hi');
        let email = document.getElementById("email");
        let password = document.getElementById("password");
        $("#btnSubmit").on('click', function(event) {
            let emailVal = $('#email').val();
            let passwordVal = $('#password').val();
            $.ajax({
                url: "{{ route('user.login.store') }}",
                type: "POST",
                data: {
                    'email': emailVal,
                    'password': passwordVal,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    console.log(response.message);
                    if (response.error !== 1) {
                        alert(response.message);
                        // console.log(response.authorisation.token);
                        window.location = "{{ route('users.index') }}";

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
    </script> --}}

</body>

</html>
