

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PortfolioHub | Login</title>
    <link rel="stylesheet" type="text/css" href="{{url('adminFiles/css/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    
</head>

<body style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center; position: relative;">



    <div class="body-section">
        <div class="navbar-section">
            <div class="logo-section">
                <a href="login.html" class="logo">PortFolio<span>Hub</span></a>
            </div>
            



        </div>

        <div class="sign-in-section">
        @if(session()->has('notRegister'))
        <p class="sess-err">{{Session()->get('notRegister')}}</p>
      @endif
      @if(session()->has('notMatch'))
        <p class="sess-err">{{Session()->get('notMatch')}}</p>
      @endif
      @if(session()->has('LoginFirst'))
        <p class="sess-err">{{Session()->get('LoginFirst')}}</p>
      @endif
            <div class="form-section">
                <div class="form-container">
                    <h2 class="sign-in-heading">Admin - Login</h2>

            <form action="{{url('/admin-process')}}" method="post">
                @csrf
                <input type="email" name="email" placeholder="Email" class="email-container">

                <br>

                <input type="password" name="password" placeholder="Password" class="password-container">

                <br>

                <a href=""><input type="submit" name="submit" value="Login" class="sign-in-container"></a>


                

                
                


            </form>
                </div>
                
            </div>
            

        </div>


        
    </div>

    <div class="footer-container">
            <div class="copyright-section">
            <p class="line">&copy; 2023</p>
            <p class="line">www.portfolio's.com</p>
            <p>All Rights Reserved</p>
        </div>
    </div>


    <script src="js/function.js"></script>
</body>

</html>