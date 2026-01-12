<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<style>
     @import url('https://fonts.googleapis.com/css?family=Poppins');

/* BASIC */

/* html {
  background-color: #56baed;
} */

.bi.bi-facebook{
  color: blue;
  font-size:x-large;
}

.bi.bi-google{
  color: orangered;
  font-size:x-large;
}
.bi.bi-twitter{
  color: rgb(62, 207, 255);
  font-size:x-large;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
  background-color: rgb(255, 255, 255);
}

a {
  color: red;
  display:inline-block;
  text-decoration: none;
  font-size: small;
  text-decoration-line: underline;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}

input[type=checkbox] {
  width: 0%;
}

/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 98%;
  /* min-height: 100%; */
  padding: 20px;
}

.row{
  flex-wrap: wrap;
  margin-right: 0px;
  margin-left: -17px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 95%;
  /* max-width: 450px; */
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 10px 20px 0 rgba(0,0,0,0.5);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}

.custom-select.is-invalid, .form-control.is-invalid,
.was-validated .custom-select:invalid,
.was-validated .form-control:invalid {
     border-color: #ffffff; 
}

/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  /* border-bottom: 2px solid indigo; */
}
    .login-image{
        height: 100%;
        width: 100%;
    }


/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

* {
  box-sizing: border-box;
}

@media screen and (min-width: 200px) {
  input[type=button], input[type=submit], input[type=reset] {
    padding: 5px 4px;
    background-color: indigo;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    font-size: 13px;
    -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
    box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
    margin: 5px 20px 40px 20px;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }
}

@media screen and (min-width:600px){
  .check-box-p p{
    padding-right: 0%;
  }
  
  .back-gradient{
     background-image: linear-gradient(rgb(255, 255, 255), rgb(149, 0, 255)); 
  }
  .wrapper{
    height: 99vh;
  }
}

@media screen and (min-width:992px){
  .check-box-p p{
    color: rebeccapurple;
  }
  .login-image{
    width: 100vh;
    height: 100vh;
  }
}

@media (width <= 578px){
  .login-image{
    display: none;
  }
}


  .back-gradient{
    background-image: linear-gradient(rgb(255, 255, 255), rgb(213, 213, 213));
  }
  .wrapper{
    height: 100vh;
  }
  
 
@media screen and (min-width: 400px) {
  input[type=button], input[type=submit], input[type=reset]  {
  background-color: indigo;
  border: none;
  color: white;
  padding: 15px 56px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: rgb(123, 0, 210);
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}

input[type=email] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=email]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=email]:placeholder {
  color: #cccccc;
}



input[type=checkbox] {
  /* background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px; */
  width: 70px;
  height: 17px;
  /* border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px; */
}
input[type=checkbox]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=checkbox]:placeholder {
  color: #cccccc;
}

input[type=password] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=password]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=password]:placeholder {
  color: #cccccc;
}


</style>
<body>
    <div class="row back-gradient">
        <div class="col-lg-5 col-md-6 col-sm-6">
            <img class="login-image image-fluid" src="{{asset('/images/ai.jpg')}}" alt="">
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: rgb(0, 0, 0); font-size: large;">PIFFERS Security Services</p>
                    <img src="{{asset('/images/piffer-logo1.png')}}" alt=""> <br>
                    <h5 class="active mt-5"> <i class="bi bi-door-open-fill"></i> Admin Login Panel </h5>
                    @if($errors->any())
                      @foreach($errors->all() as $error)
                      <p style="color:red;">{{ $error }}</p>
                      @endforeach
                    @endif

                    @if(Session::has('error'))
                      <p style="color:red;">{{ Session::get('error') }}</p>
                    @endif
                    <!-- Login Form -->
                    <form id="loginForm" action="{{ route('login.post') }}" method="POST" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-lg-1 mt-2" style="margin-left: 5%;">
                                <h4><i class="bi bi-envelope-fill"></i></h4>
                            </div>
                            <div class="col-lg-9">
                                <input type="email" id="login" style="width: 95%;" class="fadeIn second form-control" name="email" placeholder="Email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-1 mt-2" style="margin-left: 5%;">
                                <h4><i class="bi bi-key-fill"></i></h4>
                            </div>
                            <div class="col-lg-9 ">
                                <input type="password" id="password" style="width: 95%;" class="fadeIn third form-control" name="password" placeholder="Password" required autocomplete="current-password">
                            </div>
                        </div>
                      <!--   <div class="row">
                            <div class="col-lg-6" style="margin-top: 1px;">
                                <div class="row" style="margin-left:0%">
                                    <div class="col-lg-3">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="">
                                    </div>
                                    <div class="col-lg-8 check-box-p">
                                        <p style="font-size: small;"> Remember Me </p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="container">
                            <input type="submit" class="fadeIn fourth" value="Log In">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript"> 
$(document).ready( function() {
$('#successMessage').delay(1000).fadeOut();
});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>