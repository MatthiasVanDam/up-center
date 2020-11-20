<?php include('includes/header.php')?>
<?php include('includes/content-top.php')?>
<?php 
        include_once('includes/db-inc.php');

        $sql="SELECT * FROM autos";
        $stmt=mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed";
        }else{
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            
        }
        


?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <form action="includes/upload-photo.inc.php" method="post" enctype="multipart/form-data">

          <div class="form-group">
              <select name="autonaam" class="form-control">

                <?php 
                
                while($row=mysqli_fetch_assoc($result)){
                    echo '<option>'.$row['autonaam'].'</option>' ;
                }
                
                ?>
                
              </select>
          </div>



          <div class="form-group">
              <input  type="file" name="foto"/>
          </div>



          <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
              <button class="btn btn-primary" type="submit" name="photo-submit" >Toevoegen</button>
              <button class="btn btn-primary" type="submit" name="more-submit" >Meer Toevoegen</button>
          </div>
        </form>


      </div>

    </div>

  </div>

<?php include('includes/footer.php')?>