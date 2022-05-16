<?php 
    include 'functions.php';
    

    if(isset($_POST['envoyer']) && $_POST['envoyer']=="ok"){
        $target_dir = "imgs/";
        $target_file = $target_dir . $_POST["season"] . ".jpg";
        //$target_file = "imgs/wwinter.jpg";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //fdebug($target_file);
        //fdebug($_FILES);
        $check = getimagesize($_FILES["myfile"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        //fdebug($_FILES);
        // Check file size
        if ($_FILES["myfile"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editer images</title>
    <link rel="stylesheet" href="stylecss.css">
</head>
<body>
<h1>TP Calendrier personnel</h1>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="addseasons.php">Editer saisons</a></li>
        <li><a href="editimages.php">Editer images</a></li>
        <li><a href="#">s'inscrire</a></li>
    </ul> 
    <div class="formulaire">
        <table>
            <tr>
                <td><img src="imgs/winter.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="text" name="season" value="winter" hidden>
                        <label for="myfile">Select an image:</label>
                        <input type="file" name="myfile"><input type="submit" name="envoyer" value="ok">
                    </form>
                </td>
            </tr><tr>
                <td><img src="imgs/spring.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="text" name="season" value="spring" hidden>
                        <label for="myfile">Select an image:</label>
                        <input type="file" name="myfile"><input type="submit" name="envoyer" value="ok">
                    </form>
                </td>
            </tr><tr>
                <td><img src="imgs/summer.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="text" name="season" value="summer" hidden>
                        <label for="myfile">Select an image:</label>
                        <input type="file" name="myfile"><input type="submit" name="envoyer" value="ok">
                    </form>
                </td>
            </tr><tr>
                <td><img src="imgs/autumn.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="text" name="season" value="autumn" hidden>
                        <label for="myfile">Select an image:</label>
                        <input type="file" name="myfile"><input type="submit" name="envoyer" value="ok">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>