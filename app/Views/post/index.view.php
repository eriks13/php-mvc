<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>post</h1>

    <a href="/post/create">create post</a>


    <ul>
        <?php foreach ($posts as $post): ?>
            <li><?=$post["id"] ?></li>
            <li><?=$post["title"] ?></li>
            <a  href="/post/<?= $post["id"] ?>">show</a>
            <a  href="/post/edit/<?= $post["id"] ?>">edit</a>
            <form action="/post/delete/<?= $post["id"] ?>" method="post">
                <button type="submit">delete</button>
            </form>
        <?php endforeach; ?>
    </ul>
</body>
</html>