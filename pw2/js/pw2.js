function validate(){
     var errorMsg = "<p class='error'> <ul class='error'><lh>Please fix the following error(s):</lh>";
     var username = document.getElementById("username").value;
     var password = document.getElementById("password").value;
     var phone = document.getElementById("phone").value;
     var valid = false;


     if(phone != "" && username != "" && password != "") {
        if(username.length < 6 ||  password.length < 6 || isNaN(phone)) {
          if(username.length < 6) {
              errorMsg += "<li>Username should be at least 6 characters</li>";
            }
          if(password.length < 6) {
              errorMsg += "<li>Password should be at least 6 characters</li>";
            }
          if(isNaN(phone))  {
            errorMsg += "<li>Phone number should only be number</li>";
          }
        }
        else {
          valid = true;
        }
     }
     else {
       if(username.length == "")  {
           errorMsg += "<li>Username is a required field</li>";
         }
       if(password.length == "" ) {
           errorMsg += "<li>Password is a required field</li>";
         }
       if(phone == "")  {
         errorMsg += "<li>Phone is a required field</li>";
       }
     }
     if(!valid) {
         errorMsg += "</ul></p>";
        
         document.getElementById("error").innerHTML = errorMsg;
     }
     else {
        document.getElementById("error").innerHTML = "Form has been successfully validated";
     }
    
return false;
   }