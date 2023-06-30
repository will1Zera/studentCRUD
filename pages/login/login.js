
function removeErrorMessage(){
    var emailValue = document.getElementById('email');
    var passwordValue = document.getElementById('password');

    localStorage.setItem('email', emailValue.value);
    localStorage.setItem('password', passwordValue.value);
    
    document.getElementById('error_message').style.display = 'none';
}