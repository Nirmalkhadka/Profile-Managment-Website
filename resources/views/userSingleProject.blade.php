

<?php
  
  use App\Models\User;
  use App\Models\ProjectAbout;
  use App\Models\ProjectImages;
  use App\Models\ProjectLanguages;
  
  new User();
  new ProjectAbout();
  new ProjectImages();
  new ProjectLanguages();
  
  

//   if (session()->has('loginId')) {
//     $uid = session()->get('loginId');
//   }

    // $profile_id = $uid;
    $project_id = $pid;

    $projectAbout = ProjectAbout::where('projectId','=',$project_id)->first();
    $profile_id = $projectAbout->profile_uid;
  
  $users = User::where('profile_uid','=',$profile_id)->first();
  $allusers = User::all();

  $projectImages = ProjectImages::where('profile_uid','=',$profile_id)->where('projectId','=',$project_id)->get();
  $projectAbout = ProjectAbout::where('profile_uid','=',$profile_id)->where('projectId','=',$project_id)->first();
  $projectLanguages = ProjectLanguages::where('profile_uid','=',$profile_id)->where('projectId','=',$project_id)->get();
  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('landingFrontendFiles/css/home.css')}}">
    <link rel="stylesheet" href="{{url('landingFrontendFiles/css/singleProject.css')}}">
    <link rel="stylesheet" href="{{url('landingFrontendFiles/css/userSingleProject.css')}}">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>PortfolioHub | {{$projectAbout->title}}</title>
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

    <header class="header">
    <a href="{{url('/home')}}" class="logo"><i class='bx bx-arrow-back'></i></a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <nav class="navbar">
            <a href="{{route('customhome',['id'=> $profile_id])}}" >Home</a>
            <a href="{{route('customhome',['id'=> $profile_id])}}#about">About</a>
            <a href="{{route('customhome',['id'=> $profile_id])}}#education">Education</a>
            <a href="{{route('customhome',['id'=> $profile_id])}}#skills">Skills</a>
            <a href="{{route('customprojects',['id'=> $profile_id])}}" class="active">Projects</a>
            <a href="{{route('customhome',['id'=> $profile_id])}}#contact">Contact</a>
        </nav>

        

    </header>

    <section class="singleproject-cont">

        <div class="title-cont">
            <a href="{{route('customprojects',['id'=> $profile_id])}}"><i class='bx bx-arrow-back' ></i></a>
            <h2 class="title-heading">{{$projectAbout->title}}</h2>
        </div>

        <div class="desc-cont">
            <p>{{$projectAbout->projectDesc}}</p>
        </div>

        <div class="image-cont">
            <h2 class="image-heading">Project <span>Images</span>!!!</h2>
            <div class="images-content">
                @foreach($projectImages as $projectImage)
                <img src="{{asset('/images/ProjectImages/'.$projectImage->projectImage)}}" alt="" srcset="">
                @endforeach
                


            </div>
        </div>

        <div class="tools-cont">
            <h2 class="image-heading">Languages <span>Used</span>!!!</h2>

            @foreach($projectLanguages as $projectLanguage)
            <div class="tools-content">
                <p>{{$projectLanguage->projectLanguage}}</p>
            </div>
            @endforeach


            

        </div>

        <div class="projectlink-cont">
            <h2 class="image-heading">Project <span>Link</span>!!!</h2>
            <div class="links">
                Project Link : <a href="#"><span>
                    {{$projectAbout->projectLink}}
                </span></a> 
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