<?php
include 'db/db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

$sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Post updated. <a href='index.php'>Go back</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

