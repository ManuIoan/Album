<!-- ?
   session_start();
   
   if(!isset($_SESSION['unique_id']))
   {
       
      header("location: index.php");


   }
?> -->



<?php
include_once "header.php";

?>

<body>

<div class="f222">
<form action="formular.php" class="marie"   method="post" enctype="multipart/form-data">

<p>The form</p>

<input type="text" name="lname" placeholder="Last name" required class="moncher">
<input type="text" name="fname" placeholder="First Name" required class="moncher">
<input type="number" name="nota" placeholder="Grade for School" required class="moncher">
<input type="text" name="impressions" placeholder="Impressions"  class="anarhie">
<input type="file" name="image"  class="filis" >
<input type="submit" name = "submit2" class="sub">




</form>
</div>
</body>



<?php
session_start();
include_once "config.php";
 

if(isset($_POST['submit2']))
{ 
   
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$nota =  $_POST['nota'];
$impressions =$_POST['impressions'];
if(!empty($fname) && !empty($lname) && !empty($nota) && !empty($impressions))
{

   if($nota<1 || $nota>10)
   {
      echo "Nota trebuie sa fie 1-10";
   }
   else{





      if(isset($_FILES['image']))
      {
         $img_name = $_FILES['image']['name'];
      
         $tmp_name = $_FILES['image']['tmp_name'];
  
         $img_explode = explode('.', $img_name);
         $img_ext     = end($img_explode);
  
         $extensions = ['png', 'jpg', 'jpeg'];
         if(in_array($img_ext, $extensions) === true)
         {
             $time = time();
             $new_img_name = $time.$img_name;
             if(move_uploaded_file($tmp_name, "../images/".$new_img_name))
             {
              
               $status = "Active now";
               

               $sql2 = mysqli_query($conn, "INSERT INTO general ( lname, fname, nots, impressions, img, unique_id)
               VALUES ('{$lname}','{$fname}','{$nota}','{$impressions}','{$new_img_name}', '{$_SESSION['unique_id']}')");
               if($sql2)
               {  

                  $hab = $_SESSION['unique_id'];
                  $sql5 = mysqli_query($conn, "UPDATE codes SET active=1 WHERE unique_id = $hab");
                  header("location: prez.php?user_id=$hab");
                  // TREBUIE SCHIMBAT SI FAPTUL CA L AI ACTIVAT
               }
               else{
                   echo "Somth went wrong";
               }

             }
             else echo "Marihuana";





      


   }
   echo "Extenisa nu eb una";
      }
      else echo "Nu este setata imaginea"; 
   }

}
else
echo "Nu ai comnplettat tot";



}
?>



