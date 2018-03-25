
$(document).ready(function() {

    var span = document.createElement("span");
    span.setAttribute("id","span");
    var spanp = document.createElement("span");
    spanp.setAttribute("id","spanp");
    var spane = document.createElement("span");
    spane.setAttribute("id","spane")

    $("#username").focus(function()  {
        
    span.innerHTML = "The username field must contain only alphabetical or numeric characters.";   
    $("#span").attr("class","info");
    });

    $("#username").blur(function()  {
        
        if($("#username").val()=="")
        {
            $(span).hide();  
        }
    else{
        var username = $("#username").val();
         if (validateUname(username)) {
            $("#span").text("OK").attr("class", "ok").show();
            return true;
        }
        else
        {
           $("#span").text("ERROR: username should be alphanumeric only").attr("class", "error").show();
        return false;
        }
    }
function validateUname(username){
    var usn = /^[a-zA-Z0-9]*$/;
    if(usn.test(username))
    {return true;}
    else
    {return false;}
}
                           
    });

    $("#password").focus(function()  {
        $("#spanp").text("The password field should be at least 8 characters long").attr("class", "info");
     });

    $("#password").blur(function(){
        if($("#password").val()==""){
            $(spanp).hide();
        }
        else{
            var pass = $("#password").val();
        if(pass.length<=8)
        {
            $("#spanp").text("ERROR: The password field should be at least 8 characters long").attr("class", "error").show();
        }
        else
        {
            $("#spanp").text("OK").attr("class", "ok").show();
        }
    }
    });

    $("#email").focus(function()  {
    $("#spane").text("The email field should be a valid email address.").attr("class", "info")
    });

    $("#email").blur(function()  {
        if($("#email").val()=="")
        {
            $(spane).hide();  
        }
    else{
        var email = $("#email").val();
         if (validateEmail(email)) {
            $("#spane").text("OK").attr("class", "ok").show();
                return true;
        }
        else
        {
            $("#spane").text("ERROR: The email field should be a valid email address").attr("class", "error").show();
        return false;
        }
    }
    function validateEmail(email){
    var eml = /^([A-Za-z0-9-/_]+)(@)([A-Za-z0-9-.]+)/;
    if(eml.test(email))
    {return true;}
    else
    {return false;}
    }
    });

    $("#username").after(span);
    $("#password").after(spanp);
    $("#email").after(spane);
});