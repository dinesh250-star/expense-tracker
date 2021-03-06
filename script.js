$(document).ready(
    
function(){
    console.log("Script hit");
    //this is used to get the html id of that tag, so that we can use its value and all 
    var registration_successful = document.getElementById("showRegistraion");
    registration_successful.style.display = "none";

    var Login_successful = document.getElementById("showLogin");
    Login_successful.style.display = "none";

    
    $("#Login-boxR").click(function(){
  
        var fnameR = $('#fnameR').val();
        var lnameR = $('#lnameR').val();
        var emailR = $('#emailR').val();
        var passwordR = $('#passwordR').val();
console.log("fnameR "+fnameR);
          if(emailR ==""){
		  alert("Empty fields");
	  }
	    else{
    
        $.ajax({
            type: 'POST',
            url: 'register0.php',
         
            data: { fnameR : fnameR , lnameR : lnameR , emailR : emailR , passwordR : passwordR },
            success: function(response) {
           
                  console.log('success ajax' + response);   
                //PARSE THEE, SO THAT WE CAN ACESS ITS FILEDS
                  var data= JSON.parse(response);
                  
                  if (data.ispresent == "1" )
                  {
                    alert("Email present");
              } 
                  
              else
                  {
                  registration_successful.style.display = "block";
                  //THIS IS JAVASCRIPT FUNCTION, 
                  setTimeout(function() {
                    $(registration_successful).fadeOut('fast');
                     document.getElementById('fnameR').value = "";
                     document.getElementById('lnameR').value = "";
                     document.getElementById('emailR').value = "";
                     document.getElementById('passwordR').value = "";
                }, 1000);
            }  
                }
         });
	    } 
    })


    $("#Login-boxL").click(function(){
        var emailL = $('#emailL').val();
        var passwordL = $('#passwordL').val();

        $.ajax({
            type: 'POST',
            url: 'login0.php',
            data: { emailL : emailL , passwordL : passwordL },
            success: function(response) {
               var data= JSON.parse(response);
                  console.log(data);
                 
                     if (data.isLogin == "1" )
                        {
                         alert("Login Successfull");
   
                         window.location.href = "http://127.0.0.1:3000/secpage.html";
                        }
                        
                    else
                        {
             
                            Login_successful.style.display = "block";
                            setTimeout(function() {
                              $(Login_successful).fadeOut('fast');
                          }, 2000);

                        }
                       }
         });
    
    })


});
