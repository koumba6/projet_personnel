(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    // Array.prototype.slice.call(forms)
    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated');
        }, false)
        })
    })()

    
   
//  let Mylogin =document.getElementById('Mylogin');


// Mylogin.addEventListener('submit', function(e){

// let myinput = document.getElementById('validation01'); 

// let myRegex1= /^[^ ]+@[^]+\.[a-z]{2,3}$/;

// if (myinput.value.trim() == ""){
//     let error = document.getElementById('error');
//     error.innerHTML = " champ vide";
//     error.style.color = 'red';
      

// }

// let myinput1 = document.getElementById('validation02');   


// if (myinput1.value.trim() == ""){
//     let error1 = document.getElementById('error1');
//     error1.innerHTML = " champ vide";
//     error1.style.color = 'red';
    
 
// }

// let myinput2 = document.getElementById('validation03');   


// if (myinput2.value.trim() == ""){
    
//     let error2 = document.getElementById('error2');
//     error2.innerHTML = " champ vide";
//     error2.style.color = 'red';

  
// }

// else if (!myRegex1.test(myinput2.value)) {
//     let error2 = document.getElementById('error2');
//     error2.innerHTML = "email incorrecte";
//     error2.style.color = 'red';
     
// } 

// let myinput3 = document.getElementById('validation05');   


// if (myinput3.value== ""){
//     let error3 = document.getElementById('error3');
//     error3.innerHTML = " champ vide";
//     error3.style.color = 'red';
       

// }

// let myinput4 = document.getElementById('validation06');   


// if (myinput4.value== "" ){
    
//     let error4 = document.getElementById('error4');
    
//     error4.innerHTML = " champ vide";
//     error4.style.color = 'red';
    
//     }  if ( ( myinput3.value == myinput4.value) && (myinput3.value != "")){
//         error4.innerHTML = " correcte";
//         error4.style.color = 'green';
//         coumba.preventDefault(); 
             
//     }  if ( ( myinput3.value != myinput4.value) && (myinput3.value != "")) {
//         let error4 = document.getElementById('error4');
//         error4.innerHTML = "Le mot de passe ne correspond pas"
//         error4.style.color = 'red';
       
//     }
   
//     let myinput0 = document.getElementById('validation04');

//     if (myinput0.value.trim() == ""){
//        error0.innerHTML = "champ vide";
//        error0.style.color = 'red';
      
//     }
 
//  } 
// ); 


 