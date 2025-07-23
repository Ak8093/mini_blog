<?php
include 'db/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM posts WHERE id = $id");
    $post = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="blog-post">
        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
        <a class="btn" href="index.php">← Back to Blog</a>
    </div>
</body>
</html>

