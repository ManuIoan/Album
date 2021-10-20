<?php

include_once "header.php";

?>
<body>
 
<div class="scriere-cod">
    
   <p>Write here your code</p> 
    
   
    
        
    <form action="" class="cod" method="post">
      <input type="text" name="cod" placeholder="AICI" class="num1">
      <input type="submit" name="submit" class="num2">

    </form>
    
  
</div>

<?php
session_start();
include_once "config.php"; 

if($conn)
{
    if(isset($_POST['submit'])) {
      
        $cod = $_POST['cod'];
       
        
        $sql = mysqli_query($conn, "SELECT * FROM codes WHERE cod = '{$cod}' ");
        
        
        if(mysqli_num_rows($sql) > 0)
        {
          //intrebi daca statusul(daca a fost folosit deja) si apoi il redirectionezi la editare
          $row = mysqli_fetch_assoc($sql);
          if($row['active']==0)
          {   
               $_SESSION['unique_id'] = $row['unique_id'];
               header("location: formular.php");


               
          }
          else echo "Codul este deja activat";

        }
        else{
            echo "Nu se gaseste codul !";
        }
  
    }
    
    
}






?>

</body>