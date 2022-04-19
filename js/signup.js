
const email=document.getElementById("email");
const pass=document.getElementById("password");
const con=document.getElementById("confirmPassword");

function checkinputs(){

if(email.value == "" || pass.value == "" ||con.value==""){
    document.getElementById("btn-signup").disabled = true;
}
else{
    document.getElementById("btn-signup").disabled = false;
}
}

