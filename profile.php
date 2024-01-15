<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="profile.css">
    <title>الملف الشخصي</title>
</head>
<body>
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

    <div class="profile-container">
        <?php
        include 'config.php';
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>الحساب الشخصي</h1>";
            echo "<p>الإيميل: " . $row['email'] . "</p>";
            echo "<p>رقم الجوال: " . $row['phone_number'] . "</p>";
            echo "<p>تاريخ الميلاد: " . $row['dob'] . "</p>";
            echo "<p>الطول: " . $row['height'] . " cm</p>";
            echo "<p>الوزن: " . $row['weight'] . " kg</p>";
            echo "<p>البلد: " . $row['country'] . "</p>";
            echo "<p>الجنس: " . $row['gender'] . "</p>";
        } else {
            echo "No user found";
        }

        $sql = "SELECT a.id, a.appointment_time, d.name as doctor_name FROM appointments a JOIN doctors d ON a.doctor_id = d.id WHERE a.user_id = '$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='appointment-list'>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>موعد مع د. " . $row['doctor_name'] . " في " . $row['appointment_time'] . "</p>";
            }
            echo "</div>";
        } else {
            echo "<p>No appointments found.</p>";
        }

        $conn->close();
        ?>
    </div>

    <div class="logout-button">
        <a href="logout.php" class="button">تسجيل الخروج</a>
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
</body>
</html>
