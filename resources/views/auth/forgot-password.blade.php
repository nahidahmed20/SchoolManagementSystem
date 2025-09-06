<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Login - Student Management System</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="{{asset('backend/img/favicon.jpg')}}"/>
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('backend/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Forgot Password</strong></div>
                    <form action="{{route('password.email')}}" class="form-horizontal" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="E-mail" name="email" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a href="{{route('login')}}" class="btn btn-link btn-block">Back to Login</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-info btn-block">Send Password Reset Link</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; {{date('Y')}} Student Management System
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>

