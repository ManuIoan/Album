<?php
 include_once "config.php";
 $output = "";
 $sql =  mysqli_query($conn, "SELECT * FROM general");
 

 $w = mysqli_real_escape_string($conn, $_POST['i']);




 if($w>100 && $w<700)
 {
 $nr = 4;
 $i = 4;
 }
 else
 if($w>=700 && $w<900)
 {
     $nr = 3;
     $i = 3;
 }
 else
 if($w>=900 && $w<1100)
 {
 
     $nr = 2;
     $i = 2;
 
 
 }
 else
 {
     $nr = 1;
     $i = 1;
 }
 







 
     

while($row = mysqli_fetch_assoc($sql))
{

     
     $output .= '<div class="four">';
     $ui = $row['unique_id'];
    $sql2 = mysqli_query($conn, "SELECT * FROM codes WHERE unique_id = $ui");
    $row2 = mysqli_fetch_assoc($sql2);

     $output .= '
     
     <div class="carte">
        <div class="poza">
            <img src="images/'. $row['img'] .'" alt="">
        </div>
       
        <div class="tit">
        <a href ="prez.php?user_id='.$row['unique_id'].'">
         <p>'. $row['lname']." ". $row["fname"] .'</p>
         </a>
        </div>

        <div class="trei">

            
            <div class="facultate">
                <img src="lg1.jpg" alt="" class="fac">
                <div class="scris">
                    <p>Facultate</p>
                    <h4>'.$row2['n_studii'].'</h4>
                </div>
                
            </div>
            
            <div class="facultate">
                <img src="year.jpg" alt="" class="fac">
                <div class="scris">
                    <p>An</p>
                    <h4>'.$row2['an'].'</h4>
                </div>
                
            </div>
             
            <div class="facultate">
                <img src="grd.jpg" alt="" class="fac">
                 <div class="scris">
                    <p>Medie</p>
                    <h4>'.$row2['medie'].'</h4>
                 </div>
                
             </div>



        </div>

     </div>

     
     
     ';

     while($nr%4!=0 && $row = mysqli_fetch_assoc($sql))
     {
    $nr = $nr + 1;
    $ui = $row['unique_id'];
    $sql2 = mysqli_query($conn, "SELECT * FROM codes WHERE unique_id = $ui");
    $row2 = mysqli_fetch_assoc($sql2);

     $output .= '
     
     <div class="carte">
        <div class="poza">
            <img src="images/'. $row['img'] .'" alt="">
        </div>
       
        <div class="tit">
        <a href ="prez.php?user_id='.$row['unique_id'].'">
        <p>'. $row['lname']." ". $row["fname"] .'</p>
        </a>
        </div>

        <div class="trei">

            
            <div class="facultate">
                <img src="lg1.jpg" alt="" class="fac">
                <div class="scris">
                    <p>Facultate</p>
                    <h4>'.$row2['n_studii'].'</h4>
                </div>
                
            </div>
            
            <div class="facultate">
                <img src="year.jpg" alt="" class="fac">
                <div class="scris">
                    <p>An</p>
                    <h4>'.$row2['an'].'</h4>
                </div>
                
            </div>
             
            <div class="facultate">
                <img src="grd.jpg" alt="" class="fac">
                 <div class="scris">
                    <p>Medie</p>
                    <h4>'.$row2['medie'].'</h4>
                 </div>
                
             </div>



        </div>

     </div>

     
     
     ';

     }
     $nr=$i;
     $output .= '</div>';



}





 echo $output;



?>