<?php
include "db_conn.php"; // เรียกใช้ไฟล์เชื่อมต่อกับฐานข้อมูล

if (isset($_POST["submit"])) {
    // รับค่าที่ส่งมาจากฟอร์ม
    $username = $_POST['username']; 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // เช็คว่าชื่อผู้ใช้นี้มีอยู่ในระบบแล้วหรือไม่
    $check_username_query = "SELECT * FROM user WHERE username='$username'";
    $check_username_result = mysqli_query($conn, $check_username_query);
    if (mysqli_num_rows($check_username_result) > 0) {
        // หากมีชื่อผู้ใช้นี้อยู่แล้ว ให้แสดงข้อความแจ้งเตือน
        echo "<script> alert ('Username already exists. Please choose another username.');</script>";
    } else {
        // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูลผู้ใช้ใหม่ลงในฐานข้อมูล
        $sql = "INSERT INTO user (username, firstname, lastname, email, phone, password) 
                VALUES ('$username', '$firstname','$lastname','$email','$phone', '$password')";

        // ทำการ execute คำสั่ง SQL
        $result = mysqli_query($conn, $sql);

        // ตรวจสอบว่า execute คำสั่ง SQL สำเร็จหรือไม่
        if ($result) {
            // หากสำเร็จให้ redirect ไปที่หน้า signin.html พร้อมกับส่งข้อความแจ้งเตือน
            header("Location: signin.php?msg=Account created successfully");
        } else {
            // หากไม่สำเร็จให้แสดงข้อความแจ้งเตือน
            echo "Failed: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>

<html style="font-size: 16px;" lang="en">
  
  <head>
    <title>Sign up - Ice Academy</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="signup.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i|Maven+Pro:400,500,600,700,800,900"> 
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/IMG_5370.png",
		"sameAs": [
				"https://www.facebook.com/chitsanupongICE.333",
				"https://www.instagram.com/ice.sudd?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
		]}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="signup">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
  </head>

  <body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="en">
    
    <header class="u-clearfix u-custom-color-6 u-header u-header" id="sec-3404"><div class="u-clearfix u-sheet u-valign-middle-sm u-sheet-1">
        <nav class="u-menu u-menu-one-level u-menu-open-right u-offcanvas u-menu-1" data-responsive-from="XS">
          <div class="menu-collapse u-custom-font u-font-ubuntu" style="font-size: 1.25rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-effect-duration u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-decoration u-custom-text-hover-color u-custom-text-shadow u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
              </g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-custom-font u-font-ubuntu u-nav u-spacing-2 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-active-white u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-white u-nav-link u-text-active-black u-text-hover-black u-text-white" href="Home.html" style="padding: 10px 20px;">Home</a>
            </li><li class="u-nav-item"><a class="u-active-white u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-white u-nav-link u-text-active-black u-text-hover-black u-text-white" href="Course.html" style="padding: 10px 20px;">Course</a>
            </li><li class="u-nav-item"><a class="u-active-white u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-white u-nav-link u-text-active-black u-text-hover-black u-text-white" href="FAQ.html" style="padding: 10px 20px;">FAQ</a>
            </li><li class="u-nav-item"><a class="u-active-white u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-white u-nav-link u-text-active-black u-text-hover-black u-text-white" href="About-us.html" style="padding: 10px 20px;">About us</a>
            </li><li class="u-nav-item"><a class="u-active-white u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-white u-nav-link u-text-active-black u-text-hover-black u-text-white" href="Signin-Signup.html" style="padding: 10px 20px;">Sign in</a>
            </li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-container-style u-custom-color-3 u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-custom-font u-nav u-popupmenu-items u-spacing-30 u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Course.html">Course</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="FAQ.html">FAQ</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About-us.html">About us</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Signin-Signup.html">Sign in</a>
                </li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
        <a href="#" class="u-image u-logo u-image-1" data-image-width="4096" data-image-height="1714">
          <img src="images/IMG_5370.png" class="u-logo-image u-logo-image-1">
        </a>
      </div></header>


    <section class="u-clearfix u-gradient u-section-1" id="sec-3ebf">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-custom-color-6 u-text-1">Sign up</h2>
        <div class="u-align-center u-border-11 u-border-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-container-style u-custom-border u-custom-color-2 u-expanded-width-xs u-group u-radius u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <div class="u-form u-login-control u-form-1">
              <form action="#" class="u-clearfix u-form-custom-backend u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 0px;" redirect="true" method="post">
     
               <div class="u-form-group u-form-name u-label-top">
                  <label for="username-a30d" class="u-label u-label-1">Username *</label>
                  <input type="text" placeholder="Enter your Username" id="username-a30d" name="username" class="u-border-8 u-border-white u-input u-input-rectangle u-radius-50 u-input-1" required="">
                </div>

                <div class="u-form-group u-form-partition-factor-2 u-label-top u-form-group-2">
                  <label for="text-9057" class="u-label u-label-2">Firstname *</label>
                  <input type="text" placeholder="Enter your firstname" id="text-9057" name="firstname" class="u-border-8 u-border-white u-input u-input-rectangle u-radius u-input-2" required="required">
                </div>

                <div class="u-form-group u-form-partition-factor-2 u-label-top u-form-group-3">
                  <label for="text-2e5a" class="u-label u-label-3">Lastname *</label>
                  <input type="text" placeholder="Enter your lastname" id="text-2e5a" name="lastname" class="u-border-8 u-border-white u-input u-input-rectangle u-radius u-input-3" required="required">
                </div>

                <div class="u-form-group u-label-top u-form-group-4">
                  <label for="text-17e1" class="u-label u-label-4">Email</label>
                  <input type="text" placeholder="Enter your email" id="text-17e1" name="email" class="u-border-8 u-border-white u-input u-input-rectangle u-radius u-input-4">
                </div>

                <div class="u-form-group u-label-top u-form-group-5">
                  <label for="text-d612" class="u-label u-label-5">Phone</label>
                  <input type="text" placeholder="Enter your phone" id="text-d612" name="phone" class="u-border-8 u-border-white u-input u-input-rectangle u-radius u-input-5" maxlength="10">
                </div>

                <div class="u-form-group u-form-password u-label-top">
                  <label for="password-a30d" class="u-label u-label-6">Password *</label>
                  <input type="password" placeholder="Enter your password" id="password-a30d" name="password" class="u-border-8 u-border-white u-input u-input-rectangle u-radius-50 u-input-6" required="">
                </div>

                <div class="u-form-group u-label-top u-form-group-7">
                  <label for="text-54fe" class="u-label u-label-7">Please confirm your password *</label>
                  <input type="password" placeholder="Enter your password" id="text-54fe" name="confirm" class="u-border-8 u-border-white u-input u-input-rectangle u-radius u-input-7" required="required">
                </div>

                <div class="u-align-left u-form-group u-form-submit u-label-top">
                  <input type="submit" name="submit" value="submit" class="u-form-control-hidden">
                  <a href="#" class="u-active-white u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-6 u-custom-font u-font-ubuntu u-hover-white u-radius-50 u-text-active-custom-color-6 u-text-hover-custom-color-6 u-btn-1">Submit</a>
                </div>

                <input type="hidden" value="" name="recaptchaResponse">
              </form>
              <script>
                    function validateForm() {
                        var password = document.getElementById("password-a30d").value;
                        var confirmPassword = document.getElementById("text-54fe").value;
                        var phone = document.getElementById("text-d612").value;

                        // เช็ครหัสผ่านว่ามีมากกว่า 6 ตัวหรือไม่
                        if (password.length < 6) {
                            alert("Password must be at least 6 characters long");
                            return false;
                        }

                        // เช็ครหัสผ่านและการยืนยันรหัสผ่านว่าตรงกันหรือไม่
                        if (password != confirmPassword) {
                            alert("Password do not match");
                            return false;
                        }

                        // เช็คเบอร์โทรศัพท์ว่ามีค่าเป็นตัวเลขหรือไม่
                        if (isNaN(phone)) {
                            alert("Phone number must be a number");
                            return false;
                        }

                        // เช็คเบอร์โทรศัพท์ว่าครบ 10 หลักหรือไม่
                        if (phone.length !== 10) {
                            alert("Phone number must be 10 digits");
                            return false;
                        }

                        return true;
                    }
                  </script>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <footer class="u-clearfix u-custom-color-6 u-footer" id="sec-3e25"><div class="u-clearfix u-sheet u-sheet-1">
      <div class="data-layout-selected u-clearfix u-expanded-width-sm u-expanded-width-xs u-gutter-12 u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout" style="">
          <div class="u-layout-row" style="">
            <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-12-md u-size-12-sm u-size-12-xs u-size-15-lg u-size-15-xl u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <a href="#" class="u-image u-logo u-image-1" data-image-width="4096" data-image-height="1714">
                  <img src="images/IMG_5370.png" class="u-logo-image u-logo-image-1">
                </a>
              </div>
            </div>
            <div class="u-align-left u-container-style u-layout-cell u-size-12-lg u-size-12-xl u-size-9-md u-size-9-sm u-size-9-xs u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <div data-position="" class="u-position u-position-1">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <h5 class="u-block-header u-custom-font u-font-ubuntu u-text u-text-1">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-text-hover-black u-btn-1" href="Home.html">Home<br>
                        </a>
                      </h5>
                      <div class="u-block-content u-text"></div>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-2">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <h5 class="u-block-header u-custom-font u-font-ubuntu u-text u-text-3">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-text-hover-black u-btn-2" href="Course.html">Course<br>
                        </a>
                      </h5>
                      <div class="u-block-content u-text"></div>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-3">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <h5 class="u-block-header u-custom-font u-font-ubuntu u-text u-text-5">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-hover-black u-text-white u-btn-3" href="FAQ.html">FAQ<br>
                        </a>
                      </h5>
                      <div class="u-block-content u-text"></div>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-4">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <h5 class="u-block-header u-custom-font u-font-ubuntu u-text u-text-7">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-hover-black u-text-white u-btn-4" href="About-us.html">About us<br>
                        </a>
                      </h5>
                      <div class="u-block-content u-text"></div>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-5">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <h5 class="u-block-header u-custom-font u-font-ubuntu u-text u-text-9">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-hover-black u-text-white u-btn-5" href="Signin-Signup.html">Sign in </a>
                      </h5>
                      <div class="u-block-content u-text"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-12 u-layout-cell-3">
              <div class="u-container-layout u-container-layout-3">
                <div data-position="" class="u-position u-position-6">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <h5 class="u-block-header u-custom-font u-font-ubuntu u-text u-text-11">High School</h5>
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-product-link u-text-body-alt-color u-text-hover-black u-btn-6" href="products/real-number.html">Real Number<br>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-7">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text u-text-13">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-product-link u-text-body-alt-color u-text-hover-black u-btn-7" href="products/vector.html">Vector<br>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-8">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text u-text-14">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-product-link u-text-hover-black u-text-white u-btn-8" href="products/sequences---series.html">Sequences &amp; Series<br>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-9">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text u-text-15">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-product-link u-text-hover-black u-text-white u-btn-9" href="products/logic.html">Logic<br>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-11-lg u-size-12-xl u-size-9-md u-size-9-sm u-size-9-xs u-layout-cell-4">
              <div class="u-container-layout u-container-layout-4">
                <div data-position="" class="u-position u-position-10">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <h5 class="u-block-header u-custom-font u-font-ubuntu u-text u-text-16">University</h5>
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-product-link u-text-body-alt-color u-text-hover-black u-btn-10" href="products/calculus-i.html">Calculus I<br>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-11">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix" style="">
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text u-text-18">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-product-link u-text-hover-black u-text-white u-btn-11" href="products/calculus-ii.html">Calculus II<br>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-12">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text u-text-19">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-product-link u-text-body-alt-color u-text-hover-black u-btn-12" href="products/stat-theory-i.html">Stat Theory I<br>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div data-position="" class="u-position u-position-13">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text u-text-20">
                        <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-product-link u-text-hover-black u-text-white u-btn-13" href="products/stat-theory-ii.html">Stat Theory II<br>
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-10-md u-size-10-sm u-size-10-xs u-size-9-lg u-size-9-xl u-layout-cell-5">
              <div class="u-container-layout u-container-layout-5">
                <div data-position="" class="u-position u-position-14"></div>
                <div data-position="" class="u-position u-position-15">
                  <div class="u-block">
                    <div class="u-block-container u-clearfix">
                      <h5 class="u-block-header u-custom-font u-font-ubuntu u-text u-text-21">Contact us</h5>
                      <p class="u-block-content u-custom-font u-font-ubuntu u-text">088-297-5214</p>
                    </div>
                  </div>
                </div>
                <div class="u-social-icons u-spacing-10 u-social-icons-1">
                  <a class="u-social-url" title="facebook" target="_blank" href="https://www.facebook.com/chitsanupongICE.333"><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xlink:href="#svg-5b4e"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-5b4e"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
    c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
                  </a>
                  <a class="u-social-url" title="instagram" target="_blank" href="https://www.instagram.com/ice.sudd?utm_source=ig_web_button_share_sheet&amp;igsh=ZDNlZDc0MzIxNw=="><span class="u-icon u-social-icon u-social-instagram u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xlink:href="#svg-a28e"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-a28e"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
    z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
    C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
    c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="u-align-center u-custom-font u-font-ubuntu u-text u-text-23"> © 2024 ICE ACADEMY. ALL RIGHTS RESERVED.</p>
    </div>
    </footer>
  
  </body>

</html>