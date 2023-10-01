<?php
  use App\Models\User;
  new User();
  if (session()->has('loginId')) {
    $uid = session()->get('loginId');
  }
  $users = User::where('profile_uid','=',$uid)->first();

?>

<!DOCTYPE html>
<html>

<head>
  <title>PrtfolioHub | GetStarted</title>
  <link rel="stylesheet" type="text/css" href="{{url('landingFrontendFiles/css/getStarted.css')}}">
</head>

<body
  style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center; position: relative;">

  <header>
    <div class="container1">
      <a href="{{url('/getStarted')}}">
        <h1 class="logo">PrtfolioHub</h1>
      </a>

      <div class="user-actions">


        <a href="{{url('/logout')}}" class="signup-button btn1">Logout</a>
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


  <div style="display: flex;">
    <div class="container" id="slideDiv">

      
      <h1 class="userName">Hello , {{$users->name}}</h1>
      
      <p class="webInfo">Welcome to ProjectHub, the ultimate platform for managing and sharing your creative projects.
        Whether
        you're a solo creator or part of a team, our website provides a seamless experience for organizing, uploading,
        and collaborating on your projects. Showcase your work, share your projects with others, and take
        your creativity to new heights with ProjectHub. Start your journey today!"
      </p>
      <div class="start-cont">
        <div>
          <h3 class="letStart">Lets Continue with your profile information --></h3>
        </div>
        <div class="user-actions">
          <a  class="login-button btn1" id="slideButton">Lets Start</a>
        </div>
      </div>


    </div>

    <div class="container2" id="slideDiv2">




    <!-- <form action="{{route('getstarted-user')}}" method="post" enctype="multipart/form-data">
      @csrf

        <input type="file" name="coverimage" id="" required>
        <input type="text" name="youare" id="" required>
        <input type="text" name="yourdesc" id="" required>
        <input type="submit" value="">
      </form> -->


      <form action="{{route('getstarted-user')}}" method="post" enctype="multipart/form-data" class="form">
      @csrf
        <div class="errorfield">
        
          <p>All Fields Are Required!!</p>
        
        </div>
        <div class="progressbar">
          <div class="progress" id="progress"></div>
          <div class="progress-step progress-step-active" data-title="About"></div>
          <div class="progress-step" data-title="Coding Skill"></div>
          <div class="progress-step" data-title="Profressional Skill"></div>
          <div class="progress-step" data-title="Education"></div>
        </div>

        <div class="form-step form-step-active">
          <div class="form-group">
            <label for="name">You are a <span style="color: red;">*</span> : </label>
            <input type="text" name="youare" id="" required>
            <!-- <input type="text" id="name" name="youare" required> -->
            <div id="name-error"></div>
          </div>
          <div class="form-group">
            <label for="name">Write About Yourself <span style="color: red;">*</span> :</label>
            <!-- <input type="text" name="yourdesc" id="" required class="about"> -->
            <textarea type="text" class="about" name="yourdesc"></textarea required>
            <div id="name-error"></div>
          </div>
          
          <div class="btns-group">
            <!-- <a  class="btn2 btn-prev">Previous</a> -->
            <a  class="btn2 btn-next">Next</a>
          </div>


        </div>

        <div class="form-step ">
          <div class="form-group">
            
            <div class="form-group-part1">

              <div class="sub" id="rm-group1">
                <div>
                  <label for="name">Skill <span style="color: red;">*</span> : </label>
                  <input type="text" id="name" name="skill[]" >
                  
                </div>
                <div class="sub-1">
                  <label for="name" >% You Cover <span style="color: red;">*</span> : </label>
                  <input type="number" id="name" name="perCover[]" >
                  
                </div>
                <!-- <div class="rm-group">
                  <a class="remove" id="rm1">-</a>
                </div> -->

              </div>
              
            </div>

            <div class="form-group-part1">

              <div class="sub" id="rm-group2">
                <div>
                  <label for="name">Skill <span style="color: red;">*</span> : </label>
                  <input type="text" id="name" name="skill[]" >
                  
                </div>
                <div class="sub-1">
                  <label for="name" >% You Cover <span style="color: red;">*</span> : </label>
                  <input type="number" id="name" name="perCover[]" >
                  
                </div>
                <!-- <div class="rm-group">
                  <a class="remove" id="rm2">-</a>
                </div> -->

              </div>
              
            </div>
            <div class="form-group-part1">

              <div class="sub" id="rm-group3">
                <div>
                  <label for="name">Skill <span style="color: red;">*</span> : </label>
                  <input type="text" id="name" name="skill[]" >
                  
                </div>
                <div class="sub-1">
                  <label for="name" >% You Cover <span style="color: red;">*</span> : </label>
                  <input type="number" id="name" name="perCover[]" >
                  
                </div>

                <!-- <div class="rm-group">
                  <a class="remove" id="rm3">-</a>
                </div> -->

              </div>
              
            </div>
            <div class="form-group-part2">
              
            </div>
            <div class="add-group">
              <a  class="add" id="add">+</a>
            </div>
            
            
          </div>
          <div class="form-group">
            
          </div>
          
          <div class="btns-group">
            <a  class="btn2 btn-prev">Previous</a>
            <a  class="btn2 btn-next">Next</a>
          </div>


        </div>

        


        <div class="form-step">
          <div class="form-group">
            
            <div class="form-group-part1">

              <div class="sub" id="rm-group1">
                <div>
                  <label for="name">Skill <span style="color: red;">*</span> : </label>
                  <input type="text" id="name" name="pskill[]" >
                  
                </div>
                <div class="sub-1">
                  <label for="name" >% You Cover <span style="color: red;">*</span> : </label>
                  <input type="number" id="name" name="pperCover[]" >
                  
                </div>
                <!-- <div class="rm-group">
                  <a class="remove" id="rm1">-</a>
                </div> -->

              </div>
              
            </div>

            <div class="form-group-part1">

              <div class="sub" id="rm-group2">
                <div>
                  <label for="name">Skill <span style="color: red;">*</span> : </label>
                  <input type="text" id="name" name="pskill[]" >
                  
                </div>
                <div class="sub-1">
                  <label for="name" >% You Cover <span style="color: red;">*</span> : </label>
                  <input type="number" id="name" name="pperCover[]" >
                  
                </div>
                <!-- <div class="rm-group">
                  <a class="remove" id="rm2">-</a>
                </div> -->

              </div>
              
            </div>
            <div class="form-group-part1">

              <div class="sub" id="rm-group3">
                <div>
                  <label for="name">Skill <span style="color: red;">*</span> : </label>
                  <input type="text" id="name" name="pskill[]" >
                  
                </div>
                <div class="sub-1">
                  <label for="name" >% You Cover <span style="color: red;">*</span> : </label>
                  <input type="number" id="name" name="pperCover[]" >
                  
                </div>

                <!-- <div class="rm-group">
                  <a class="remove" id="rm3">-</a>
                </div> -->

              </div>
              
            </div>
            <div class="form-group-part5">
              
            </div>
            <div class="add-group">
              <a  class="add" id="add5">+</a>
            </div>
            
            
          </div>
          
          
          <div class="btns-group">
            <a  class="btn2 btn-prev">Previous</a>
            <a  class="btn2 btn-next">Next</a>
          </div>


        </div>



        <div class="form-step">
          <div class="form-group">
            
            <div class="form-group-part2">
              <label for="name">Degree Name <span style="color: red;">*</span> : </label>
              <input type="text" id="name" name="degreeName[]" >
              <div class="sub2">
                <div>
                  <label for="name">Start Date <span style="color: red;">*</span> : </label>
                  <input type="date" id="name" name="startDate[]" >
                  
                </div>
                <div class="sub-1">
                  <label for="name" >End Date  : </label>
                  <input type="date" id="name" name="endDate[]" >
                  
                </div>

              </div>
              <label for="name">Instutition Name <span style="color: red;">*</span> : </label>
              <input type="text" id="name" name="instutionName[]" >
              <label for="name">Major Subject <span style="color: red;">*</span> : </label>
              <input type="text" id="name" name="majorSubject[]" >
              <!-- <div class="rm-group">
                <a class="remove" id="add1">--</a>
              </div> -->
              

              <hr class="dynamic-hr">
            </div>
            <div class="form-group-part3">
              
            </div>
            <div class="add-group">
              <!-- <a  class="add" id="add1">--</a> -->
              <a  class="add" id="add2">+</a>
            </div>
            
            
          </div>
          <div class="form-group">
            
          </div>
          
          <div class="btns-group">
            <a  class="btn2 btn-prev">Previous</a>
            <input type="submit" value="Submit" class="btn2">
            <!-- <input type="submit" value="submit" class="btn2"> -->
            <!-- <button type="submit" class="btn2">Submit</button> -->
            <!-- <a href="" type="submit" class="btn2 btn-next">login</a> -->
          </div>
          


        </div>
        <!-- <button type="submit" class="btn2">Submit</button> -->
      </form>



    </div>

  </div>







  <script src="{{url('landingFrontendFiles/js/profile.js')}}"></script>
  <script src="{{url('landingFrontendFiles/js/login.js')}}"></script>
  <script src="{{url('landingFrontendFiles/js/getStarted.js')}}"></script>

  <!-- start fotter  -->
  <div class="foter">
    &copyCopyrights belong to PrtfolioHub
  </div>
</body>

</html>

