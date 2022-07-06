<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ICS Students Attendance Notification System | </title>

    <!-- Bootstrap -->
    <link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('/')}}/gentelella-master/gentelella-master/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('/')}}/gentelella-master/gentelella-master/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form>
               @csrf
              <h2>ICS Students Attendance Notification System (ISANS)</h2>

              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
              </div>
              <div>
              <!--   <a class="btn btn-success btn-block submit" href="index.html">Log in</a> -->
                <a class="btn btn-success btn-block" onclick="login()" style="color:white;">Log in</a>
               
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
   <script src="{{url('/')}}/gentelella-master/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  


function login(){
  console.log('test');

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;


    if (username !== '' || password !== '') {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({

        type:"POST",
        url:'../public/loginfunction',
        dataType:'html',
        data: {
          username:username,
          password:password,

        },
        success:function(data) {


          if (data == 1) {
                window.location.href= '../public/mainmenu/dashboard';

          }else{

            alert('Invalid Credentials');
          }
          
        }
      });


    }else{

      alert('Please fill in username and password');
    }







      


  }

</script>