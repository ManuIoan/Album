
<?php
 include_once "header.php";

?>


<body>
    <div class="uio">
    <div class="detail">
        <?php
        include_once "config.php";

         $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
       
        $sql =mysqli_query($conn, "SELECT * FROM general WHERE unique_id = '{$user_id}'");
             if(mysqli_num_rows($sql) > 0)
             {
                 $row = mysqli_fetch_assoc($sql);
             }
        ?>
        <img src="../images/<?php echo $row['img'];?>" alt="">
        <span><?php echo $row['fname']. " ". $row['lname']; ?></span>
        <div class="nota">
            <p>Nota pe care o dau scolii este:</p>
            <p class="macs">
                <?php echo $row['nots'] ?>
            </p>
        </div>
        <div class="parere">
            <p>
                Impresiile mele sunt urmatoarele:
            </p>
            <h5>
             <?php echo $row['impressions'] ?>
            </h5>
        </div>
    </div>
    </div>

<!--Vezi ca ar trebui sa umbli la imagine si felul in care apare-->

</body>