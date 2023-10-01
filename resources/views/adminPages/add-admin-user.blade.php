<?php

  
  use App\Models\AdminUser;

 

  new AdminUser();
  

  if (session()->has('adminloginId')) {
    $uid = session()->get('adminloginId');
  }
  
  $users = AdminUser::where('profile_uid','=',$uid)->first();
  
 
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PortfolioHub | AddAdminUser</title>
    <link rel="stylesheet" type="text/css" href="{{url('adminFiles/css/dashboard.css')}}">
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





            <a href="{{url('/login')}}" class="nav-link" target="_blank"><i class='bx bx-arrow-back'></i><span>BACK TO
            PortfolioHub</span></a>
        </div>

        <div class="sidebar-footer">
            <p>© PortfolioHub, 2023.</p>
            <p>Create by <span>Dhiraj Yadav</span></p>
        </div>


    </div>

    <div class="bodycontainer">
        <div class="header-section">
            <h2 class="header-title">ADD ADMIN USER</h2>

        </div>

        <div class="add-user-container">
            <div>


                
                <form name="form" action="{{url('/admin/addUserProcesses')}}" method="post" enctype="multipart/form-data" class="user-image">
                    @csrf
                    <div>
                        <img src="" id="img_url"
                            style="background-image: url() ; background-size: cover;">
                        <input class="file" name="adminprofile" type="file" id="img_file" onChange="img_pathUrl(this);" required>

                        <p style="text-align: center; font-size: 20px; color: #ffb43a;">Upload Your Photo</p>

                    </div>


                    <div class="user-info">
                        <input class="fullname" type="text" name="adminfullname" placeholder="Full Name" required>
                        <input class="email" type="email" name="adminmail" placeholder="Email" required>
                        <input class="password" type="text" name="adminpassword" placeholder="Password" required>


                        <input class="number" type="number" name="adminnumber" placeholder="Mobile No.">

                       

                        <div class="btn">
                            
                            <button class="add-user-btn" type="submit">ADD USER</button>
                        </div>


                    </div>
                    
                </form>

            </div>



        </div>
    </div>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('adminFiles/js/dashboard.js')}}"></script>

</body>

</html>