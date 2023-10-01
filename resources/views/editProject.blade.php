<?php
  
  use App\Models\User;
  use App\Models\ProjectAbout;
  use App\Models\ProjectImages;
  use App\Models\ProjectLanguages;
  
  new User();
  new ProjectAbout();
  new ProjectImages();
  new ProjectLanguages();
  
  

  if (session()->has('loginId')) {
    $uid = session()->get('loginId');
  }

    $profile_id = $uid;
    $project_id = $pid;
  
  $users = User::where('profile_uid','=',$uid)->first();
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
    <link rel="stylesheet" href="{{url('landingFrontendFiles/css/addProject.css')}}">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>PortfolioHub | EditProject</title>
</head>

<body
    style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center;">



    <div>

        <div class="members-cont">
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
            <a href="{{url('/home')}}">Home</a>
            <a href="{{url('/home')}}#about">About</a>
            <a href="{{url('/home')}}#education">Education</a>
            <a href="{{url('/home')}}#skills">Skills</a>
            <a href="{{url('/projects')}}" class="active">Projects</a>
            <a href="{{url('/home')}}#contact">Contact</a>
        </nav>

        <div class="useful-links">
            <a href="#" class="setting-link"><i class='bx bx-color dropbtn' onclick="myFunction()"></i></a>


        </div>
        <div id="myDropdown" class="dropdown-content">
            <a href="{{route('editprofile',['id'=> $uid])}}" class="s-t"><span>Edit Profile</span><i
                    class='bx bxs-user-circle'></i></a>
            
            <a href="{{url('/logout')}}" onclick=" return confirm('Are You sure you want to logout?');"
                class="s-t"><span>Logout</span> <i class='bx bxs-door-open'></i></a>
        </div>

    </header>

    <section>

        <div class="container2" id="slideDiv2">





            <form action="{{route('editProjectcontrol',['id' => $profile_id, 'pid'=>$project_id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="errorfield">
                    <div class="update-heading">Edit Project</div>

                    <!-- <p>All Fields Are Required!!</p> -->

                </div>
                <div class="progressbar">
                    <div class="progress" id="progress"></div>
                    <div class="progress-step progress-step-active" data-title="About"></div>
                    <div class="progress-step " data-title="Project Images"></div>
                    <div class="progress-step" data-title="Tools Used"></div>

                </div>

                <div class="form-step form-step-active">
                    <div class="form-group">
                        <label for="">Title : </label>


                        <input type="text" name="projecttitle" value="{{$projectAbout->title}}" class="title">

                        <div id="name-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="">About Project : </label>


                        <textarea type="text" class="about" name="projectdesc"
                            >{{$projectAbout->projectDesc}}</textarea>

                        <div id="name-error"></div>
                    </div>


                    <div class="btns-group">
                        <!-- <a  class="btn2 btn-prev">Previous</a> -->
                        <a class="btn2 btn-next">Next</a>
                    </div>


                </div>



                <div class="form-step ">
                    
                    <input type="file" name="images[]" id="images" multiple="multiple" style="visibility: hidden;" onchange="image_select()" >
                    
                    <div class="choose-cont">
                        <h4>Uploaded Images : </h4>

                        <a class="choose-btn" onclick="document.getElementById('images').click();">Choose Images</a>

                    </div>
                    <div class="images-cont" id="images-container">
                        @foreach($projectImages as $projectImage)
                        <div class="previous-img" style="display: flex;">
                            <img src="{{asset('/images/ProjectImages/'.$projectImage->projectImage)}}" alt="" srcset="">
                            

                        </div>
                        

                        @endforeach
                    </div>
                    
                    
                    <!-- <div class="images-cont" id="images-container">

                    </div> -->


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
                        @foreach($projectLanguages as $projectLanguage)

                        <div class="form-group-part1" id="form-div-{{$item}}">

                            <div class="sub" id="rm-group1">
                                <div>
                                    <label for="">Language : </label>



                                    <input type="text" name="language[]" value="{{$projectLanguage->projectLanguage}}"
                                        class="language">


                                </div>

                                <div class="rm-group" onclick="deleteFormDiv({{$item}})">
                                    <a class="remove" onclick="deleteFormDiv({{$item}})"><i
                                            class='bx bxs-trash'></i></a>
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

                        <div class="" id="rm-group1">
                            <div>
                                <label for="">Project Link : </label>
                                <input type="text" name="link" value="{{$projectAbout->projectLink}}" class="title">


                            </div>

                            <!-- <div class="rm-group">
                              <a class="remove"><i class='bx bxs-trash'></i></a>
                            </div> -->

                        </div>



                    </div>


                    <div class="btns-group">
                        <a class="btn2 btn-prev">Previous</a>
                        <input type="submit" name="submit" value="Submit" class="btn2">

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
<script src="{{url('landingFrontendFiles/js/addProject.js')}}"></script>
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
    var images = [];
    function image_select() {
        var image = document.getElementById('images').files;
        
        for (i = 0; i < image.length; i++) {
            if (check_dup(image[i].name)) {
                images.push({
                    "name": image[i].name,
                    "url": URL.createObjectURL(image[i]),
                    "file": image[i],
                })
            } else {
                alert(image[i].name + " is already added in list.");
            }

        }
        // document.getElementById('images').reset();
        document.getElementById('images-container').innerHTML = image_show();
    }

    function image_show() {
        var image = "";
        images.forEach((i) => {
            image += `<img src="` + i.url + `" alt="" srcset="">`;
        })
        return image;
    }

    function check_dup(name) {
        var image = true;
        if (images.length > 0) {
            var input = document.getElementById('images');
            

            for (j = 0; j < images.length; j++) {
                if (images[j].name == name) {
                    image = false;
                    break;
                }
            }
        }
        return image;
    }
    


</script>
<script>
    function deleteFormDiv(itemId) {
        var formDiv = document.getElementById('form-div-' + itemId);
        formDiv.remove();
    }
</script>
<script src="{{url('landingFrontendFiles/js/home.js')}}"></script>

</html>