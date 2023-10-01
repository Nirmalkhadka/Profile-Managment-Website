<?php
  use App\Models\Profile;
  use App\Models\User;
  use App\Models\CodingSkills;
  use App\Models\ProfessionalSkills;
  use App\Models\ProfileEducation;
  new User();
  new Profile();
  new CodingSkills();
  new ProfessionalSkills();
  new ProfileEducation();
  

//   if (session()->has('loginId')) {
//     $uid = session()->get('loginId');
//   }

  $uid = $customoerId;
  
  $users = User::where('profile_uid','=',$uid)->first();
  $allusers = User::all();
  $profile = Profile::where('profile_uid','=',$uid)->first();

  $codingSkills = CodingSkills::where('profile_uid','=',$uid)->get();

  $profSkills = ProfessionalSkills::where('profile_uid','=',$uid)->get();

  $profileEducations = ProfileEducation::where('profile_uid','=',$uid)->get();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{url('landingFrontendFiles/css/home.css')}}">
  <!-- box icon -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="{{url('landingFrontendFiles/css/editProfile.css')}}">

  <title>PortfolioHub | EditProfile</title>
</head>

<body
  style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center;">



  <div>

    <div class="members-con">
      <div class="member-heading">
        <p>Members</p>
      </div>

      <div class="member" style="margin-top: 5.5rem;">

        @foreach($allusers as $alluser)
        <div class="header-con">
          <a href="{{route('customhome',['id'=> $alluser->profile_uid])}}"><img
              src="{{asset('/images/UserprofilePic/'.$alluser->profilePic)}}" alt=""
              style="width: 3.2rem; height: 3.2rem; border-radius: 50%; border: 3px solid #00abf0;"></a>
          <a href="{{route('customhome',['id'=> $alluser->profile_uid])}}" style="padding-left: .5rem;">
            <h1 class="logo" style="margin-left: .5rem; font-size: 25px;">{{$alluser->name}}</h1>
          </a>
        </div>
        @endforeach





      </div>


    </div>


  </div>


  <!-- header design -->

  <header class="header">
    <a href="#" class="logo">{{$users->name[0]}}.</a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <nav class="navbar">
      <a href="{{url('/home')}}" class="active">Home</a>
      <a href="{{url('/home')}}#about">About</a>
      <a href="{{url('/home')}}#education">Education</a>
      <a href="{{url('/home')}}#skills">Skills</a>
      <a href="{{url('/projects')}}">Projects</a>
      <a href="{{url('/home')}}#contact">Contact</a>
    </nav>

    <div class="useful-links">
      <a href="#" class="setting-link"><i class='bx bx-color dropbtn' onclick="myFunction()"></i></a>


    </div>
    <div id="myDropdown" class="dropdown-content">
      <a href="" class="s-t"><span>Edit Profile</span><i class='bx bxs-user-circle'></i></a>
      
      <a href="{{url('/logout')}}" onclick=" return confirm('Are You sure you want to logout?');"
        class="s-t"><span>Logout</span> <i class='bx bxs-door-open'></i></a>
    </div>

  </header>

  <section>

    <div class="container2" id="slideDiv2">

      <form action="{{url('/editprofilecontrol',['profile_uid'=> $uid])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="errorfield">
          <div class="update-heading">Update Profile</div>

          <!-- <p>All Fields Are Required!!</p> -->

        </div>
        <div class="progressbar">
          <div class="progress" id="progress"></div>
          <div class="progress-step progress-step-active" data-title="Personal"></div>
          <div class="progress-step " data-title="About"></div>
          <div class="progress-step" data-title="Coding"></div>
          <div class="progress-step" data-title="Profressional"></div>
          <div class="progress-step" data-title="Education"></div>
        </div>

        <div class="form-step form-step-active">


          <div class="form-group-section">
            <div>
              <div class="form-group">
                <label for="name">Name : </label>
    
                <input type="text" name="name" value="{{$users->name}}" id="">
    
                <div id="name-error"></div>
              </div>
  
              <div class="form-group">
                <label for="number">Number : </label>
    
    
                <input type="number" name="number" value="{{$users->number}}" class="number" id="">
    
                <div id="name-error"></div>
              </div>
    
  
            </div>

            <div>
              <div class="profile_cont">
                <!-- profile picture  -->
      
                <div class="btn">
                  <img src="{{asset('/images/UserprofilePic/'.$users->profilePic)}}" alt="profile" id="photo">
                  <input type="file" id="file" name="images" value="{{$users->profilePic}}">
                  <!-- <div id="image-error"></div> -->
                  <label for="file" id="uploadbtn1">Choose photo</label>
                  <script src="{{url('landingFrontendFiles/js/profile.js')}}"></script>
                </div>
                <div id="photo-error">@error('image'){{$message}} @enderror</div>
                <div class="profile-name">Update Photo</div>
              </div>
  
            </div>

          </div>

          

          
          




          


          <div class="btns-group">
            <!-- <a  class="btn2 btn-prev">Previous</a> -->
            <a class="btn2 btn-next">Next</a>
          </div>


        </div>



        <div class="form-step ">
          <div class="form-group">
            <label for="name">You are a : </label>


            <input type="text" name="youare" value="{{$profile->youAre}}" id="">

            <div id="name-error"></div>
          </div>
          <div class="form-group">
            <label for="name">Edit About Yourself :</label>

            <textarea type="text" class="about" name="yourdesc">{{$profile->yourDesc}}</textarea>
            <div id="name-error"></div>
          </div>

          <div class="btns-group">
            <a class="btn2 btn-prev">Previous</a>
            <a class="btn2 btn-next">Next</a>
          </div>


        </div>

        <div class="form-step ">
          <div class="form-group">

            <?php
            $item =0;
            ?>
            @foreach($codingSkills as $codingSkill)

            <div class="form-group-part1" id="form-div-{{$item}}">

              <div class="sub" id="rm-group1">
                <div>
                  <label for="name">Skill : </label>
                  <input type="text" name="skill[]" value="{{$codingSkill->skill}}">

                </div>
                <div class="sub-1">
                  <label for="name">% You Cover : </label>
                  <input type="number" name="perCover[]" value="{{$codingSkill->per_you_cover}}">

                </div>
                <div class="rm-group" onclick="deleteFormDiv({{$item}})">
                  <a class="remove" onclick="deleteFormDiv({{$item}})"><i class='bx bxs-trash'></i></a>
                </div>

              </div>

            </div>
            <?php
            $item++;
            ?>

            @endforeach



            <div class="form-group-part2">

            </div>
            <div class="add-group">

              <a class="add" id="add">+</a>
            </div>


          </div>
          <div class="form-group">

          </div>

          <div class="btns-group">
            <a class="btn2 btn-prev">Previous</a>
            <a class="btn2 btn-next">Next</a>
          </div>


        </div>




        <div class="form-step">
          <div class="form-group">

            <?php
            $item =0;
            ?>
            @foreach($profSkills as $profSkill)

            <div class="form-group-part1" id="form-div-{{$item}}">

              <div class="sub" id="rm-group1">
                <div>
                  <label for="name">Skill : </label>
                  <input type="text" name="pskill[]" value="{{$profSkill->skill}}">

                </div>
                <div class="sub-1">
                  <label for="name">% You Cover : </label>
                  <input type="number" name="pperCover[]" value="{{$profSkill->per_you_cover}}">

                </div>
                <div class="rm-group" onclick="deleteFormDiv({{$item}})">
                  <a class="remove" onclick="deleteFormDiv({{$item}})"><i class='bx bxs-trash'></i></a>
                </div>

              </div>

            </div>
            <?php
            $item++;
            ?>
            @endforeach



            <div class="form-group-part5">

            </div>
            <div class="add-group">
              <!-- <a class="remove" id="rm1">-</a> -->
              <a class="add" id="add5">+</a>
            </div>


          </div>


          <div class="btns-group">
            <a class="btn2 btn-prev">Previous</a>
            <a class="btn2 btn-next">Next</a>
          </div>


        </div>



        <div class="form-step">
          <div class="form-group">

            <?php
            $item =0;
            ?>
            @foreach($profileEducations as $profileEducation)
            <div class="form-group-part2" id="form-div-{{$item}}">
              <div class="sub6">
                <label for="name">Degree Name : </label>
                <input type="text" name="degreeName[]" value="{{$profileEducation->degree_name}}">
                <div class="sub2">
                  <div>
                    <label for="name">Start Date : </label>
                    <input type="date" name="startDate[]" value="{{$profileEducation->start_date}}">

                  </div>
                  <div class="sub-1">
                    <label for="name">End Date : </label>
                    <input type="date" name="endDate[]" value="{{$profileEducation->end_date}}">

                  </div>

                </div>
                <label for="name">Instutition Name : </label>
                <input type="text" name="instutionName[]" value="{{$profileEducation->instution_name}}">
                <label for="name">Major Subject : </label>
                <input type="text" name="majorSubject[]" value="{{$profileEducation->major_subject}}">


                <div class="rm-group" onclick="deleteFormDiv({{$item}})">
                  <a class="remove" onclick="deleteFormDiv({{$item}})"><i class='bx bxs-trash'></i></a>
                </div>
                <hr class="dynamic-hr">

              </div>

            </div>
            <?php
            $item++;
            ?>
            @endforeach
            <div class="form-group-part3">

            </div>
            <div class="add-group" id="add4">

              <a class="add">+</a>
            </div>


          </div>


          <div class="btns-group">
            <a class="btn2 btn-prev">Previous</a>
            <input type="submit" name="submit" value="Submit" class="btn2">
            <!-- <input type="submit" value="submit" class="btn2"> -->

            <!-- <a href="" type="submit" class="btn2 btn-next">login</a> -->
          </div>



        </div>
      </form>




    </div>
    </div>

  </section>


  <!-- footer design -->

  <footer class="footer">
    <div class="footer-text">
      <p>Copyright &copy; 2023 by PortfolioHub | All Rights Reserved</p>

    </div>

    <div class="footer-iconTop">
      <a href="#"><i class='bx bx-up-arrow-alt'></i></a>
    </div>
  </footer>

  <div class="bubble">
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


</body>
<script>
  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>
<script>
  function deleteFormDiv(itemId) {
    var formDiv = document.getElementById('form-div-' + itemId);
    formDiv.remove();
  }
</script>
<script src="{{url('landingFrontendFiles/js/editProfile.js')}}"></script>
<script src="{{url('landingFrontendFiles/js/home.js')}}"></script>

</html>