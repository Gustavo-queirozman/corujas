var btnLogin = document.getElementById('btnLogin');
var inputEmail = document.getElementById('inputEmail');
var inputPassword = document.getElementById('inputPassword');


btnLogin.addEventListener('click', function () {
  firebase.auth().signInWithEmailAndPassword(inputEmail.value, inputPassword.value)
  .then((user) => {
    // Signed in
    // ...
    if (email) {// estiver cadastrado na base de dados x 
      window.location.href = "../public/TrabalhadorDashboard.html";
    }
    if (email){//estiver cadastrado na base de dados y
      window.location.href = "../public/Dashboard.html"
    }
  })
  .catch((error) => {
    var errorCode = error.code;
    var errorMessage = error.message;
    window.alert("Usuário ou senha inválida")
  });
});



