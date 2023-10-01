

<?php
  use App\Models\Profile;
  use App\Models\User;
  use App\Models\ProjectAbout;
  use App\Models\ProjectImages;
  new User();
  new Profile();
  new ProjectAbout();
  new ProjectImages();

  

  if (session()->has('loginId')) {
    $uid = session()->get('loginId');
  }
  
  $users = User::where('profile_uid','=',$uid)->first();
  $allusers = User::all();
  $profile = Profile::where('profile_uid','=',$uid)->first();

  $projectAbouts = ProjectAbout::where('profile_uid','=',$uid)->get();

  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('landingFrontendFiles/css/home.css')}}">
    <link rel="stylesheet" href="{{url('landingFrontendFiles/css/project.css')}}">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>PortfolioHub | Projects</title>
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
        <a href="#" class="logo">{{$users->name[0]}}.</a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <nav class="navbar">
            <a href="{{url('/home')}}">Home</a>
            <a href="{{url('/home')}}#about">About</a>
            <a href="{{url('/home')}}#education">Education</a>
            <a href="{{url('/home')}}#skills">Skills</a>
            <a href="{{url('/projects')}}" class="active">Projects</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="useful-links">
            <a href="#"  class="setting-link"><i class='bx bx-color dropbtn' onclick="myFunction()"></i></a>

            
        </div>
        <div id="myDropdown" class="dropdown-content">
            <a href="{{route('editprofile',['id'=> $uid])}}" class="s-t"><span >Edit Profile</span><i class='bx bxs-user-circle'></i></a>
            
            <a href="{{url('/logout')}}" onclick=" return confirm('Are You sure you want to logout?');" class="s-t"><span >Logout</span> <i class='bx bxs-door-open'></i></a>
        </div>

    </header>


    
    <section class="project">
        <div class="main-cont-main">
            

            <div style="padding-top: 65px;">
                <div class="projects-heading">
                    <h2 class="heading">My <span>Projects!</span></h2>
                    <div class="see-more-project">
                        <a href="{{url('/addProject')}}">Add Project</a>
                    </div>
                </div>
    
                <div class="project-card-cont">


                   @foreach($projectAbouts as $projectAbout)
                   <?php
                   $projectImages = ProjectImages::where('profile_uid','=',$uid)->where('projectId','=',$projectAbout->projectId)->first();

                   ?>
                   
                    <div class="card">
                        
                        <div class="imgbox">
                        
                            <img src="{{asset('/images/ProjectImages/'.$projectImages->projectImage)}}" />
                        
                        </div>
                        
    
                        <div class="content">
                            <h2>{{$projectAbout->title}}</h2>
                            
                            
                        </div>
                        <div class="card-button"style="">
                               <a href="{{route('deleteProject',['id'=> $uid,'pid'=>$projectAbout->projectId])}}"><i class='bx bxs-trash'></i></a> 
                                <div class="see-more-project">
                                    <a href="{{route('singleProject',['id'=> $uid,'pid'=>$projectAbout->projectId])}}">View</a>
                                </div>
                                <a href="{{route('editProject',['id'=> $uid,'pid'=>$projectAbout->projectId])}}"><i class='bx bxs-edit'></i></a>
                            </div>
                    </div>
                    
                    @endforeach

                   
                    
                    
                    
                </div>
            </div>

            

            <!-- <hr class="custom-hr"> -->


        </div>
    </section>
    


    <!-- contact section design -->

    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me!</span></h2>

        <form action="#">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" placeholder="Full Name" required>
                    <span class="focus"></span>
                </div>

                <div class="input-field">
                    <input type="email" placeholder="Email Address" required>
                    <span class="focus"></span>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="number" placeholder="Mobile Number" required>
                    <span class="focus"></span>
                </div>

                <div class="input-field">
                    <input type="email" placeholder="Email Subject" required>
                    <span class="focus"></span>
                </div>
            </div>

            <div class="textarea-field">
                <textarea name="" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
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