<?php
include 'db/db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
$post = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Post</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Edit Post</h2>
  <form action="update_post.php" method="post">
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    
    <label>Title:</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>
    
    <label>Content:</label><br>
    <textarea name="content" rows="6" cols="40" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>
    
    <input type="submit" value="Update Post" class="btn edit">
  </form>
</body>
</html>

