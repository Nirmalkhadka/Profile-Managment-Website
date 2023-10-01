<?php



  use App\Models\User;
  use App\Models\AdminUser;
  use App\Models\ProjectAbout;

  new User();

  new AdminUser();
  

  if (session()->has('adminloginId')) {
    $uid = session()->get('adminloginId');
  }
  
  $users = AdminUser::where('profile_uid','=',$uid)->first();
  $allusers = User::all();
  $totaluserscount = User::count('email');
  $totalprojectcount = ProjectAbout::count('title');
 
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PortfolioHub | Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{url('adminFiles/css/dashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('adminFiles/css/movies.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center; position: relative;">
    <div class="sidebar-container">
        <div class="logo-section">
            <a href="{{url('/admin/index')}}" class="logo">PortFolio<span>Hub</span></a>

        </div>


        <div class="admin-info-section">
            <img src="{{asset('/images/AdminProfilePic/'.$users->profilePic)}}" class="admin-image">
            <div class="admin-info">
                <h2 class="admin">Admin</h2>
                <h2 class="admin-name">
                    {{$users->name}}
                </h2>

            </div>
            <div class="logout-section">
                <a href="{{url('/adminlogout')}}"><i class='bx bx-log-out'></i></a>
            </div>
        </div>

        <div class="navbar-container">
            <a href="{{url('/admin/index')}}" class="nav-link "><i class='bx bxs-dashboard'></i><span
                    class="nav-active">DASHBOARD</span></a>

            <a href="{{url('/admin/users')}}" class="nav-link"><i class='bx bx-user-circle'></i><span>USERS</span></a>
            <a href="{{url('/admin/addUser')}}" class="nav-link"><i class='bx bx-note'></i><span>Add admin user</span></a>
            <a href="{{url('/admin/adminUsers')}}" class="nav-link"><i class='bx bx-note'></i><span>Admin User</span></a>

            
            


            

            






            <a href="{{url('/home')}}" class="nav-link" target="_blank"><i class='bx bx-arrow-back'></i><span>BACK TO
            PortfolioHub</span></a>
        </div>

        <div class="sidebar-footer">
            <p>© PortfolioHub, 2023.</p>
            <p>Create by <span>Dhiraj Yadav</span></p>
        </div>


    </div>

    <head>
        <link rel="stylesheet" type="text/css" href="css/movies.css">
    </head>

    <div class="bodycontainer">
        <div class="header-section">
            <h2 class="header-title">Dashboard</h2>

            <!-- <form action="movie-search.php" method="POST">
                <div class="search-box">

                    <input type="text" name="search" value="" id="search-input" placeholder="" maxlength="10">
                    <input class="search-btn" type="submit" name="submit" value="Search"></input>

                </div>

            </form> -->
            <a href="{{url('/admin/addUser')}}" class="add-movie-btn"><span>ADD ADMIN</span></a>

        </div>

        <div class="body-cont">
            <div class="first-div">
                <p class="monthly-view-heading">Total Numbers Of Users</p>
                <div class="monthly-view-data">
                    <p class="mnthnumber">{{$totaluserscount}}</p>
                    <i class='bx bx-line-chart-down'></i>
                </div>
            </div>

            <div class="first-div">
                <p class="monthly-view-heading">Total Numbers Of Projects</p>
                <div class="monthly-view-data">
                    <p class="mnthnumber">{{$totalprojectcount}}</p>
                    <i class='bx bx-film'></i>
                </div>
            </div>




        </div>

        <div class="second-body">
            <div class="second-div">



                <div class="first">

                    <div class="top-view">
                        <div class="top-one">
                            <i class='bx bx-user-circle'></i>
                            <p class="top-heading">Latest Users</p>
                        </div>
                        <div>
                            <a class="view-all-btn" href="{{url('/admin/users')}}">View All</a>
                        </div>
                    </div>

                    <div class="table-container">
                        <table class="spacing">
                            <tr class="movies-info-heading">
                                <div class="movies-heading-container">
                                    <th>ID</th>
                                    <th>Profile Pic</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th style="text-align: right;">ACTIONS</th>

                                </div>
                            </tr>

                            @foreach($allusers as $alluser)
                            <tr class="movies-info-heading-data">
                                <div class="movies-data-container">
                                    <td>
                                        <p class="id-data"></p>{{$alluser->profile_uid}}
                                    </td>
                                    <td>
                                        <div class="info-container">
                                            <img src="{{asset('/images/UserprofilePic/'.$alluser->profilePic)}}"
                                                class="user-image-data">

                                        </div>
                                    </td>
                                    <td style=" letter-spacing: 1px">
                                        <p class="comment-data">{{$alluser->name}}</p>
                                    </td>
                                    <td>
                                        <p class="review-data">{{$alluser->email}}</p>
                                    </td>
                                    <td>
                                        <p class="status-data">{{$alluser->number}}</p>
                                    </td>
                                    <td style="text-align: right;">
                                        <div class="action-container">
                                            <a target="_blank" href="{{route('customhome',['id'=> $alluser->profile_uid])}}"><i class='bx bxs-low-vision eye-icon'></i></a>
                                            <a href="{{route('deletefromadmin',['id'=> $alluser->profile_uid])}}"><i class='bx bxs-trash delete-icon'></i></a>
                                        </div>
                                    </td>
                                </div>

                            </tr>
                            @endforeach










                        </table>
                    </div>
                </div>





            </div>



        </div>

















    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('adminFiles/js/dashboard.js')}}"></script>

</body>

</html>