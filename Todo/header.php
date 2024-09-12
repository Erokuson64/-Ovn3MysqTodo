<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link rel="stylesheet" href="TodoStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>

<script>
    window.onload = function() {
        CKEDITOR.replace('description');
    };
</script>

<body>
    <header>
        <h1>To-Do Application</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="create.php">Add Task</a></li>
            </ul>
        </nav>
    </header>