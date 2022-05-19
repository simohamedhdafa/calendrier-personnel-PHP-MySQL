<?php include 'functions.php'; 
    if (isset($_POST['envoyer'])){
        fdebug($_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s'inscrire</title>
</head>
<body>
    <form method="post" action="#" enctype="multipart/form-data">
        <label for="fname">First name:</label><br>
        <input type="text"  name="fname" required><br>
        <label for="lname">Last name:</label><br>
        <input type="text" name="lname" required><br>
        <label for="date-naiss">Date de naissance:</label><br>
        <input type="date" name="date-naiss" required><br>
        <label for="date-naiss">Email:</label><br>
        <input type="email" name="email" required><br>
        <label for="password">mot de pass:</label><br>
        <input type="password" name="password" required><br>
        <label for="password">confirmation:</label><br>
        <input type="password" name="confirmation" required><br>
        <label for="photo">photo identité:</label><br>
        <input type="file" name="photo" required><br>
        <input type="submit" name="envoyer" value="creer">
    </form>
</body>
</html>