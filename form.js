 $("form").submit(function(e) {
              
              var error = "";
            
              if ($("#name").val() == "") {
                  
                error += "The Name is required.<br>"
                
            }
              
              if ($("#email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#number").val() == "") {
                  
                  error += "Phone Number is required.<br>"
                  
              }
              
              if ($("#feedback").val() == "") {
                  
                  error += "The feedback field is required.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
            })