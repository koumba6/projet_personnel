<?php

 
require '../function/function.php';


if (isset($_POST['email']) && isset($_POST['motdepasse'])) {
    // if(!empty($_POST['email']) && !empty($_POST['motdepasse'])){ 
    // $email = htmlspecialchars($_POST['email']);
    // $motdepasse = htmlspecialchars($_POST['motdepasse']);
    // $email = strtolower($email);


    $requeste = new WebUSER();
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    $requeste->connexion($email, $motdepasse);
    //  var_dump($coumba);die; 
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>connexion</title>

</head>

<body>

    <div class="container  d-flex justify-content-center mt-5">

        <form action="connexion.php" method="POST" class="row g-4 d-block bg-light " id="myform">
            <div class="container">

                <span class=" text-center d-flex justify-content-center text-success"> CONNEXION </span>
 
               <!-- <div class="col-md-12 justify-content-center" >
                <label for="email "> email</label>
                <input type="text" name="userame" id="username">
                <p id="myError"></p>
                </div> -->
            
               

                 <div class="col-md-12 p-3 justify-content-center">
                    <label for="input1">email</label>
                    <input id="email" class="form-control" type='text' name='email' required placeholder="email" name="email">
                    <span id="myError"> </span>
                </div>

                <div class="col-md-12 p-3 justify-content-center">
                    <label for="input2">motdepasse</label>
                    <input id="motdepasse" class="form-control" type="password" required placeholder="motdepasse" name="motdepasse">
                    <span id="Error"></span>

                </div>

                <div class="row d-flex justify-content-center mt-2">
                    <button type="submit" onclick="return btnLoad()" class="btn btn-success col-12 " name="submit">
                        <i class="spinOff">Connexion</i>
                        <i class="spinOn" style="display: none">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            Loading...
                        </i>
                    </button>

                </div>   
            </div>
            <span class="text text-center mt-2">

                <a href="inscription.php" style="text-decoration:none;">s'inscrire?</a>

            </span>

        </form>

    </div>
    <!-- <script src="js/connexion.js"></script> -->
</body>

</html>