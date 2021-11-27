function hideOrShowpassword() {

    checkbox = document.getElementById('ver_pass');
    passField = document.getElementById('pass');

    if(checkbox.checked == true) {
        passField.type = "text";
    }else{
        passField.type = "password"
    }
}