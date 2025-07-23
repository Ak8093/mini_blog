<!DOCTYPE html>
<html>
<head>
  <title>My Mini Blog</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include 'db/db.php';

$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY created_at DESC");

while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="blog-post">';

  // Show image if available
  if (!empty($row['image'])) {
    echo "<img src='uploads/" . htmlspecialchars($row['image']) . "' width='200'><br>";
  }

  // Title and content
  echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
  echo "<p>" . substr(htmlspecialchars($row['content']), 0, 100) . "...</p>";

  // Action buttons
  echo "<a class='read-more' href='read.php?id=" . $row['id'] . "'>Read More</a> ";
  echo "<a class='edit-btn' href='edit.php?id=" . $row['id'] . "'>Edit</a> ";
  echo "<a class='delete-btn' href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Delete this post?\");'>Delete</a>";

  echo "</div><hr>";
}
?>

</body>
</html>

