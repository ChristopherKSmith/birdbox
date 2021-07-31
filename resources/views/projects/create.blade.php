<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Project</title>
</head>

<body>
    <h1>Create a Project</h1>
    <form method="POST" action="/projects" class="container">
        @csrf
        <input type="text" name="title">
        <input type="text" name="description">
        <button type="submit">Create Project</button>
    </form>
</body>

</html>
