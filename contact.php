<?php

$server = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'student';

$connection = mysqli_connect(
    $server,
    $user_name,
    $password,
    $db_name
);

if (!$connection) {
    die('Error: database connection.');
}

$status = "";

if (isset($_POST['sub'])) {

    $name = mysqli_real_escape_string(
        $connection,
        $_POST['name']
    );

    $email = mysqli_real_escape_string(
        $connection,
        $_POST['email']
    );

    $phone = mysqli_real_escape_string(
        $connection,
        $_POST['phone']
    );

    $subject = mysqli_real_escape_string(
        $connection,
        $_POST['subject']
    );

    $message = mysqli_real_escape_string(
        $connection,
        $_POST['message']
    );


    $query = "INSERT INTO contact
    (name, email, phone, subject, msg)
    VALUES
    ('$name', '$email', '$phone', '$subject', '$message')";


    $data = mysqli_query($connection, $query);


    if ($data) {

        $status = "Your message has been sent successfully!";

    } else {

        $status = "Error: Message could not be sent.";

    }
}

?>
<style>
    /* =====================================================
   GENERAL
===================================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    font-family: Arial, Helvetica, sans-serif;

    color: #172b49;

    background: #ffffff;
}


a {
    text-decoration: none;
}


html {
    scroll-behavior: smooth;
}



/* =====================================================
   TOP BAR
===================================================== */

.top-bar {

    width: 100%;

    min-height: 38px;

    background: #081d3a;

    color: white;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 4.3%;
}


.top-left {

    font-size: 16px;

    font-weight: 500;
}


.top-right {

    display: flex;

    gap: 28px;
}


.top-right a {

    color: white;

    font-size: 16px;

    transition: 0.3s;
}


.top-right a:hover {

    color: #f4b62a;
}



/* =====================================================
   MAIN HEADER
===================================================== */

.main-header {

    /* min-height: 60px; */

    background: white;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 4.3%;

    position: sticky;

    top: 0;

    z-index: 999;

    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}



/* =====================================================
   LOGO
===================================================== */

.logo-area {

    display: flex;

    align-items: center;

    gap: 15px;
}


.logo-area img {

    width: 65px;

    height: 65px;

    object-fit: contain;
}


.logo-text h1 {

    font-size: 29px;

    color: #172b49;

    margin-bottom: 5px;
}


.logo-text p {

    color: #6b7280;

    font-size: 13px;

    letter-spacing: 3px;

    font-weight: bold;
}



/* =====================================================
   NAVIGATION
===================================================== */

/* .navbar {

    display: flex;

    align-items: center;

    gap: 31px;
}


.navbar a {

    position: relative;

    color: #26364d;

    font-size: 18px;

    font-weight: 600;

    padding: 42px 0 38px;

    transition: 0.3s;
}


.navbar a:hover {

    color: #1173b9;
}


.navbar a.active {

    color: #1173b9;
}


.navbar a.active::after {

    content: "";

    position: absolute;

    left: 0;

    right: 0;

    bottom: 26px;

    height: 4px;

    background: #f4b62a;
}



/* =====================================================
   MOBILE MENU
===================================================== */

#menu-toggle {

    display: none;
}


.menu-icon {

    display: none;

    cursor: pointer;
}


.menu-icon span {

    display: block;

    width: 28px;

    height: 3px;

    background: #172b49;

    margin: 5px;

}



/* =====================================================
   CONTACT HERO
===================================================== */

.contact-hero {

    position: relative;

    min-height: 390px;

    display: flex;

    align-items: center;

    padding: 60px 4.3%;

    background-image:url(grouppics.jpeg) ;

    background-size: cover;

    background-position: center;
}


.hero-overlay {

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            90deg,
            rgba(7, 39, 73, 0.92),
            rgba(9, 75, 120, 0.68)
        );
}


.hero-content {

    position: relative;

    z-index: 2;

    max-width: 850px;
}


.hero-content span {

    color: #1680c5;

    font-size: 16px;

    font-weight: bold;

    letter-spacing: 3px;
}


.hero-content h2 {

    color: white;

    font-size: 70px;

    margin: 18px 0;

    line-height: 1.05;
}


.hero-content p {

    color: white;

    font-size: 20px;

    line-height: 1.7;

    max-width: 750px;
}



/* =====================================================
   CONTACT SECTION
===================================================== */

.contact-section {

    padding: 100px 4.3%;

    background: #ffffff;
}


.contact-container {

    max-width: 1250px;

    margin: auto;

    display: grid;

    grid-template-columns: 0.9fr 1.1fr;

    gap: 80px;

    align-items: start;
}



/* =====================================================
   CONTACT INFORMATION
===================================================== */

.section-label {

    color: #1173b9;

    font-size: 14px;

    font-weight: bold;

    letter-spacing: 3px;
}


.contact-information h2 {

    color: #172b49;

    font-size: 45px;

    line-height: 1.15;

    margin: 18px 0;
}


.intro-text {

    color: #626d79;

    font-size: 17px;

    line-height: 1.8;

    margin-bottom: 40px;
}


.info-item {

    display: flex;

    align-items: flex-start;

    gap: 18px;

    margin-bottom: 30px;
}


.info-icon {

    min-width: 52px;

    height: 52px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #102746;

    color: white;

    border-radius: 50%;

    font-size: 20px;
}


.info-item h3 {

    color: #172b49;

    font-size: 18px;

    margin-bottom: 7px;
}


.info-item p {

    color: #68717c;

    font-size: 15px;

    line-height: 1.6;
}



/* =====================================================
   CONTACT FORM BOX
===================================================== */

.contact-form-box {

    background: #f7f9fb;

    padding: 48px;

    border-top: 5px solid #f4b62a;

    box-shadow:
        0 15px 45px rgba(17, 43, 73, 0.08);
}


.form-heading span {

    color: #1173b9;

    font-size: 13px;

    font-weight: bold;

    letter-spacing: 2px;
}


.form-heading h2 {

    color: #172b49;

    font-size: 34px;

    margin: 12px 0 30px;
}



/* =====================================================
   FORM
===================================================== */

.form-row {

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 22px;
}


.input-box {

    margin-bottom: 23px;
}


.input-box label {

    display: block;

    color: #172b49;

    font-size: 14px;

    font-weight: bold;

    margin-bottom: 9px;
}


.input-box input,
.input-box textarea {

    width: 100%;

    border: 1px solid #d5dce3;

    background: white;

    padding: 15px;

    font-size: 15px;

    color: #172b49;

    outline: none;

    transition: 0.3s;

    font-family: Arial, Helvetica, sans-serif;
}


.input-box input {

    height: 52px;
}


.input-box textarea {

    resize: vertical;

    min-height: 150px;
}


.input-box input:focus,
.input-box textarea:focus {

    border-color: #1173b9;

    box-shadow:
        0 0 0 3px rgba(17,115,185,0.10);
}


.submit-button {

    background: #f4b62a;

    color: #102746;

    border: none;

    padding: 16px 30px;

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;

    transition: 0.3s;
}


.submit-button span {

    margin-left: 12px;

    font-size: 20px;
}


.submit-button:hover {

    background: #102746;

    color: white;
}



/* =====================================================
   SUCCESS MESSAGE
===================================================== */

.success-message {

    background: #e7f6ec;

    border-left: 4px solid #258c4d;

    color: #23733f;

    padding: 14px 18px;

    margin-bottom: 25px;

    font-size: 14px;
}



/* =====================================================
   FOOTER
===================================================== */




/* =====================================================
   TABLET
===================================================== */

@media (max-width: 1100px) {

    .navbar {

        gap: 17px;
    }


    .navbar a {

        font-size: 15px;
    }


    .logo-text h1 {

        font-size: 23px;
    }


    .contact-container {

        gap: 45px;
    }


    .footer-container {

        grid-template-columns: 1fr 1fr;
    }

}



/* =====================================================
   MOBILE / TABLET MENU
===================================================== */

@media (max-width: 900px) {


    .top-bar {

        padding: 0 20px;
    }


    .top-left {

        font-size: 13px;
    }


    .top-right {

        gap: 15px;
    }


    .top-right a {

        font-size: 13px;
    }



    .main-header {

        /* min-height: 80px; */

        /* padding: 10px 20px; */
    }


    .logo-area img {

        width: 52px;

        height: 52px;
    }


    .logo-text h1 {

        font-size: 18px;
    }


    .logo-text p {

        font-size: 9px;

        letter-spacing: 2px;
    }



    .menu-icon {

        display: block;
    }


    .navbar {

        position: absolute;

        top: 100%;

        left: 0;

        width: 100%;

        background: white;

        display: none;

        flex-direction: column;

        align-items: flex-start;

        gap: 0;

        box-shadow:
            0 10px 20px rgba(0,0,0,0.1);
    }


    .navbar a {

        width: 100%;

        padding: 15px 25px;

        font-size: 16px;

        border-bottom: 1px solid #eeeeee;
    }


    .navbar a.active::after {

        display: none;
    }


    #menu-toggle:checked ~ .navbar {

        display: flex;
    }


    .contact-hero {

        min-height: 330px;
    }


    .hero-content h2 {

        font-size: 55px;
    }


    .contact-container {

        grid-template-columns: 1fr;
    }

}



/* =====================================================
   SMALL MOBILE
===================================================== */

@media (max-width: 600px) {


    .top-bar {

        min-height: 20px;

        padding: 0 15px;
    }


    .top-left {

        font-size: 11px;
    }


    .top-right {

        gap: 10px;
    }


    .top-right a {

        font-size: 11px;
    }



    .main-header {

        padding: 10px 15px;
    }


    .logo-area {

        gap: 8px;
    }


    .logo-area img {

        width: 45px;

        height: 45px;
    }


    .logo-text h1 {

        font-size: 15px;
    }


    .logo-text p {

        font-size: 7px;

        letter-spacing: 1.5px;
    }



    .contact-hero {

        min-height: 280px;

        padding: 40px 20px;
    }


    .hero-content span {

        font-size: 12px;
    }


    .hero-content h2 {

        font-size: 42px;

        margin: 12px 0;
    }


    .hero-content p {

        font-size: 15px;
    }



    .contact-section {

        padding: 65px 20px;
    }


    .contact-information h2 {

        font-size: 32px;
    }


    .intro-text {

        font-size: 15px;
    }



    .contact-form-box {

        padding: 25px 20px;
    }


    .form-heading h2 {

        font-size: 28px;
    }


    .form-row {

        grid-template-columns: 1fr;

        gap: 0;
    }


    .submit-button {

        width: 100%;
    }



    .footer {

        padding-top: 45px;
    }


    .footer-container {

        grid-template-columns: 1fr;

        gap: 35px;

        padding-bottom: 40px;
    }

}
*{
    box-sizing:border-box;margin:0;padding:0}
html{
scroll-behavior:smooth}
body{
font-family:Inter,Arial,sans-serif;color:var(--dark);
    line-height:1.6;
 background:#fff}
a{
    text-decoration:none;
    color:inherit}
img{
    max-width:100%;
    display:block}
.container{
    width:min(1180px,92%);margin:auto}
.topbar{
    background:var(--navy);
    color:#fff;
    font-size:13px}
.topbar .container{
    display:
    flex;justify-content:
    space-between;gap:20px;padding:9px 0}
.top-links{display:flex;gap:20px}
.header{
    background:#fff;position:sticky;top
    :0;z-index:1000;box-shadow:0 3px 16px rgba(0,0,0,.07)}
.nav-wrap{
    min-height:82px;display:flex;
    align-items:center;
    justify-content:space-between;
    gap:25px}
.logo{display:flex;
    align-items:center;
    gap:12px;
    font-weight:800;
    font-size:21px;
    color:var(--navy)}
.logo-mark{
    width:48px;
    height:48px;
    background-image: url(cropped-cropped-cropped-cropped-cropped-DTESD.png);
    background-size: cover;
    border-radius:8px;
    /* background:var(--blue); */
    color:#fff;
    display:grid;
    place-items:center;
    font-weight:800;
    font-size:18px
}
.logo small{
    display:block;
    font-size:10px;
    letter-spacing:1.5px;
    color:var(--muted);font-weight:600
}
.nav{
    display:flex;align-items:center;gap:24px}
.nav a{
    font-size:14px;font-weight:600;color:#26364d;
    padding:30px 0;position:relative}
.nav a:hover,.nav a.active{color:var(--blue)}
.nav a.active:after{content:"";
position:absolute;
bottom:20px;left:0;width:100%;
height:3px;background:var(--gold)
}
.menu-btn{display:none;
    background:none;
    border:0;
    font-size:28px;
    color:var(--navy);
    cursor:pointer
    }
    .footer{
    background:#0b182b;color:#d6dfeb;
    padding:65px 0 20px
}
.footer-grid{
    display:grid;
        grid-template-columns:1.5fr 1fr 1fr 1fr;
        gap:45px
    }
    .footer h3{
        color:#fff;margin-bottom:17px
    }
    .footer p,.footer a{
        font-size:14px;
        color:#aebdce
    }
    .footer a{
        display:block;margin:9px 0
    }
    .footer a:hover{
        color:#fff
    }
    .footer-bottom{
            border-top:1px solid rgba(255,255,255,.12);
            margin-top:45px;padding-top:18px;font-size:13px;
            display:flex;
            justify-content:space-between
        }
        @media(max-width:600px){
 .grid-3,.grid-4,.form-grid,.footer-grid,.stats-grid{grid-template-columns:1fr}.topbar .container{justify-content:center}.nav-wrap{min-height:74px}.nav{top:74px}.logo{font-size:17px}.logo-mark{width:40px;height:40px}.section{padding:60px 0}.page-hero{padding:75px 0}.cta-inner{flex-direction:column;align-items:flex-start}.footer-bottom{flex-direction:column;gap:8px}
}
</style>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Contact Us | Thorgo Polytechnic Institute</title>

    <link rel="stylesheet"
          href="contact.css">

</head>


<body>


<!-- =====================================================
     TOP BAR
===================================================== -->

<div class="top-bar">

    <div class="top-left">
        Polytechnic Institute Thorgo
    </div>


    <div class="top-right">

        <a href="admissions.html">
            Admissions
        </a>

        <a href="contact.php">
            Contact
        </a>

    </div>

</div>



<!-- =====================================================
     MAIN HEADER
===================================================== -->

<!-- <header class="main-header">


    <div class="logo-area">

        <img src="images/logo.png"alt="Polytechnic Institute Logo">


        <div class="logo-text">

            <h1>
                Polytechnic Institute Thorgo
            </h1>

            <p>
                SKILLS • INNOVATION • FUTURE
            </p>

        </div>

    </div>



    <!-- Mobile Menu Button -->

    <input type="checkbox"
           <!-- id="menu-toggle">

    <label for="menu-toggle"
           class="menu-icon">

        <span></span>
        <span></span>
        <span></span>

    </label> 




<header class="header">
    <div class="container nav-wrap">
    <a class="logo" href="index.html">
        <span class="logo-mark">

        </span>
        <span> Polytechnic Institute Thorgo<small>SKILLS • INNOVATION • FUTURE</small>
        </span>
    </a><button class="menu-btn">☰</button>
    <nav class="nav">
        <a href="index.html">Home</a>
        <a class="active" href="about.html">About</a>
        <a href="courses.html">Courses</a>
        <a href="admissions.html">Admissions</a>
        <a href="gallery.html">Gallery</a>
        <a href="news.html">News & Events</a>
        <a href="contact.html">Contact</a>
    </nav></div>
</header>



<!-- =====================================================
     CONTACT HERO
===================================================== -->

<section class="contact-hero">


    <div class="hero-overlay"></div>


    <div class="hero-content">

        <span>
            GET IN TOUCH
        </span>


        <h2>
            Contact Us
        </h2>


        <p>
            We are here to help you with admissions,
            courses, registration and other information.
        </p>

    </div>

</section>



<!-- =====================================================
     CONTACT CONTENT
===================================================== -->

<section class="contact-section">


    <div class="contact-container">


        <!-- LEFT INFORMATION -->

        <div class="contact-information">


            <span class="section-label">
                CONTACT INFORMATION
            </span>


            <h2>
                We'd Love To Hear From You
            </h2>


            <p class="intro-text">

                Have a question about our institute,
                courses or admissions? Get in touch
                with our team and we will be happy
                to assist you.

            </p>



            <!-- ADDRESS -->

            <div class="info-item">

                <div class="info-icon">
                    📍
                </div>


                <div>

                    <h3>
                        Our Location
                    </h3>

                    <p>
                        Thorgo, Gilgit-Baltistan, Pakistan
                    </p>

                </div>

            </div>



            <!-- PHONE -->

            <div class="info-item">

                <div class="info-icon">
                    ☎
                </div>


                <div>

                    <h3>
                        Phone
                    </h3>

                    <p>
                        +92 300 1234567
                    </p>

                </div>

            </div>



            <!-- EMAIL -->

            <div class="info-item">

                <div class="info-icon">
                    ✉
                </div>


                <div>

                    <h3>
                        Email
                    </h3>

                    <p>
                        gpi@gmail.com
                    </p>

                </div>

            </div>



            <!-- OFFICE HOURS -->

            <div class="info-item">

                <div class="info-icon">
                    ⏰
                </div>


                <div>

                    <h3>
                        Office Hours
                    </h3>

                    <p>
                        Monday - Friday
                    </p>

                    <p>
                        9:00 AM - 4:00 PM
                    </p>

                </div>

            </div>


        </div>



        <!-- =================================================
             CONTACT FORM
        ================================================== -->

        <div class="contact-form-box">


            <div class="form-heading">

                <span>
                    SEND A MESSAGE
                </span>

                <h2>
                    How Can We Help?
                </h2>

            </div>



            <?php

            if ($status != "") {

                echo '<div class="success-message">';
                echo $status;
                echo '</div>';

            }

            ?>



            <form action="contact.php"
                  method="POST">


                <!-- NAME + EMAIL -->

                <div class="form-row">


                    <div class="input-box">

                        <label>
                            Your Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            placeholder="Enter your name"
                            required
                        >

                    </div>



                    <div class="input-box">

                        <label>
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            placeholder="Enter your email"
                            required
                        >

                    </div>


                </div>



                <!-- PHONE + SUBJECT -->

                <div class="form-row">


                    <div class="input-box">

                        <label>
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            placeholder="Enter your phone number"
                            required
                        >

                    </div>



                    <div class="input-box">

                        <label>
                            Subject
                        </label>

                        <input
                            type="text"
                            name="subject"
                            placeholder="Enter subject"
                            required
                        >

                    </div>


                </div>



                <!-- MESSAGE -->

                <div class="input-box">

                    <label>
                        Your Message
                    </label>

                    <textarea
                        name="message"
                        placeholder="Write your message here..."
                        rows="7"
                        required
                    ></textarea>

                </div>



                <!-- SUBMIT -->

                <button
                    type="submit"
                    name="sub"
                    class="submit-button">

                    Send Message
                    <span>→</span>

                </button>


            </form>

        </div>


    </div>

</section>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="footer">
    <div class="container footer-grid">
    <div>
    <h3> Polytechnic Institute Thorgo</h3>
    <p>Practical education and career-focused skills for a changing world.</p>
</div>
<div>
    <h3>Explore</h3>
    <a href="about.html">About Us</a>
    <a href="courses.html">Courses</a>
    <a href="admissions.html">Admissions</a>
</div>
<div>
    <h3>Student</h3>
    <a href="gallery.html">Campus Gallery</a>
    <a href="news.html">News & Events</a>
    <a href="contact.html">Contact</a>
</div>
<div>
    <h3>Contact</h3>
    <p>Thorgo, Pakistan</p>
    <p>Email: gpi@gmail.com</p>
    <p>Phone: +92 5432223</p>
</div>
</div>
<div class="container footer-bottom">
    <span>© 2026  Polytechnic Institute Thorgo. All rights reserved.</span>
    
    <span>Designed for educational use.</span>
</div>
</footer>


</body>

</html>