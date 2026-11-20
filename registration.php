<?php
$server = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'student';

$connection = mysqli_connect($server, $user_name, $password, $db_name);

if (!$connection) {
    die("Error: Database connection failed.");
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $na = $_POST["n"];
    $lan = $_POST["ln"];
    $f = $_POST["fn"];
    $cn = $_POST["c"];
    $eml = $_POST["em"];
    $ph = $_POST["p"];
    $gender = $_POST["g"];
    $sl = $_POST["s"];
    $dp = $_POST["sel"];

    // File upload
    $fa = "";

    if (isset($_FILES["fil"]) && $_FILES["fil"]["error"] == 0) {

        $uploadFolder = "uploads/";

        if (!is_dir($uploadFolder)) {
            mkdir($uploadFolder, 0777, true);
        }

        $fileName = basename($_FILES["fil"]["name"]);
        $fileName = time() . "_" . $fileName;

        $filePath = $uploadFolder . $fileName;

        if (move_uploaded_file($_FILES["fil"]["tmp_name"], $filePath)) {
            $fa = $filePath;
        }
    }

    $query = "INSERT INTO registration 
    (first_name, last_name, father_name, cnic, email, phone, gender, country, department, file)
    VALUES 
    ('$na','$lan','$f','$cn','$eml','$ph','$gender','$sl','$dp','$fa')";

    $data = mysqli_query($connection, $query);

    if ($data) {
        $message = "Registration submitted successfully!";
    } else {
        $message = "Error: Data could not be inserted.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admissions  Polytechnic Institute Thorgo</title>

    <link rel="stylesheet" href="css/registration.css">
</head>

<body>

<!-- HEADER -->
<header class="site-header">

    <div class="top-bar">
        <div class="container">
            <span> Polytechnic Institute Thorgo</span>
            <span>Admissions Open</span>
        </div>
    </div>

    <div class="main-header">

        <div class="container header-inner">

            <a href="index.html" class="logo">
                <span class="logo-box"></span>

                <div>
                    <strong>Polytechnic</strong>
                    <small> Institute Thorgo</small>
                </div>
            </a>

            <button class="menu-btn" id="menuBtn">
                ☰
            </button>

            <nav class="nav" id="mainNav">

                <a href="index.html">Home</a>
                <a href="about.html">About</a>
                <a href="courses.html">Courses</a>
                
                <a href="facilities.html">facilities</a>
                <a href="admissions.html">Admissions</a>
                <a href="gallery.html">Gallery</a>
                <a href="news.html">News</a>
                <a href="contact.html">Contact</a>

                <a href="registration.php" class="register-link">
                    Register Now
                </a>

            </nav>

        </div>

    </div>

</header>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background: #f4f7fa;
    color: #172b4d;
    line-height: 1.6;
}

.container {
    width: min(1180px, 92%);
    margin: auto;
}


/* ================= HEADER ================= */

.top-bar {
    background: #0d1f38;
    color: white;
    font-size: 13px;
}

.top-bar .container {
    min-height: 38px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.main-header {
    background: white;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.header-inner {
    min-height: 82px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.logo {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    color: #10233f;
}

.logo-box {
    width: 48px;
    height: 48px;
    background: #1769aa;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    font-size: 16px;
}

.logo strong {
    display: block;
    font-size: 18px;
}

.logo small {
    display: block;
    color: #667085;
    font-size: 12px;
}

.nav {
    display: flex;
    align-items: center;
    gap: 25px;
}

.nav a {
    color: #243b53;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
}

.nav a:hover {
    color: #1769aa;
}

.register-link {
    background: #1769aa;
    color: white !important;
    padding: 12px 18px;
    border-radius: 3px;
}

.menu-btn {
    display: none;
    background: none;
    border: 0;
    font-size: 28px;
    cursor: pointer;
}


/* ================= HERO ================= */

.page-hero {
    background: #10233f;
    color: white;
    padding: 70px 0;
}

.hero-small {
    color: #f4b942;
    font-size: 13px;
    font-weight: bold;
    letter-spacing: 2px;
}

.page-hero h1 {
    font-size: clamp(35px, 5vw, 55px);
    margin: 10px 0;
}

.page-hero p {
    max-width: 650px;
    color: #dbe6f1;
    font-size: 17px;
}


/* ================= REGISTRATION ================= */

.registration-section {
    padding: 75px 0;
}

.registration-grid {
    display: grid;
    grid-template-columns: 0.8fr 1.2fr;
    gap: 55px;
    align-items: start;
}

.registration-info {
    padding-top: 20px;
}

.section-label {
    color: #1769aa;
    font-size: 13px;
    font-weight: bold;
    letter-spacing: 2px;
}

.registration-info h2 {
    font-size: 38px;
    line-height: 1.2;
    margin: 15px 0 20px;
    color: #10233f;
}

.registration-info > p {
    color: #667085;
    margin-bottom: 30px;
}

.info-box {
    background: white;
    padding: 28px;
    border-left: 5px solid #1769aa;
    box-shadow: 0 8px 30px rgba(0,0,0,0.06);
}

.info-box h3 {
    margin-bottom: 15px;
}

.info-box ul {
    padding-left: 20px;
    color: #667085;
}

.info-box li {
    margin: 8px 0;
}

.contact-box {
    margin-top: 25px;
    background: #eaf4fb;
    padding: 22px;
}

.contact-box p {
    color: #667085;
    margin-top: 5px;
}


/* ================= FORM ================= */

.form-card {
    background: white;
    padding: 40px;
    box-shadow: 0 12px 40px rgba(16,35,63,0.12);
    border-top: 5px solid #1769aa;
}

.form-heading {
    border-bottom: 1px solid #e5e7eb;
    padding-bottom: 22px;
    margin-bottom: 25px;
}

.form-heading span {
    color: #1769aa;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 2px;
}

.form-heading h2 {
    color: #10233f;
    font-size: 30px;
    margin: 5px 0;
}

.form-heading p {
    color: #667085;
    font-size: 14px;
}

.message {
    padding: 13px 15px;
    margin-bottom: 20px;
    background: #e8f7ee;
    border-left: 4px solid #218739;
    color: #176b2c;
    font-weight: 600;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 700;
    color: #243b53;
    margin-bottom: 7px;
}

.form-group input,
.form-group select {
    width: 100%;
    height: 48px;
    padding: 0 14px;
    border: 1px solid #ccd5df;
    border-radius: 3px;
    background: white;
    color: #243b53;
    font-size: 14px;
    outline: none;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #1769aa;
    box-shadow: 0 0 0 3px rgba(23,105,170,0.10);
}

.form-group input[type="file"] {
    padding: 12px;
}

.form-group small {
    display: block;
    color: #7b8794;
    margin-top: 5px;
    font-size: 12px;
}


/* ================= RADIO ================= */

.radio-group {
    display: flex;
    gap: 25px;
}

.radio-option {
    display: flex !important;
    align-items: center;
    gap: 7px;
    font-weight: normal !important;
}

.radio-option input {
    width: 17px;
    height: 17px;
}


/* ================= BUTTON ================= */

.submit-btn {
    width: 100%;
    min-height: 52px;
    border: none;
    background: #1769aa;
    color: white;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.submit-btn:hover {
    background: #10233f;
}

.submit-btn span {
    margin-left: 10px;
    font-size: 18px;
}


/* ================= FOOTER ================= */

.footer {
    background: #0d1f38;
    color: white;
}

.footer-grid {
    padding: 55px 0;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 50px;
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: 12px;
}

.footer-logo span {
    width: 45px;
    height: 45px;
    background: #1769aa;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
}

.footer p {
    color: #b7c4d4;
    margin-top: 15px;
    max-width: 400px;
}

.footer h3 {
    margin-bottom: 15px;
}

.footer a {
    display: block;
    color: #b7c4d4;
    text-decoration: none;
    margin: 8px 0;
}

.footer a:hover {
    color: white;
}

.footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.12);
    padding: 18px 0;
    color: #aebccd;
    font-size: 13px;
}


/* ================= RESPONSIVE ================= */

@media (max-width: 900px) {

    .menu-btn {
        display: block;
    }

    .nav {
        display: none;
        position: absolute;
        left: 0;
        right: 0;
        top: 82px;
        background: white;
        padding: 20px;
        flex-direction: column;
        align-items: stretch;
        box-shadow: 0 10px 20px rgba(0,0,0,0.12);
    }

    .nav.active {
        display: flex;
    }

    .nav a {
        padding: 10px;
    }

    .registration-grid {
        grid-template-columns: 1fr;
    }

    .footer-grid {
        grid-template-columns: 1fr 1fr;
    }
}


@media (max-width: 600px) {

    .top-bar .container {
        font-size: 11px;
    }

    .header-inner {
        min-height: 70px;
    }

    .logo strong {
        font-size: 15px;
    }

    .logo small {
        font-size: 10px;
    }

    .page-hero {
        padding: 50px 0;
    }

    .registration-section {
        padding: 45px 0;
    }

    .registration-info h2 {
        font-size: 30px;
    }

    .form-card {
        padding: 22px;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }

    .radio-group {
        flex-direction: column;
        gap: 10px;
    }

    .footer-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }

}
</style>


<!-- PAGE HERO -->
<section class="page-hero">

    <div class="container">

        <span class="hero-small">ADMISSIONS</span>

        <h1>Student Registration</h1>

        <p>
            Start your journey at Thorgo Polytechnic Institute.
            Complete the registration form below.
        </p>

    </div>

</section>


<!-- REGISTRATION SECTION -->
<section class="registration-section">

    <div class="container registration-grid">

        <!-- LEFT INFORMATION -->
        <div class="registration-info">

            <span class="section-label">ONLINE REGISTRATION</span>

            <h2>Apply to Thorgo Polytechnic Institute</h2>

            <p>
                Please provide your information carefully. Our admissions
                team will review your registration and contact you regarding
                the next steps.
            </p>

            <div class="info-box">

                <h3>Why Register With Us?</h3>

                <ul>
                    <li>Professional technical education</li>
                    <li>Practical skills and training</li>
                    <li>Multiple diploma programs</li>
                    <li>Modern learning environment</li>
                    <li>Career-focused courses</li>
                </ul>

            </div>

            <div class="contact-box">

                <strong>Admissions Office</strong>

                <p>
                    For registration assistance, please contact
                    the institute admissions office.
                </p>

            </div>

        </div>


        <!-- FORM -->
        <div class="form-card">

            <div class="form-heading">

                <span>APPLICATION FORM</span>

                <h2>Register Now</h2>

                <p>
                    Fields marked with * are required.
                </p>

            </div>


            <?php if ($message != ""): ?>

                <div class="message">
                    <?php echo $message; ?>
                </div>

            <?php endif; ?>
            


            <form action="" method="POST" name="f1"
                  enctype="multipart/form-data">


                <!-- NAME -->
                <div class="form-row">

                    <div class="form-group">

                        <label>First Name *</label>

                        <input
                            type="text"
                            name="n"
                            placeholder="Enter first name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>Last Name *</label>

                        <input
                            type="text"
                            name="ln"
                            placeholder="Enter last name"
                            required
                        >

                    </div>

                </div>


                <!-- FATHER NAME -->
                <div class="form-group">

                    <label>Father Name *</label>

                    <input
                        type="text"
                        name="fn"
                        placeholder="Enter your father name"
                        required
                    >

                </div>


                <!-- CNIC -->
                <div class="form-row">

                    <div class="form-group">

                        <label>CNIC *</label>

                        <input
                            type="text"
                            name="c"
                            placeholder="Enter your CNIC"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>Phone Number *</label>

                        <input
                            type="tel"
                            name="p"
                            placeholder="Enter phone number"
                            required
                        >

                    </div>

                </div>


                <!-- EMAIL -->
                <div class="form-group">

                    <label>Email Address *</label>

                    <input
                        type="email"
                        name="em"
                        placeholder="Enter your email"
                        required
                    >

                </div>


                <!-- GENDER -->
                <div class="form-group">

                    <label>Gender *</label>

                    <div class="radio-group">

                        <label class="radio-option">

                            <input
                                type="radio"
                                name="g"
                                value="male"
                                required
                            >

                            <span>Male</span>

                        </label>


                        <label class="radio-option">

                            <input
                                type="radio"
                                name="g"
                                value="female"
                                required
                            >

                            <span>Female</span>

                        </label>

                    </div>

                </div>


                <!-- COUNTRY -->
                <div class="form-group">

                    <label>Country *</label>

                    <select name="s" required>

                        <option value="">Select Country</option>

                        <option value="Pakistan">Pakistan</option>
                        <option value="India">India</option>
                        <option value="China">China</option>

                    </select>

                </div>


                <!-- DEPARTMENT / COURSE -->
                <div class="form-group">

                    <label>Course / Department *</label>

                    <select name="sel" required>

                        <option value="">Select Course</option>

                        <option value="Web Development">
                            Web Development
                        </option>

                        <option value="Artificial Intelligence">
                            Artificial Intelligence
                        </option>

                        <option value="E-Commerce">
                            E-Commerce
                        </option>

                        <option value="Graphic Design">
                            Graphic Design
                        </option>

                        <option value="Fashion Design">
                            Fashion Design
                        </option>

                        <option value="Cooking">
                            Cooking & Culinary
                        </option>

                        <option value="Electrician">
                            Electrician
                        </option>

                        <option value="IT Diploma">
                            IT Diploma
                        </option>

                        <option value="Electrical Diploma">
                            Electrical Diploma
                        </option>

                        <option value="Fashion Design Diploma">
                            Fashion Design Diploma
                        </option>

                        <option value="Web Development Diploma">
                            Web Development Diploma
                        </option>

                        <option value="Hospitality">
                            Hospitality Skills
                        </option>

                    </select>

                </div>


                <!-- FILE -->
                <div class="form-group">

                    <label>Upload Document *</label>

                    <input
                        type="file"
                        name="fil"
                        required
                    >

                    <small>
                        Upload your required document.
                    </small>

                </div>


                <!-- SUBMIT -->
                <button
                    type="submit"
                    name="sub"
                    class="submit-btn"
                >
                    Submit Registration
                    <span>→</span>
                </button>


            </form>

        </div>

    </div>

</section>


<!-- FOOTER -->
<footer class="footer">

    <div class="container footer-grid">

        <div>

            <div class="footer-logo">
                <span>TPI</span>
                <strong>Thorgo Polytechnic Institute</strong>
            </div>

            <p>
                Building practical skills, knowledge and
                opportunities for the future.
            </p>

        </div>


        <div>

            <h3>Quick Links</h3>

            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="courses.html">Courses</a>
            <a href="admissions.html">Admissions</a>

        </div>


        <div>

            <h3>Admissions</h3>

            <a href="registration.php">Register Now</a>
            <a href="contact.html">Contact Us</a>

        </div>

    </div>


    <div class="footer-bottom">

        <div class="container">

            © 2026 Thorgo Polytechnic Institute.
            All Rights Reserved.

        </div>

    </div>

</footer>


<script src="js/registration.js"></script>

</body>
</html>
