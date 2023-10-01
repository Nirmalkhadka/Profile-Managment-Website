<!DOCTYPE html>
<html>

<head>
  <title>PortfolioHub | Login</title>
  <link rel="stylesheet" type="text/css" href="{{url('landingFrontendFiles/css/login.css')}}">
</head>

<body style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center; position: relative;">

  <header>
    <div class="container1">
      <a href="{{url('/')}}"><h1 class="logo">PortfolioHub</h1> </a>
      
      <div class="user-actions">
        <a href="{{url('/login')}}" class="login-button btn" onclick="login.html">Login</a>

        <a href="{{url('/signup')}}" class="signup-button btn">Sign Up</a>
      </div>
    </div>
  </header>

  <div class="sidebar">

    <div class="share">
      <img src="{{url('landingFrontendFiles/images/share.png')}}" alt="">
    </div>

    <div class="social-links">
      <img src="{{url('landingFrontendFiles/images/fb.png')}}" alt="">
      <img src="{{url('landingFrontendFiles/images/ig.png')}}" alt="">
      <img src="{{url('landingFrontendFiles/images/tw.png')}}" alt="">
    </div>

    <div class="useful-links">
      <img src="{{url('landingFrontendFiles/images/info.png')}}" alt="">
      
    </div>
  </div>

  <div class="bubbles">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    <img src="{{url('landingFrontendFiles/images/bubble.png')}}" alt="">
    
  </div>

  <div class="container">

 
    <div class="login_cont">
      @if(session()->has('success'))
        <p class="sess-err">{{Session()->get('success')}}</p>
      @endif
      @if(session()->has('notRegister'))
        <p class="sess-err">{{Session()->get('notRegister')}}</p>
      @endif
      @if(session()->has('notMatch'))
        <p class="sess-err">{{Session()->get('notMatch')}}</p>
      @endif
      @if(session()->has('LoginFirst'))
        <p class="sess-err">{{Session()->get('LoginFirst')}}</p>
      @endif
      <!-- <h2>Login</h2> -->
      <form class="form" name="form" action="{{route('login-user')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" 
          @if(isset($_COOKIE["email"])) 
            value="{{$_COOKIE["email"]}}"
          @endif required>
          <div id="email-error">@error('email'){{$message}} @enderror</div>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" 
          @if(isset($_COOKIE["password"]))
          value="{{$_COOKIE["password"]}}"
          @endif required>
          <div id="pass-error">@error('password'){{$message}} @enderror</div>
        </div>
        <div class="form-group">
          <input type="checkbox" id="remember" name="remember" @if(isset($_COOKIE["email"])) checked="" @endif>
          <label for="remember">Remember me</label>
        </div>
        <button type="submit">Login</button>
      </form>
      <!-- Place this div after the form -->
      <div id="login-done">Login done</div>
    </div>

    <img src="{{url('landingFrontendFiles/images/contact.png')}}" alt="photo" class="p1">

  </div>



  


  <script src="{{url('landingFrontendFiles/js/login.js')}}"></script>

  <!-- start fotter  -->
  <div class="foter">
    &copyCopyrights belong to PortfolioHub
  </div>
</body>

</html>