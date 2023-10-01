<!DOCTYPE html>
<html>

<head>
  <title>PortfolioHub | Signup</title>
  <link rel="stylesheet" type="text/css" href="{{url('landingFrontendFiles/css/signup.css')}}">
</head>

<body
  style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center; position: relative;">

  <header>
    <div class="container1">
      <a href="{{url('/')}}">
        <h1 class="logo">PortfolioHub</h1>
      </a>

      <div class="user-actions">
        <a href="{{url('/login')}}" class="login-button btn1" onclick="login.html">Login</a>

        <a href="{{url('/signup')}}" class="signup-button btn1">Sign Up</a>
      </div>
    </div>
  </header>
  <!-- header ends  -->

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

  <div class="main_container">

    @if(Session::has('fail'))
    <p class="sess-err">{{Session::get('fail')}}</p>
    @endif

    <div>



      <form name="form" action="{{route('signup-user')}}" method="post" enctype="multipart/form-data" class="container">
        @csrf
        <div>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{old('name')}}">
            <div id="name-error">@error('name'){{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{old('email')}}">
            <div id="email-error">@error('email'){{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <div id="password-error">@error('password'){{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number:(Optional)</label>
            <input type="tel" id="phone" name="number">
            <div id="phone-error"></div>
          </div>

          <button type="submit" class="signup-btn">Signup</button>

        </div>


        <div class="profile_cont">
          <!-- profile picture  -->

          <div class="btn">
            <img src="{{url('landingFrontendFiles/images/add_profile.png')}}" alt="profile" id="photo">
            <input type="file" id="file" name="image" >
            <!-- <div id="image-error"></div> -->
            <label for="file" id="uploadbtn1">Choose photo</label>
            <script src="{{url('landingFrontendFiles/js/profile.js')}}"></script>
          </div>
          <div id="photo-error">@error('image'){{$message}} @enderror</div>
          <div class="profile-name">Add Profile</div>
        </div>
      </form>

    </div>

    <!-- <button type="submit" class="signup-btn">Signup</button> -->



  </div>
  <script src="{{url('landingFrontendFiles/js/signup.js')}}"></script>

  <!-- start fotter  -->
  <footer class="foter">
    &copyCopyrights belong to PortfolioHub
  </footer>
</body>

</html>