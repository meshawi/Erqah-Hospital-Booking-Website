<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact (first_name, last_name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $message);

    if ($stmt->execute()) {
        echo "Rating saved successfully";
        header("Refresh:3; url=index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} 
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ContactUs.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<header id="header" dir="ltr" lang="en">
    <a class="logo" href="index.php">Imamu Project</a>
    <nav><a href="#menu">القائمة</a></nav>
</header>
<nav id="menu">
    <ul class="links">
        <li><a href="index.php">الصفحة الرئيسة</a></li>
        <li><a href="profile.php">الملف الشخصي</a></li>
        <li><a href="ClinicType.php">حجز موعد</a></li>
        <li><a href="about.html">عنا</a></li>
        <li><a href="ContactUs.php">تواصل معنا</a></li>
        <li><a href="Rating.php">قيمنا</a></li>
        <li><a href="FAQs.html">الأسئلة الشائعة</a></li>
    </ul>
</nav>

<body>
<div class="contactus">
    <div class="title">
        <h2 style="color: black;">تواصل معنا </h2>
    </div>

    <div class="box">
        <div class="contact form">
            <h3>ارسل رسالتك</h3>
            <form action="ContactUs.php" method="post">
                <div class="formBox">
                    <div class="row50">
                        <div class="inputBox">
                            <span>الاسم الاول</span>
                            <input type="text" name="first_name" placeholder="ادخل اسمك الاول">
                        </div>
                        <div class="inputBox">
                            <span>اسم العائلة</span>
                            <input type="text" name="last_name" placeholder="ادخل اسم العائلة">
                        </div>
                    </div>
                    <div class="row50">
                        <div class="inputBox">
                            <span>الإيميل</span>
                            <input type="email" name="email" placeholder="****@gmail.com">
                        </div>
                        <div class="inputBox">
                            <span>رقم الجوال</span>
                            <input  type="text" name="phone" placeholder="+966 * ** *">
                        </div>
                    </div>
                    <div class="row100">
                        <div class="inputBox">
                            <span>المحتوى</span>
                            <textarea name="message" placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>
                    </div>
                    <div class="row100">
                        <div class="inputBox">
                            <input type="submit" value="Send">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="contact info">
            <h3>معلومات التواصل</h3>
            <div class="infobox">
                <div>
                    <span><ion-icon name="location"></ion-icon></span>
                    <p>مدينة الرياص, حي عرقة <br>المملكة العربية السعودية</p>
                </div>
                <div>
                    <span><ion-icon name="mail"></ion-icon></span>
                    <a href="mailto:Irqah.hospital@gmail.com">Irqah.hospital@email.com</a>
                </div>
                <div>
                    <span><ion-icon name="call"></ion-icon></span>
                    <a dir="ltr" href="tel:+966 5629812098">+966 562 9812 098</a>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3625.007894385603!2d46.58715022391479!3d24.692255351966313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f1fa494dba68d%3A0x31cb0c6246abdf54!2z2YXYs9iq2LTZgdmJINi52LHZgtip!5e0!3m2!1sar!2ssa!4v1704468527540!5m2!1sar!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<footer id="footer">
    <div class="inner">
        <div class="content">
            <section>
                <h3>عيادتنا</h3>
                <p>
                    هي مركز رعاية طبي يقدم رعاية طبية وقائية روتينية للأشخاص الأصحاء،
                    ورعاية طبية للمرضى، وتكون العيادات الطبية بالغالب أصغر من
                    المستشفيات، ويزورها الأشخاص الأقل مرضاً الذين لا يحتاجون إلى
                    المكوث.
                </p>
            </section>
            <section>
                <h4>روابط مفيدة</h4>
                <ul class="alt">
                    <li><a href="ContactUs.php">تواصل معنا</a></li>
                    <li><a href="https://maps.app.goo.gl/BkdD4PyRYsTDP2vM9" target="_blank">موقعنا</a></li>
                    <li><a href="Rating.php">قيمنا</a></li>
                    <li><a href="FAQs.html">الأسئلة الشائعة</a></li>
                </ul>
            </section>
            <section>
                <h4>برامج التواصل الاجتماعي</h4>
                <ul class="plain">
                    <li>
                        <a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon fa-github">&nbsp;</i>Github</a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</footer>

<div id="copyright" class="copyright">
    copyright
    <a href="Credit.pdf" download="Credit.pdf">Mohammed Aleshawi, click for more</a>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
