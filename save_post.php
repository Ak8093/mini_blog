<?php
include 'db/db.php';

$title = $_POST['title'];
$content = $_POST['content'];

$imageName = '';
if (isset($_FILES['image']) && $_FILES['image']['name']) {
  $imageName = time() . '_' . $_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $imageName);
}

$sql = "INSERT INTO posts (title, content, image) VALUES ('$title', '$content', '$imageName')";
mysqli_query($conn, $sql);

header("Location: index.php");
?>
