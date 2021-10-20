<?php

include_once "config.php";
$nume = mysqli_real_escape_string($conn, $_POST['y']);
$an = mysqli_real_escape_string($conn, $_POST['z']);
$lm = mysqli_real_escape_string($conn, $_POST['w']);

$w = mysqli_real_escape_string($conn, $_POST['i']);


 
// use of explode

$output = "";

// $sql = mysqli_query($conn, "SELECT * from codes WHERE ");
$sql2 = mysqli_query($conn, "SELECT * from general");


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
if($w>=900 && $w<1200)
{

    $nr = 2;
    $i = 2;


}
else
{
    $nr = 1;
    $i = 1;
}




if($nume !='Toti')
{


    $alb ="";
    while($row = mysqli_fetch_assoc($sql2))
    {  $scr = "";
       $scr = $row['lname']." ".$row['fname'];
       $scr2 = $row['fname']." ".$row['lname'];
       
       if ($scr == $nume || $scr2== $nume )
       {  
         $aps = $row['unique_id'];
         $sql =  mysqli_query($conn, "SELECT * FROM general where unique_id = $aps ");
         
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

     
     </div>
     ';
       }
    }
 echo $output;

}
else
if($an != 'Toti')
{ 
    if($lm!= 'Licenta' && $lm != 'Master')
    {
    $output = "";
    $sql3= mysqli_query($conn, "SELECT * from codes WHERE an = $an");
    
    while($sql = mysqli_fetch_assoc($sql3))
    {
        
     
     $output .= '<div class="four">';
     $ui = $sql['unique_id'];
    $row = mysqli_query($conn, "SELECT * FROM general WHERE unique_id = $ui");
    $row2 = mysqli_fetch_assoc($row);

     $output .= '
     
     <div class="carte">
        <div class="poza">
            <img src="images/'. $row2['img'] .'" alt="">
        </div>
       
        <div class="tit">
        <a href ="prez.php?user_id='.$row2['unique_id'].'">
         <p>'. $row2['lname']." ". $row2["fname"] .'</p>
         </a>
        </div>

        <div class="trei">

            
            <div class="facultate">
                <img src="lg1.jpg" alt="" class="fac">
                <div class="scris">
                    <p>Facultate</p>
                    <h4>'.$sql['n_studii'].'</h4>
                </div>
                
            </div>
            
            <div class="facultate">
                <img src="year.jpg" alt="" class="fac">
                <div class="scris">
                    <p>An</p>
                    <h4>'.$sql['an'].'</h4>
                </div>
                
            </div>
             
            <div class="facultate">
                <img src="grd.jpg" alt="" class="fac">
                 <div class="scris">
                    <p>Medie</p>
                    <h4>'.$sql['medie'].'</h4>
                 </div>
                
             </div>



        </div>

     </div>

     
     
     ';
 
     while($nr%4!=0 && $sql = mysqli_fetch_assoc($sql3))
     {
    $nr = $nr + 1;
    $ui = $sql['unique_id'];
    $row = mysqli_query($conn, "SELECT * FROM general WHERE unique_id = $ui");
    $row2 = mysqli_fetch_assoc($row);

     $output .= '
     
     <div class="carte">
        <div class="poza">
            <img src="images/'. $row2['img'] .'" alt="">
        </div>
       
        <div class="tit">
        <a href ="prez.php?user_id='.$row2['unique_id'].'">
         <p>'. $row2['lname']." ". $row2["fname"] .'</p>
         </a>
        </div>

        <div class="trei">

            
            <div class="facultate">
                <img src="lg1.jpg" alt="" class="fac">
                <div class="scris">
                    <p>Facultate</p>
                    <h4>'.$sql['n_studii'].'</h4>
                </div>
                
            </div>
            
            <div class="facultate">
                <img src="year.jpg" alt="" class="fac">
                <div class="scris">
                    <p>An</p>
                    <h4>'.$sql['an'].'</h4>
                </div>
                
            </div>
             
            <div class="facultate">
                <img src="grd.jpg" alt="" class="fac">
                 <div class="scris">
                    <p>Medie</p>
                    <h4>'.$sql['medie'].'</h4>
                 </div>
                
             </div>



        </div>

     </div>

     
     
     ';
     }
     $nr= $i;
     $output .= '</div>';








    }

    echo $output;
}

else
{

   
    $output = "";
    $sql3= mysqli_query($conn, "SELECT * from codes WHERE an = '{$an}' AND n_studii='{$lm}' ");
    
    while($sql = mysqli_fetch_assoc($sql3))
    {
        
     
     $output .= '<div class="four">';
     $ui = $sql['unique_id'];
    $row = mysqli_query($conn, "SELECT * FROM general WHERE unique_id = $ui");
    $row2 = mysqli_fetch_assoc($row);

     $output .= '
     
     <div class="carte">
        <div class="poza">
            <img src="images/'. $row2['img'] .'" alt="">
        </div>
       
        <div class="tit">
        <a href ="prez.php?user_id='.$row2['unique_id'].'">
         <p>'. $row2['lname']." ". $row2["fname"] .'</p>
         </a>
        </div>

        <div class="trei">

            
            <div class="facultate">
                <img src="lg1.jpg" alt="" class="fac">
                <div class="scris">
                    <p>Facultate</p>
                    <h4>'.$sql['n_studii'].'</h4>
                </div>
                
            </div>
            
            <div class="facultate">
                <img src="year.jpg" alt="" class="fac">
                <div class="scris">
                    <p>An</p>
                    <h4>'.$sql['an'].'</h4>
                </div>
                
            </div>
             
            <div class="facultate">
                <img src="grd.jpg" alt="" class="fac">
                 <div class="scris">
                    <p>Medie</p>
                    <h4>'.$sql['medie'].'</h4>
                 </div>
                
             </div>



        </div>

     </div>

     
     
     ';

     while($nr%4!=0 && $sql = mysqli_fetch_assoc($sql3))
     {
    $nr = $nr + 1;
    $ui = $sql['unique_id'];
    $row = mysqli_query($conn, "SELECT * FROM general WHERE unique_id = $ui");
    $row2 = mysqli_fetch_assoc($row);

     $output .= '
     
     <div class="carte">
        <div class="poza">
            <img src="images/'. $row2['img'] .'" alt="">
        </div>
       
        <div class="tit">
        <a href ="prez.php?user_id='.$row2['unique_id'].'">
         <p>'. $row2['lname']." ". $row2["fname"] .'</p>
         </a>
        </div>

        <div class="trei">

            
            <div class="facultate">
                <img src="lg1.jpg" alt="" class="fac">
                <div class="scris">
                    <p>Facultate</p>
                    <h4>'.$sql['n_studii'].'</h4>
                </div>
                
            </div>
            
            <div class="facultate">
                <img src="year.jpg" alt="" class="fac">
                <div class="scris">
                    <p>An</p>
                    <h4>'.$sql['an'].'</h4>
                </div>
                
            </div>
             
            <div class="facultate">
                <img src="grd.jpg" alt="" class="fac">
                 <div class="scris">
                    <p>Medie</p>
                    <h4>'.$sql['medie'].'</h4>
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




}
}
else
if($lm != 'Licenta/Master')
{   
    $output = "";
    $sql3= mysqli_query($conn, "SELECT * from codes WHERE n_studii = '{$lm}' AND active = 1");
    
    while($sql = mysqli_fetch_assoc($sql3))
    {
        
     
     $output .= '<div class="four">';
     $ui = $sql['unique_id'];
    $row = mysqli_query($conn, "SELECT * FROM general WHERE unique_id = $ui");
    $row2 = mysqli_fetch_assoc($row);

     $output .= '
     
     <div class="carte">
        <div class="poza">
            <img src="images/'. $row2['img'] .'" alt="">
        </div>
       
        <div class="tit">
        <a href ="prez.php?user_id='.$row2['unique_id'].'">
         <p>'. $row2['lname']." ". $row2["fname"] .'</p>
         </a>
        </div>

        <div class="trei">

            
            <div class="facultate">
                <img src="lg1.jpg" alt="" class="fac">
                <div class="scris">
                    <p>Facultate</p>
                    <h4>'.$sql['n_studii'].'</h4>
                </div>
                
            </div>
            
            <div class="facultate">
                <img src="year.jpg" alt="" class="fac">
                <div class="scris">
                    <p>An</p>
                    <h4>'.$sql['an'].'</h4>
                </div>
                
            </div>
             
            <div class="facultate">
                <img src="grd.jpg" alt="" class="fac">
                 <div class="scris">
                    <p>Medie</p>
                    <h4>'.$sql['medie'].'</h4>
                 </div>
                
             </div>



        </div>

     </div>

     
     
     ';

     while($nr%4!=0 && $sql = mysqli_fetch_assoc($sql3))
     {
    $nr = $nr + 1;
    $ui = $sql['unique_id'];
    $row = mysqli_query($conn, "SELECT * FROM general WHERE unique_id = $ui");
    $row2 = mysqli_fetch_assoc($row);

     $output .= '
     
     <div class="carte">
        <div class="poza">
            <img src="images/'. $row2['img'] .'" alt="">
        </div>
       
        <div class="tit">
        <a href ="prez.php?user_id='.$row2['unique_id'].'">
         <p>'. $row2['lname']." ". $row2["fname"] .'</p>
         </a>
        </div>

        <div class="trei">

            
            <div class="facultate">
                <img src="lg1.jpg" alt="" class="fac">
                <div class="scris">
                    <p>Facultate</p>
                    <h4>'.$sql['n_studii'].'</h4>
                </div>
                
            </div>
            
            <div class="facultate">
                <img src="year.jpg" alt="" class="fac">
                <div class="scris">
                    <p>An</p>
                    <h4>'.$sql['an'].'</h4>
                </div>
                
            </div>
             
            <div class="facultate">
                <img src="grd.jpg" alt="" class="fac">
                 <div class="scris">
                    <p>Medie</p>
                    <h4>'.$sql['medie'].'</h4>
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


}
else
 echo "mast";


 
 ?>