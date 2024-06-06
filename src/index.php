<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./scripts/comment_add.php" method="POST">
        <input type="text" placeholder="Enter your name" name="input_username">
        <input type="email" placeholder="Enter your email" name="input_email">
        <input type="textarea" placeholder="Enter your comment" name="input_message">
        <input type="submit">
    </form>

    <?php if(isset($_GET['error'])) :?>
    <p><?php echo $_GET['error'] ?></p>
    <?php endif;?>
    <?php if(isset($_GET['success'])) :?>
    <p><?php echo $_GET['success'] ?></p>
    <?php endif;?>


</body>

</html>