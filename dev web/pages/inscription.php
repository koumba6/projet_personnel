<?php
require "../function/function.php";

 //var_dump($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['roles'], $_POST['motdepasse']);die;
 
if (isset($_POST['nom'], $_POST['prenom'], $_POST['email']  ,$_POST['roles'],$_POST['motdepasse'])) {

  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $motdepasse = password_hash( $_POST['motdepasse'], PASSWORD_DEFAULT);
  $roles = $_POST['roles'];
  

  $requeste = new WebUSER();

  $matricule = $requeste->generateMatricule();
  
  $requeste->inscription($nom, $prenom,$matricule, $email, $roles, $motdepasse,);
 /*  var_dump($fatou);die; */
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
  <title>inscription</title>
</head>

<body>
  <div class="container d-flex justify-content-center " >
  <form  class="row g-1 d-flex  m-5 bg-white needs-validation" action="inscription.php" method="POST" id="Mylogin" novalidate>
  
      <legend class="text-success d-flex justify-content-center">FORMULAIRE D'INSCRIPTION</legend>

      <span class="emailPassword" style="display: none; color:red">Password non identique</span>

      <div class="mb-3 col-md-6">
        <label for="nom" class="form-label">nom</label>
        <input type="text" id="validation01" class="form-control" placeholder="nom" name="nom" required>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
        <span id="error"></span>
      </div>
      <div class="mb-3 col-md-6">
        <label for="prenom" class="form-label">prenom</label>
        <input type="text" id="validation02" class="form-control" placeholder="prenom" name="prenom" required>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
        <span id="error1"></span>
      </div>
      <div class="mb-3 col-md-6">
        <label for="email" class="form-label">email</label>
        <input type="text" onchange="verifEmail()" id="validation03" class="form-control email" placeholder="email" name="email" required>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
        
        <span class="emailErreur" style="display: none; color:red">email incorrecte</span>

      </div>
      <div class="mb-3 col-md-6">
        <label for="role" class="form-label">Role</label>
        <select name="roles" id="roles" class="form-select is-valid" id="validation04" required>
          <span id="error0"></span>
          <option selected disabled value="">selectionner</option>
          <option value="admin" name='roles'>admin</option>
          <option value="user" name='roles'>user</option>
        </select>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="motdepasse" class="form-label">motdepasse</label>
        <input type="password" id="validation05" class="form-control password" placeholder="motdepasse" name="motdepasse" required>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
        <span id="error3"></span>
      
      </div>
      <div class="mb-3 col-md-6">
        <label for="confirmation" class="form-label">confirmation</label>
        <input type="password" id="validation06" onchange="verifPassword()" class="form-control confirmation" placeholder="confirmation" name="confirmation" required>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
        <span id="error4"></span>
        
      
      </div>
      <!-- <div class="mb-3 col-md-3">
        <label for="photo" class="form-label">photo</label>
        <input type="file" name="photo" id="validation07" class="form-control" placeholder="photo">
      </div> -->
      <div class="">
      <button type="submit" class="btn btn-success" id="submit" name="submit">S'inscrire</button>
      <a style="float:right;" href="connexion.php" style="text-decoration:none;">connectez-vous?</a>
      </div>
     
  </form>






</div>
  <script src="js/inscription.js"></script> 
  <script>
    function verifEmail() {

      let myRegex1= /^[^ ]+@[^]+\.[a-z]{2,3}$/;
      let email = document.querySelector('.email')

      if (myRegex1.test(email.value) == false) {
    
              document.querySelector('.emailErreur').style.display = "block";
              setTimeout(()=>{
                  document.querySelector('.emailErreur').style.display = "none";
                  email.value=""

              },2000);
          } 
    }

    function verifPassword() {

    let password = document.querySelector('.password')
    let confirmation = document.querySelector('.confirmation')

    if (password.value != confirmation.value) {

            document.querySelector('.emailPassword').style.display = "block";
            setTimeout(()=>{
                document.querySelector('.emailPassword').style.display = "none";
                password.value="";
                confirmation.value=""
            },2000);
        } 
    }
  </script>
  
</body>

</html>