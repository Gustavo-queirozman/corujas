var btnCreate = document.getElementById('btnCreate_user');
var inputEmail = document.getElementById('inputEmail');
var inputPassword = document.getElementById('inputPassword');

btnCreate.addEventListener('click', function () {
  firebase.auth().createUserWithEmailAndPassword(inputEmail.value, inputPassword.value)
  .then((user) => {
    // Signed in
    // ...
    window.alert("lslk")
  })
  .catch((error) => {
    var errorCode = error.code;
    var errorMessage = error.message;
    window.alert("sdlkjjkjdjkdjk")
  });
});



