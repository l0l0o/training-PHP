<?php 

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
    // var_dump($_GET);die();
    if(@$_GET['dateUp']=='true') {
        $request = $connectDatabase->prepare("SELECT * FROM comment ORDER BY comment . created_at ASC");
        
    }
    elseif(@$_GET['dateDown']=='true') {
        $request = $connectDatabase->prepare("SELECT * FROM comment ORDER BY comment . created_at DESC");

    }    
    elseif(@$_GET['ratingUp']=='true') {
        $request = $connectDatabase->prepare("SELECT * FROM comment ORDER BY comment . rating ASC");
        
    }
    elseif(@$_GET['ratingDown']=='true') {
        $request = $connectDatabase->prepare("SELECT * FROM comment ORDER BY comment . rating DESC");
        
    } else {
        $request = $connectDatabase->prepare("SELECT * FROM comment");

        }
        $request->execute();
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
            <input type="number" placeholder="1-5" min="1" max="5" name="input_rating">
            <input type="submit">
        </form>

        <?php if(isset($_GET['error'])) :?>
        <p><?php echo $_GET['error'] ?></p>
        <?php endif;?>
        <?php if(isset($_GET['success'])) :?>
        <p><?php echo $_GET['success'] ?></p>
        <?php endif;?>

        <div class="container mt-5">

            <a href="./index.php?dateUp=true"><button type="button" class="btn">Trier par date (Croissant)</button></a>
            <a href="./index.php?dateDown=true"><button type="button" class="btn">Trier par date
                    (Décroissant)</button></a>

            <a href="./index.php?ratingUp=true"><button type="button" class="btn">Trier par score
                    (Croissant)</button></a>
            <a href="./index.php?ratingDown=true"><button type="button" class="btn">Trier par score
                    (Décroissant)</button></a>



            <?php if(isset($commentList[0])) :?>
            <?php foreach($commentList as $comment) :?>
            <div class="card mt-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $comment['username']?></h5>
                    <p class="card-text"><?php echo $comment['rating']?></p>
                    <p class="card-text"><?php echo $comment['content']?></p>
                    <p class="card-text"><?php echo $comment['created_at'] ?></p>
                </div>
            </div>

            <?php endforeach;?>
            <?php endif ?>
        </div>





    </div>



</body>

</html>