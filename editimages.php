<?php 
    include 'functions.php';
    // session 
    session_start();
    permission_navigation($_SESSION, array('admin', 'active'), 'logout.php');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="alert alert-primary" role="alert">
                TP Calendrier personnel en PHP
            </div>
        </div>
        <div class="row">
            <!-- As a heading -->
            <?php echo navbar_bootstrap($_SESSION['role']); ?>
        <div>
    <div class="formulaire">
        <table>
            <tr>
                <td><img src="imgs/winter.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="text" name="season" value="winter" hidden>
                        <label for="myfile">Winter:</label>
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
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>