<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>LOGIN - HRMIS</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- lock screen starts -->
                <section class="row flexbox-container">
                    <div class="col-xl-7 col-10">
                        <div class="card bg-authentication mb-0">
                            <div class="row m-0">
                                <!-- left lock screen section -->
                                <div class="col-md-6 col-12 px-0">
                                    <div class="card disable-rounded-right mb-0 p-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="text-center mb-2">Welcome to HRMIS - Admin</h4>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form  method="POST" id="form-auth-login" >
                                                    @csrf
                                                    <input type="hidden" name="role" value="1" >
                                                    <div class="form-group mb-50">
                                                        <label class="text-bold-600" for="exampleInputEmail1">Username</label>
                                                        <input  type="text" name="username" class="form-control"  required autocomplete="username" autofocus></div>
                                                    <div class="form-group">
                                                        <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                                        <input type="password" name="password" class="form-control" required autocomplete="current-password">
                                                    </div>
                                                    <div class="form-group">
                                                        <small class="text-danger error_msg_login"></small>
                                                    </div>
                                                    
                                                    {{-- <div class="text-center mb-1"><a href="auth-login.html" class="card-link"><small>Are
                                                                you not John Doe ?</small></a></div> --}}
                                                    <button type="button" class="btn btn-primary glow position-relative w-100 btn-login">Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right image section -->
                                <div class="col-md-6 d-md-block d-none text-center align-self-center">
                                    <img class="img-fluid" src="{{ asset('app-assets/images/pages/lock-screen.png" alt="branding logo" width="350') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- lock screen ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js') }}"></script>
    <script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
    <script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/footer.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
         $(function(){
            
            $('.btn-login').on('click', function(e){

                $.ajax({
                    url: '/auth/login',
                    method: 'post',
                    data: $('#form-auth-login').serialize(),
                    // processData: false,
                    // dataType: false,
                    // contentType: false,
                    beforeSend:function(){
                       // $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                     
                        console.log("data:::",data);
                        if(data.status === 401){
                           $('.error_msg_login').text(data.msg);
                        }else if(data.status === 200){
                          //  $('#add-employee-form')[0].reset();
                            //alert(data.msg);
                         //   $('#countries-table').DataTable().ajax.reload(null,false);
                         //$('#add-employee').modal('hide');
                         localStorage.setItem('authtoken', data.data.token);
                        localStorage.setItem('authname', data.data.firstname+' '+data.data.lastname);
                        localStorage.setItem('authtype', data.data.role);
                         $('.error_msg_login').text('');
                          //  toastr.success(data.msg);
                            window.location.href = '/'
                        }

                    }

                });
            });


         });
    </script>


</body>
<!-- END: Body-->

</html>