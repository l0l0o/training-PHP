<?php 

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
    $request = $connectDatabase->prepare("SELECT * FROM comment");
    $request->execute();
    // if(@$_GET['asc']=='true') {
    //     $request = $connectDatabase->prepare("SELECT * FROM recipes WHERE user_id = $user_id ORDER BY recipe_date ASC");
    //     $request->execute();
        
    // }
    // if(@$_GET['desc']=='true') {
    //     $request = $connectDatabase->prepare("SELECT * FROM recipes WHERE user_id = $user_id ORDER BY recipe_date DESC");
    //     $request->execute();

    // }
    $commentList = $request->fetchAll();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <form action="./scripts/comment_add.php" method="POST">
            <input type="text" placeholder="Enter your name" name="input_username">
            <input type="email" placeholder="Enter your email" name="input_email">
            <input type="textarea" placeholder="Enter your comment" name="input_message">
            <input type="submit">
        </form>

        <div class="container mt-5">
            <?php if(isset($commentList[0])) :?>
            <?php foreach($commentList as $comment) :?>
            <div class="card mt-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $comment['username']?></h5>
                    <p class="card-text"><?php echo $comment['content']?></p>
                    <p class="card-text"><?php echo $comment['created_at'] ?></p>
                </div>
            </div>

            <?php endforeach;?>
            <?php endif ?>
        </div>



        <?php if(isset($_GET['error'])) :?>
        <p><?php echo $_GET['error'] ?></p>
        <?php endif;?>
        <?php if(isset($_GET['success'])) :?>
        <p><?php echo $_GET['success'] ?></p>
        <?php endif;?>

    </div>



</body>

</html>