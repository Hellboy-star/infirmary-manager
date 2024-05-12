<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from seantheme.com/color-admin/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 09:03:18 GMT -->

<head>
    <meta charset="utf-8" />
    <title>SONEB CHS | Connexion</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="../assets/css/vendor.min.css" rel="stylesheet" />
    <link href="../assets/css/default/app.min.css" rel="stylesheet" />

    <?php
    header("refresh:300");
    ?>

</head>

<body class='pace-top'>

    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>


    <div id="app" class="app">

        <div class="login login-v2 fw-bold">

            <div class="login-cover">
                <div class="login-cover-img" style="background-image: url(../assets/css/default/images/ime.jpg)" data-id="login-cover-image"></div>
                <div class="login-cover-bg"></div>
            </div>


            <div class="login-container">

                <div class="login-header">
                    <div class="brand">
                        <div class="d-flex align-items-center">
                            <span class=""></span><b>INFIRMERIE SONEB</b> 
                        </div>
                        <small>Entrer vos identifiants de connexion</small>
                    </div>
                   <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>


                <div class="login-content">

                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                    <div class="form-floating mb-20px">
                            <input id="emailAddress" type="text" class="form-control fs-13px h-45px border-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Matricule</label>
                           @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        
                        
                        </div>
                    
                       
                        <div class="form-floating mb-20px">
                        <input id="password" type="password" class="form-control fs-13px h-45px border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            
                        <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Mot de Passe</label>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror    
                    </div>
                        <div class="form-check mb-20px">

                    
                           
                        </div>
                        <div class="mb-20px">
                            <button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Se connecter</button>
                        </div>
                       
                    </form>
                </div>

            </div>

        </div>

        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

    </div>


    <script src="{{asset('assets/js/vendor.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/app.min.js')}}" type="text/javascript"></script>


    <script src="{{asset('assets/js/demo/login-v2.demo.js')}}" type="text/javascript"></script>

   
 
</body>

<!-- Mirrored from seantheme.com/color-admin/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 09:03:29 GMT -->

</html>