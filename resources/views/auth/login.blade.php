<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
            Miel - ROBOTSchool
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
    </head>

<body>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                     <div class="card card-plain">
                        <a class="card-header pb-1 text-center"><img style="width:200px;" class="" src="assets/images/robotschool-logo.png" alt="logo "></a>
                         <h4 class="pb-0 text-start text-center">Ingresar</h4>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" role="form">
                                @csrf
                                <div class="mb-2">
                                    <label class="" for="signin-email"></label>
                                    <input id="signin-email" name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" for="signin-email" placeholder="Correo electrónico" value="{{ old('email') }}" aria-label="Email"  autocomplete="email" required="required" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div><!--//form-group-->
                                <div class="mb-2">
                                    <label class="sr-only" for="signin-password">Password</label>
                                    <input id="signin-password" name="password" type="password" class="form-control form-control-ls signin-password @error('password') is-invalid @enderror" placeholder="Contraseña"  autocomplete="current-password" required="required">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    <div class="extra mt-3 row justify-content-between">
                                        <!--
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" value="" id="RememberPassword" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label " for="RememberPassword">
                                                    Recordarme
                                                </label>
                                            </div>
                                        </div>
                                        -->
                                        <div class="col-12">
                                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                                @if (Route::has('password.request'))
                                                    <p class="mb-4 text-xs mx-auto">
                                                        <a class="text-primary text-gradient font-weight-bold" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                                    </p>
                                                @endif
                                            </div>
                                        </div><!--//col-6-->
                                    </div><!--//extra-->
                                </div><!--//form-group-->
                                <div class="text-center" style="margin-top: -25px;">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mb-0">Ingresar</button>
                                </div>
                            </form>
                        </div><!--//auth-form-container-->
                     </div><!--//auth-body-->
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
                                    background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">“No fuisteis criados para vivir como bestias, sino para seguir en pos de la virtud y la sabiduría”.</h4>
                                <p class="text-white position-relative"> Dante Alighieri.</p>
                            </div>
                        </div>
                    </div><!--//flex-column-->
                </div><!--//auth-main-col-->
            </div><!--//row-->
        </div>
    </section>
</main>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/argon-dashboard.min.js?v=2.0.2"></script>
</body>
</html>

