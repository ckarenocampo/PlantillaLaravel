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
function checkPasswordMax() {
  var password = $("#password").val(); 

  if (password.length < 6){
    $("#RevPassword").html("La contraseña debe contener al menos 6 caracteres");
    $("#RevPassword").css({'color':'red'});
    $('#submitPass').attr("disabled", true);
  }
  else{
    $("#RevPassword").html("");
    //$('#submitPass').attr("disabled", false);
  }      
}

$(document).ready(function () {
   $("#password-confirmation").keyup(checkPasswordMatch);
   $("#password").keyup(checkPasswordMax);
});