<?php require '../function/function.php';?>

<?php
if(isset($_POST['submit'])){
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$email = $_POST['email'];
$id = $_POST['id'];


    $requeste = new WebUSER();
     $requeste->modification($prenom,$nom,$email,$id);
    
}
     
   ?>  






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['id_em'],$_POST['prenom_em'],$_POST['nom_em'],$_POST['email_em'])){
 $id = $_POST['id_em'];
$prenom = $_POST['prenom_em'];
$nom = $_POST['nom_em'];
$email = $_POST['email_em'];



?>
<!-- <a href="admin.php"><i class="fa-solid fa-arrow-left-long d-flex">Retour</i></a> -->

<div class="container  justify-content-center " style="width: 30%;">
  <form  class="row g-1 d-flex  m-5 bg-white needs-validation" action="" method="POST" id="Mylogin" novalidate>
  
      <!-- <legend class="text-success d-flex justify-content-center">FORMULAIRE D'INSCRIPTION</legend>
 -->
      <span class="emailPassword" style="display: none; color:red">Password non identique</span>
      <input type="hidden" id="validation0" class="form-control" placeholder="nom" name="id" value="<?php echo $id;?>"required>
      <div class="mb-3 col-md-12">
        <label for="nom" class="form-label">nom</label>
        <input type="text" id="validation01" class="form-control" placeholder="nom" name="nom" value="<?php echo $nom;?>"required>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
        <span id="error"></span>
      </div>
      <div class="mb-3 col-md-12">
        <label for="prenom" class="form-label">prenom</label>
        <input type="text" id="validation02" class="form-control" placeholder="prenom" name="prenom" value="<?php echo $prenom;?>"required>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
        <span id="error1"></span>
      </div>
      <div class="mb-3 col-md-12">
        <label for="email" class="form-label">email</label>
        <input type="text" onchange="verifEmail()" id="validation03" class="form-control email" placeholder="email" name="email"value="<?php echo $email;?>" required>
        <div class="valid-feedback" id="validationServer01"></div>
        <div  class="invalid-feedback" id="validationServer01">Champ invalide</div>
        
        <span class="emailErreur" style="display: none; color:red">email incorrecte</span> <br>
<!-- 
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
      <div class="mb-3 col-md-3">
        <label for="photo" class="form-label">photo</label>
        <input type="file" name="photo" id="validation07" class="form-control" placeholder="photo">
      </div> -->
      <div class="">
      <button type="submit" class="btn btn-success" id="submit" name="submit">modifier</button>
      </div>
      <?php  }?>
  </form>
</div>
</body>
</html>