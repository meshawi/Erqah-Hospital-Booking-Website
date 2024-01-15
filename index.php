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
  <title>Imamu Project</title>
  <meta charset="utf-8" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload">
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

  <section id="banner">
    <div class="inner">
      <h1>مستشفى عرقة</h1>
      <p>
        اهلاً و سهلاً بكم في مستشفى عرقة , نقدم لكم خدمات الرعاية الصحية في
        المملكة العربية السعودية<br />
      </p>
    </div>
    <video autoplay loop muted playsinline src="images/banner.mp4"></video>
  </section>
  <section class="wrapper">
    <div class="inner">
      <header class="special">
        <h2>قائمة الخدمات الطبية</h2>
        <p>تم توفير القائمه لخدمتكم بشكل اسهل</p>
      </header>
      <div class="highlights">
        <section>
          <div class="content">
            <header>
              <a href="ClinicType.php" class="icon fa-vcard-o"><span class="label">Icon</span></a>
              <h3>خدمات العياده</h3>
            </header>
            <p>
              قائمة بالخدمات العياده واإلجراءات الطبيه المقدمه وشرح لكل خدمه
              وفوائدها
            </p>
          </div>
        </section>
        <section>
          <div class="content">
            <header>
              <a href="#" class="icon fa-files-o"><span class="label">Icon</span></a>
              <h3>مقاالت صحيه</h3>
            </header>
            <p>مقاالت تثقيفيه حول االمراض والوقايه منها نصائح صحيه للمرضئ</p>
          </div>
        </section>
        <section>
          <div class="content">
            <header>
              <a href="#" class="icon fa-floppy-o"><span class="label">Icon</span></a>
              <h3>التأمين الصحي</h3>
            </header>
            <p>إرشادات حول التأمين الصحي وكيفية التعامل معه</p>
          </div>
        </section>
        <section>
          <div class="content">
            <header>
              <a href="#" class="icon fa-line-chart"><span class="label">Icon</span></a>
              <h3>اسئله شائعه</h3>
            </header>
            <p>صفحة تجمع اهم االسئله واجاباته</p>
          </div>
        </section>
        <section>
          <div class="content">
            <header>
              <a href="#" class="icon fa-paper-plane-o"><span class="label">Icon</span></a>
              <h3>شهادات المرضئ</h3>
            </header>
            <p>تجارب المرضئ السابقين مع إمكاني ة تقييم الخدمه المقدمه لكم</p>
          </div>
        </section>
        <section>
          <div class="content">
            <header>
              <a href="ClinicType.php" class="icon fa-qrcode"><span class="label">Icon</span></a>
              <h3>حجز المواعيد</h3>
            </header>
            <p>لحجز المواعيد عبر االنترنت</p>
          </div>
        </section>
      </div>
    </div>
  </section>
  <section id="cta" class="wrapper">
    <div class="inner">
      <h2>عن مستشفى عرقة</h2>
      <p>
        يعدّ مستشفى عرقة من أكبر المؤسسات التي تقدم خدمات الرعاية الصحية في
        المنطقة، وقد أسستها عائلة الحريري , و تعمل إدارة مستشفي عرقة على تسيير
        عدة فروع متعددة التخصصات بالمملكة العربية السعودية<br />
        (جدة، الرياض، المدينة المنورة، عسير و حائل والدمام ومكة و حي الجامعة )
        .
      </p>
    </div>
  </section>
  <section class="wrapper">
    <div class="inner">
      <header class="special">
        <h2>دكاترينا الخبراء</h2>
        <p>نساعدكم على الحفاظ على صحتكم وعمركم الدائم</p>
      </header>
      <div class="testimonials">
        <section>
          <div class="content">
            <blockquote>
              <p>
                الطبيب المتخصص في علاج الأمراض والإصابات التي تصيب العظام بما
                في ذلك عظام القدم والكاحل والركبة والورك والكتف والرسغ.
              </p>
            </blockquote>
            <div class="author">
              <div class="image">
                <img height="256" width="256" src="images/DCTR1.png" alt="" />
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="content">
            <blockquote>
              <p>
                يقوم أخصائي الأذن والأنف والحنجرة بتشخيص وعلاج أمراض الأذنين
                والأنف والجيوب الأنفية والفم والحنجرة بالإضافة للرأس والعنق.
              </p>
            </blockquote>
            <div class="author">
              <div class="image">
                <img height="256" width="256" src="images/DCTR2.png" alt="" />
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="content">
            <blockquote>
              <p>
                أخصائي طب الأسرة الرعاية الصحية الأولية شاملة للمرضى، ويعالجون
                المرضى من جميع الأعمار بمختلف الحالات الطبية بما في ذلك
                الأمراض قصيرة الأمد والمزمنة.
              </p>
            </blockquote>
            <div class="author">
              <div class="image">
                <img height="256" width="256" src="images/DCTR3.png" alt="" />
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
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
              <a href=""><i class="icon fa-twitter">&nbsp;</i>Twitter</a>
            </li>
            <li>
              <a href=""><i class="icon fa-facebook">&nbsp;</i>Facebook</a>
            </li>
            <li>
              <a href=""><i class="icon fa-instagram">&nbsp;</i>Instagram</a>
            </li>
            <li>
              <a href=""><i class="icon fa-github">&nbsp;</i>Github</a>
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