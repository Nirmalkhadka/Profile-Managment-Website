<!DOCTYPE html>
<html>

<head>
  <title>PortfolioHub</title>
  <link rel="stylesheet" type="text/css" href="{{url('landingFrontendFiles/css/html.css')}}">
  
</head>

<body
  style="background-image: url({{url('landingFrontendFiles/images/backgroundimage.jpg')}}); background-size: cover;background-repeat: no-repeat; background-attachment: fixed;background-position: center; position: relative;">
  <div class="fullbody">
    <header>

      <div class="container">
        <a href="{{url('/')}}">
          <h1 class="logo">PortfolioHub</h1>
        </a>

        <div class="user-actions">
          <a href="{{url('/login')}}" class="login-button btn">Login</a>

          <a href="{{url('/signup')}}" class="signup-button btn">Sign Up</a>
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

    <!-- landing page -->
    <div class="flex">
      <div class="text">
        <h1>Project Manager</h1>
        <p style="font-size: 1.2rem;">"Welcome to [Project Name], the ultimate platform for
          managing
          "</p>
        <p>"Welcome to [Project Name], the ultimate platform for managing and sharing your creative projects. Whether
          you're a solo creator or part of a team, our website provides a seamless experience for organizing, uploading,
          and collaborating on your projects. Easily upload and store your files, set deadlines, assign tasks, and
          communicate with your team members in real-time. Showcase your work, share your projects with others, and take
          your creativity to new heights with [Project Name]. Start your journey today!"</p>
        <div class="btn">
          <a href="{{url('/signup')}}" class="btn1">Get Started</a>

        </div>
      </div>


      <img src="{{url('landingFrontendFiles/images/firstpic .png')}}" alt="photo" class="p1">
    </div>
    <!-- landing page end  -->

    <div id="loginPopup" class="popup">
      <div class="popup-content">

        <!-- Login form fields -->
        <a href="login.html"></a>
      </div>
    </div>
    <script src="{{url('landingFrontendFiles/js/html.js')}}"></script>

    <hr class="custom-hr">
    <!-- about start  -->
    <!-- <div class="about">
    <h1>ABOUT</h1>
    <p>"At [Project Name], we believe in empowering individuals and teams to bring their ideas to life. Our platform provides a centralized hub for managing and collaborating on projects of all types. Whether you're a designer, developer, writer, or any creative professional, [Project Name] offers a range of tools and features to streamline your workflow and enhance productivity.
  
      With our intuitive interface, you can easily organize your project files, track progress, and communicate with team members in real-time. Seamlessly upload and share documents, images, and other media, ensuring everyone is on the same page. Collaborate effortlessly, assign tasks, set deadlines, and receive notifications to stay informed every step of the way.
      
      We prioritize security and privacy, ensuring your valuable work remains protected. Our platform offers robust data encryption, access controls, and regular backups to give you peace of mind.
      
      Join our growing community of creators and experience the power of [Project Name]. Elevate your project management process, foster collaboration, and unleash your creativity. Get started today and unlock the potential of your projects."
    </p>
  </div> -->

    <div class="flex2">
      <img src="{{url('landingFrontendFiles/images/secondpic.png')}}" alt="photo" class="p2">
      <div class="text">
        <h1>About </h1>

        <p>"At [Project Name], we believe in empowering individuals and teams to bring their ideas to life. Our platform
          provides a centralized hub for managing and collaborating on projects of all types. Whether you're a designer,
          developer, writer, or any creative professional, [Project Name] offers a range of tools and features to
          streamline your workflow and enhance productivity.

          With our intuitive interface, you can easily organize your project files, track progress, and communicate with
          team members in real-time. Seamlessly upload and share documents, images, and other media, ensuring everyone
          is
          on the same page. Collaborate effortlessly, assign tasks, set deadlines, and receive notifications to stay
          informed every step of the way.

          We prioritize security and privacy, ensuring your valuable work remains protected. "</p>

      </div>



    </div>

    <hr class="custom-hr2">

    <div>
      <div class="container4">
        <div class="cont_form">
          <h1>Contact Us</h1>
          <form class="contact-form">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name" required>
            <span class="focus"></span>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email" required>
            <span class="focus"></span>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write your message here" required></textarea>
            <span class="focus"></span>
            
            <button type="submit">Send Message</button>
          </form>
        </div>
        <img src="{{url('landingFrontendFiles/images/contact.png')}}" alt="photo" class="p4">
      </div>
    </div>



    <!-- start fotter  -->
    <footer class="foter">
      &copyCopyrights belong to ProjectHub
    </footer>


  </div>


</body>

</html>