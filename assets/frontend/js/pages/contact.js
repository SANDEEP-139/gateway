    
        
          $(document).ready(function () {
              $("#Plus").click(function () {
                  {
                      $(".contact").show("slow");
                      $("#Plus").css("display", "none");
                      $("#Minus").css("display", "block");
                  }
                  $("#Minus").click(function () {
                      {
                          $(".contact").hide("slow");
                          $("#Plus").css("display", "block");
                          $("#Minus").css("display", "none");


                      }
                  });
              });
          });
       