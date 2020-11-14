function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#password-confirmation").val();
    if (password != confirmPassword){
      $("#CheckPasswordMatch").html("Contraseñas no coinciden");
      $("#CheckPasswordMatch").css({'color':'red'});
      $('#submitPass').attr("disabled", true);
    }
    else{
      $("#CheckPasswordMatch").html("Contraseñas coinciden");
      $("#CheckPasswordMatch").css({'color':'green'});
      $('#submitPass').attr("disabled", false);

    }
       
}
$(document).ready(function () {
   $("#password-confirmation").keyup(checkPasswordMatch);
});