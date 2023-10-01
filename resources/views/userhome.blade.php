

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
    <link rel="stylesheet" href="{{url('landingFrontendFiles/css/userhome.css')}}">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>PortfolioHub | {{$users->name}}</title>
</head>
<body style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center;">

    

    <div>
        
        <div class="members-cont">
            <div class="member-heading">
                <p>Members</p>
            </div>
    
            <div class="member" style="margin-top: 5.5rem;">

                @foreach($allusers as $alluser)
                <div class="header-con">
                    <a href="{{route('customhome',['id'=> $alluser->profile_uid])}}"><img  src="{{asset('/images/UserprofilePic/'.$alluser->profilePic)}}" alt="" style="width: 3.2rem; height: 3.2rem; border-radius: 50%; border: 3px solid #00abf0;"></a>
                    <a href="{{route('customhome',['id'=> $alluser->profile_uid])}}" style="padding-left: .5rem;">
                        <h1 class="logo" style="margin-left: .5rem; font-size: 25px;">{{$alluser->name}}</h1>
                    </a>
                </div>
                @endforeach

                

                
                
            </div>
    
            
        </div>
        

    </div>
    

    <!-- header design -->

    <header class="userheader">
        <a href="{{url('/home')}}" class="logo"><i class='bx bx-arrow-back'></i></a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <nav class="navbar">
            <a href="{{route('customhome',['id'=> $uid])}}" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#education">Education</a>
            <a href="#skills">Skills</a>
            <a href="{{route('customprojects',['id'=> $uid])}}">Projects</a>
            <a href="#contact">Contact</a>
        </nav>

        

    </header>

    <!-- home section design -->

    <section class="home" id="home">
        <div class="home-content">
            <h1>Hi, I'm <span>{{$users->name}}</span></h1>
            <div class="text-animate">
                <h3>{{$profile->youAre}}</h3>

            </div>
            <p>{{substr($profile->yourDesc, 0, 300)}}...</p>

            <div class="btn-box">
                <a href="#contact" class="btn">Let's Talk</a>

            </div>

        </div>
        <div class="home-img">
            <img src="{{asset('/images/UserprofilePic/'.$users->profilePic)}}" alt="">
            <span class="circle-spin"></span>
        </div>

    </section>
    

    <!-- about section design -->

    <section class="about" id="about">
        <h2 class="heading">About <span>Me</span></h2>

        <div class="about-img">
            <img src="{{asset('/images/UserprofilePic/'.$users->profilePic)}}" alt="">
            <span class="circle-spin"></span>
        </div>

        <div class="about-content">
            <h3>{{$profile->youAre}}</h3>
            <p>{{$profile->yourDesc}}
            </p>

            <div class="btn-box btns">
                <a href="#skills" class="btn">Know More</a>
            </div>
        </div>
    </section>


    <!-- education section -->

    <section class="education" id="education">
        <h2 class="heading">My <span>Education</span></h2>

        <div class="education-row">
            <div class="education-column">
                <div class="education-box">

                @foreach($profileEducations as $profileEducation)
                    <div class="education-content">
                        <div class="content">
                            <div class="year"><i class='bx bx-calendar'></i>{{substr($profileEducation->start_date, 0, 4)}} - {{substr($profileEducation->end_date, 0, 4)}}</div>
                            <h3>{{$profileEducation->degree_name}}</h3>
                            <h3>{{$profileEducation->instution_name}}</h3>
                            <p>Major Subject : <span>{{$profileEducation->major_subject}}</span></p>
                        </div>
                    </div>
                @endforeach

                    

                    
                </div>
            </div>
        </div>
    </section>

    <!-- skills section design -->

    <section class="skills" id="skills">
        <h2 class="heading">My <span>Skills</span></h2>

        <div class="skills-row">
            <div class="skills-column">
                <h3 class="title">Coding Skills</h3>

                <div class="skills-box">
                    <div class="skills-content">
                    @foreach($codingSkills as $CodingSkill)
                        <div class="progress">
                            <h3>{{$CodingSkill->skill}} <span>{{$CodingSkill->per_you_cover}}%</span></h3>
                            <div class="bar"><span></span></div>
                        </div>
                    @endforeach
                        
                    </div>
                </div>
            </div>


            <div class="skills-column">
                <h3 class="title">Professional Skills</h3>

                <div class="skills-box">
                    <div class="skills-content">
                    @foreach($profSkills as $profSkill)
                        <div class="progress">
                            <h3>{{$profSkill->skill}} <span>{{$profSkill->per_you_cover}}%</span></h3>
                            <div class="bar"><span></span></div>
                        </div>
                    @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- contact section design -->

    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me!</span></h2>
        @if(Session::has('message_sent'))
        <div style="text-align: center; color: rgb(245, 120, 120); font-size: 1.2rem; font-weight: bold;">
            <p style="padding-bottom: 1rem;">{{Session::get('message_sent')}}</p>
        </div>
        @endif
        <form action="{{route('contactemail',['email'=> $users->email])}}" method="post">
            @csrf
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="name" placeholder="Full Name" required>
                    <span class="focus"></span>
                </div>

                <div class="input-field">
                    <input type="email" name="email" placeholder="Email Address" required>
                    <span class="focus"></span>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="number" name="number" placeholder="Mobile Number" required>
                    <span class="focus"></span>
                </div>

                <div class="input-field">
                    <input type="text" name="subject" placeholder="Email Subject" required>
                    <span class="focus"></span>
                </div>
            </div>

            <div class="textarea-field">
                <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
                <span class="area-focus"></span>
            </div>

            <div class="btn-box btns">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
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


</body>
<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
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
<script src="{{url('landingFrontendFiles/js/home.js')}}"></script>
</html>