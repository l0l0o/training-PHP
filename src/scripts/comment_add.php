<?php 
$username = $_POST['input_username'];
$email = $_POST['input_email'];
$content = $_POST['input_message'];
$rating = 4;

if(isset($username) && $username !== "" && isset($email) && $email !== "" && isset($content) && $content !== "" ) {
    $connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
    $request = $connectDatabase->prepare("INSERT INTO comment (username, email, content, rating) VALUES (:username, :email, :content, :rating)");
    
    $request->bindParam(':username', $username);
    $request->bindParam(':email', $email);
    $request->bindParam(':content', $content);
    $request->bindParam(':rating', $rating);
    
    $request->execute();
    
    header("Location: ../index.php?success=Commentaire envoyé !");

} else {
    header("Location: ../index.php?error=Il doit manquer un élément.");
}