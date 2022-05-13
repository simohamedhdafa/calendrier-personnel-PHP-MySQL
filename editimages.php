<?php 
    if(isset($_POST['submit'])){
        fdebug($_POST);
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
                <td>Winter</td>
                <td><img src="imgs/winter.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <label for="myfile">Select an image:</label>
                        <input type="file" name="myfile"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </td>
            </tr><tr>
                <td>Spring</td>
                <td><img src="imgs/spring.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <label for="myfile">Select an image:</label>
                        <input type="file" name="myfile"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </td>
            </tr><tr>
                <td>Summer</td>
                <td><img src="imgs/summer.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <label for="myfile">Select an image:</label>
                        <input type="file" name="myfile"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </td>
            </tr><tr>
                <td>Autumn</td>
                <td><img src="imgs/autumn.jpg" alt="#" width="100" height="100"></td>
                <td>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <label for="myfile">Select an image:</label>
                        <input type="file" name="myfile"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>