<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
   <ul>
    <?php foreach ($posts as $post): ?>
        <li><?= $post["title"]; ?></li>
    <?php endforeach; ?>
   </ul>

    <!-- Your HTML content here -->
</body>
</html>
