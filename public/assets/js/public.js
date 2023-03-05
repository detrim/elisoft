
function cek(){
    let password = document.getElementById("password").value;
    let confirmpassword = document.getElementById("confirm-password").value;
    console.log(password,confirmpassword);
    let message = document.getElementById("message");

    if (confirmpassword.length != 0) {
        if (password == confirmpassword) {
            message.textContent = "Password match";
            message.style.color =  "#3ae374";

        } else {
            message.textContent = "Confirm password does match";
            message.style.color =  "#ff4d4d";
        }
    } else{
        message.textContent = "Please enter Confirm password!";
        message.style.color =  "#ff4d4d";
    }
}
function cekbtn(){
    let password = document.getElementById("password").value;
    let confirmpassword = document.getElementById("confirm-password").value;
    console.log(password,confirmpassword);
    let message = document.getElementById("message");

    if (confirmpassword.length != 0) {
        if (password == confirmpassword) {
            message.textContent = "Password match";
            message.style.color =  "#3ae374";

        } else {
            message.style.color =  "#ff4d4d";
            alert('Confirm password does match');
        }
    } else{
        alert('Please enter Confirm password!');
        message.style.color =  "#ff4d4d";
    }
}
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

