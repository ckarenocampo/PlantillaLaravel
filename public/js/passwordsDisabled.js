function enabled() {
            
   

    // when unchecked or checked, run the function 
  
      if($this.checked){ 
        $('#password').attr("disabled", false);

        $('#password').attr("disabled", false);

        $('#password-confirmation').attr("disabled", false);

      }
      else { 
        $('#password').attr("disabled", true);

        $('#password').attr("disabled", true);

        $('#password-confirmation').attr("disabled", true);
      } 
    
};

$(function() {
    enabled();
    $("#checkPass").click(enable);
  });
