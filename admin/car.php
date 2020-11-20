<?php include('includes/header.php')?>
<?php include('includes/content-top.php')?>
<?php 
include('includes/db-inc.php');
if(empty($_GET['id'])){
    header ('location: index.php');
}
$carId = $_GET['id'];
$msg="";
$sql = "SELECT autos.id, autos.autonaam as autonaam, autos.motor, fotos.id as foto_id, fotos.fotonaam FROM autos left outer join fotos on autos.autonaam = fotos.auto_id where autos.id=$carId";
$stmt = mysqli_stmt_init($con);

if(!mysqli_stmt_prepare($stmt,$sql)){
    echo "sql statement failed";
}
else{

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    
}

?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card p-3">

                <!-- Card Titel -->
                <div class="card-titel text-center py-3">
                    <h3><?php echo $row['autonaam'] ?> <?php echo $row['motor'] ?></h3>
                </div>
                    
                <!-- Card Info -->
                <div class="row">
                    <?php 
                    mysqli_data_seek($result,0);
                    if(!empty($row['fotonaam'])){
                        while($row=mysqli_fetch_assoc($result)){
                            echo' 
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <img class="img-fluid" src="img/auto_fotos/'.$row["fotonaam"].'">
                                <div class="col-12">
                                    <div class="row">
                                        <a href="includes/delete-photo.inc.php?id='.$row["foto_id"].'" class="btn btn-danger rounded-0 text-light text-center mx-auto my-3">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                            ';
                        }
                    }else{
                        $msg = 'Geen fotos beschikbaar';
                    }


                    ?>

                    <p class="mx-auto text-center"><?php echo $msg ?></p>
                        
                </div>

            </div>
            <div class="row mt-5">
                <a href="photo-add.php" class="btn btn-primary rounded text-light mx-auto text-center"><i class="fas fa-plus">Foto Toevoegen</i></a>
            </div>
        </div>


    </div>

    </div>

</div>

<?php include('includes/footer.php')?>

