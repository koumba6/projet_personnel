let myform = document.getElementById('myform');

myform.addEventListener('submit', function(e) {
let samainput = document.getElementById('email');

let myRegex= /^[^ ]+@[^]+\.[a-z]{2,3}$/;




if (samainput.value.trim() == ""){
    let myError = document.getElementById('myError');
    myError.innerHTML = " champ vide";
    myError.style.color = 'red';
    e.preventDefault(); 
} else if (myRegex.test(samainput.value) == false) {
    let myError = document.getElementById('myError');
    myError.innerHTML = "email incorrecte";
    myError.style.color = 'red';
    e.preventDefault(); 
}

} 

);