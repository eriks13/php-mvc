<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/post/store" method="post">
        title: <input type="text" name="title">
        title: <select name="user_id" id="">
            <option value="1">erik</option>
            <option value="2">rio</option>
        </select>
        content: <input type="text" name="content">
        date: <input type="date" name="created_at">
        <input type="submit">
    </form>
</body>
</html>