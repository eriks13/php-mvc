<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><?= $posts->id ?></li>
        <li><?= $posts->user_id ?></li>
        <li><?= $posts->title ?></li>
        <li><?= $posts->content ?></li>
        <li><?= $posts->created_at ?></li>
    </ul>
</body>
</html>