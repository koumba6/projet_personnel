<?php

 class WebUSER 
{
var $db;
public function __construct()
{
        
    try
    {

        $this->db= new PDO('mysql:host=127.0.0.1;dbname=dev_web;','root','');
    }catch(Exception $e)
    {
        die("Connection erreur du à ".$e->getMessage());
    }
        
} 

function generateMatricule($n=3) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
  $randomString = '';

  for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
  }

  return 'MAE'.$randomString;
}

   public function connexion($email,$motdepasse){
    
    
    try{
      session_start();

        $sql=$this->db->prepare('SELECT * FROM user_web WHERE  email=:email');
        $sql->bindParam(":email",$email);
        $sql->execute();

        $donnee=$sql->fetch(PDO::FETCH_ASSOC);

         
        //while($donnee = $sql->fetch()){ 

        
             if ($donnee["etat"] == 1){
              //var_dump($donnee);die;
              if(password_verify($motdepasse, $donnee["motdepasse"]) ){
                //var_dump($donnee['motdepasse']);die;
                if($donnee["roles"] == "admin"){
                  $_SESSION['photo']= $donnee["photo"];
                  $_SESSION['matricule']= $donnee["matricule"];
                  $_SESSION['prenom']= $donnee["prenom"];
                  $_SESSION['nom']= $donnee["nom"];
                  
                  header('location:admin.php');

                }elseif($donnee["roles"] == "user"){
                  
                  $_SESSION['photo']= $donnee["photo"];
                  $_SESSION['matricule']= $donnee["matricule"];
                  $_SESSION['prenom']= $donnee["prenom"];
                  $_SESSION['nom']= $donnee["nom"];
                  header('location:user.php');
                }
              }
            }
              
            }catch(\Throwable $th) {
        echo $th->getMessage();
        $sql->closeCursor();
       }

   
  
     
          }

  public function inscription($nom,$prenom,$matricule,$email,$roles,$photo,$motdepasse){
  $dates = date('Y-m-d'); 
  $etat = 1; 

    try{
        $sql=$this->db->prepare('INSERT INTO user_web ( nom, prenom, matricule, email, roles, photo, motdepasse)
                               VALUES (:nom, :prenom, :matricule, :email, :roles,:photo, :motdepasse )');
                             

        $checkMail=$this->db->prepare('SELECT email from user_web where email=:email');
        $checkMail->bindParam(":email",$email);
   

        $checkMail->execute(array('email'=>$email));

        $row = $checkMail->fetch(PDO::FETCH_ASSOC);
      /*   var_dump($row);die; */
        

        if(!$row) {
          $sql->execute(array(
            'nom'=> $nom,
            'prenom'=>$prenom,
            'matricule' =>$matricule, 
             'email'=>$email,
             'roles'=>$roles,
             'photo'=>$photo,
             'motdepasse'=>$motdepasse,
            
 
 
         ));
                echo  '<span id="ok" class="d-flex justify-content-center  text-success m-3 ">REUSSI</span> ';
                 echo ' <script>
           setTimeout(()=>{document.getElementById("ok").remove()},2000);
       </script>    ';

        }else{
           echo  '<span id="erreur" class="d-flex justify-content-center  text-danger m-3 ">ce mail existe deja</span> ';
          
             echo ' <script>
                  setTimeout(()=>{document.getElementById("erreur").remove()},2000);
              </script>    ';
        }

        
        
/*         return $sql;
 */    }catch(\Throwable $th) {
      echo $th->getMessage();
      $sql->closeCursor();
    }
  }
  
  public function archiveUser($id){
    try{
        $sql=$this->db->prepare('UPDATE user_web SET etat=0 WHERE id=:id');
        $sql->execute(['id'=>$id]);
        header('location:admin.php');

         return $sql();
    } catch(\Throwable $th) {

    }
}
 
 public function desarchiveUser($id){
    try{
        $sql=$this->db->prepare('UPDATE user_web SET etat=1 WHERE id=:id');
        $sql->execute(['id'=>$id]);

        return $sql();
    }catch(\Throwable $th){

    }

} 
 public function modification($prenom,$nom,$email,$id){
 
  try{
       $sql_m=$this->db->prepare("UPDATE user_web SET prenom=:prenom,nom=:nom,email=:email WHERE id= $id");
       $sql_m->execute(['prenom'=>$prenom,'nom'=>$nom,'email'=>$email]);
       header('location:admin.php');


      return $sql_m();
     }catch(\Throwable $th){

     }
  
  
   }

    public function switcher($roles,$id){

    try{
      if($roles=='admin'){
      $sql=$this->db->prepare("UPDATE user_web SET roles = 'user'  WHERE id= $id");
      $sql->execute(); 
       header('location:admin.php');
       return $sql(); 
      }
      if($roles=='user'){
        $sql=$this->db->prepare("UPDATE user_web SET roles = 'admin'  WHERE id= $id");
        $sql->execute(); 
         header('location:admin.php');
         return $sql(); 
        } 
    }catch(\Throwable $th){

    }
   } 
  }
?>