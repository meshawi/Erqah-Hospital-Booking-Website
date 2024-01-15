<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<html dir='rtl' lang='ar'>

<head>
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
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="ClinicType.css">
</head>

<body>
  <header id="header" dir="ltr" lang="en">
    <a class="logo" href="index.html">Imamu Project</a>
    <nav><a href="#menu">القائمة</a></nav>
  </header>
  <nav id="menu">
    <ul class="links">
      <li><a href="index.html">الصفحة الرئيسة</a></li>
      <li><a href="profile.php">الملف الشخصي</a></li>
      <li><a href="ClinicType.php">حجز موعد</a></li>
      <li><a href="about.html">عنا</a></li>
      <li><a href="ContactUs.php">تواصل معنا</a></li>
      <li><a href="Rating.php">قيمنا</a></li>
      <li><a href="FAQs.html">الأسئلة الشائعة</a></li>
    </ul>
  </nav>

  <section class="container">
    <?php
    include 'config.php';

    $sql = "SELECT * FROM clinic_types";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<div class='card-image' style='background-image: url(" . $row['image_url'] . ");'></div>";
        echo "<h2>" . $row['type_name'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<a href='Doctors.php?clinic_id=" . $row['id'] . "'>عرض المواعيد المتوفرة </a>";
        echo "</div>";
      }
    } else {
      echo "No clinic types found";
    }

    $conn->close();
    ?>
  </section>

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