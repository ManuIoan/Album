<?php

include_once "header.php";


?>


<body>





<div class="mars">
  <form class="search" action="#" enctype="multipart/form-data">
      <div class="man" >
    
           <div class="nume">
              <label for="fname">Nume</label><br>
              <input type="text" name="nume" id="fname" value="Toti"><br><br>
        
            </div>

            <div class="an col">
                <label for="fname">Anul:</label><br>
                 <input type="text" name="an" id="fname" value="Toti"><br><br>
        
            </div>

             <div class="Studii col">
                 <label for="fname">Nume studii</label><br>
                <input type="text" name="lm" id="fname" value="Licenta/Master"><br><br>
        
              </div>
       </div>

      <div class="mere">
         <button type="button" id="si">Search</button>
         <!-- <input type="submit" value="Search" id="si" > -->
      </div>
    
  </form>

   <div class="found">
    Nu s a gasit
   </div>


   <div class="activare">
  <a href="cod.php"> Activate your profile here</a>
</div>

<!-- 
<script>
var x = document.querySelectorAll('#fname');

function myFunction(){
        var y=x[0].value;
        var z=x[1].value;
         var w=x[2].value;
         console.log(y, z, w);
        
    }


</script> -->

<div class="profiles">
  

</div>

  </div>
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script> 



<script src = "../javascript/stud.js"></script>
    
</body>
</html>