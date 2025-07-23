<?php
include 'db/db.php';
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    // Handle image upload
    $imageName = "";
    if (!empty($_FILES['image']['name'])) {
        $imageName = basename($_FILES['image']['name']);
        $targetPath = "uploads/" . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
    }

    // Insert post into database
    $sql = "INSERT INTO posts (title, content, image) VALUES ('$title', '$content', '$imageName')";
    if (mysqli_query($conn, $sql)) {
        echo "Post added successfully! <a href='index.php'>Go to Home</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Blog Post</title>
</head>
<body>
  <h2>Add New Post</h2>
  <form action="create.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Enter Title" required><br><br>
    <textarea name="content" placeholder="Enter Content" required></textarea><br><br>
    <input type="file" name="image"><br><br>
    <button type="submit" name="submit">Post</button>
  </form>
</body>
</html>

