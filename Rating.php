<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO ratings (rating, comment) VALUES (?, ?)");
    if ($stmt && $stmt->bind_param("is", $rating, $comment) && $stmt->execute()) {
        echo "تم ارسال التقييم بنجاح";
        header("Refresh:3; url=index.php");
    } else {
        echo "Error: " . ($stmt ? $stmt->error : $conn->error);
    }

    $stmt->close();
    $conn->close();
} 
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Rating.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
<body>
<div class="container">
    <div class="post">
        <div class="text">Thanks for rating us!</div>
        <div class="edit">EDIT</div>
    </div>
    <div class="star-widget">
        <div class="title">قيمنا!</div>
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
        <form action="Rating.php" method="post">
            <input type="hidden" name="rating" id="rating" value="">
            <div class="textarea">
                <textarea cols="30" name="comment" placeholder="اوصف تجربتك.."></textarea>
            </div>
            <div class="btn">
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
</div>

<script>
document.querySelector('.star-widget form').addEventListener('submit', function(event) {
    document.querySelector('.star-widget').style.display = "none";
    document.querySelector('.post').style.display = "block";
});

document.querySelector('.edit').onclick = () => {
    document.querySelector('.star-widget').style.display = "block";
    document.querySelector('.post').style.display = "none";
};

document.querySelectorAll('.star-widget input').forEach(item => {
    item.addEventListener('click', event => {
        document.getElementById('rating').value = event.target.id.split('-')[1];
    });
});
</script>
</body>
</html>
