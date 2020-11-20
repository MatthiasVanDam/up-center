<?php include('includes/header.php')?>
<?php include('includes/content-top.php')?>
<section id="occasies">
    <div class="container">
        <div class="row">
            <h1 class="mx-auto text-uppercase">Occasies</h1>
        </div>
        <div class="row">

        <?php 
        include_once('includes/db-inc.php');

        $sql="SELECT * FROM autos";
        $stmt=mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed";
        }else{
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            while($row=mysqli_fetch_assoc($result)){
                echo'
                
            <div class="col-xs-12 col-lg-6">
                <div class="card p-3">
                    <!-- Card Titel -->
                    
                    <div class="card-titel text-center">
                        <h4>'.$row["autonaam"]." ".$row["motor"].'</h4>
                    </div>
                    
                    <!-- Card Info -->
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="card-img-top mb-2">
                                <img class="img-fluid" src="img/thumbnail/'.$row["thumbnail"].'"
                                />
                            </div>
                        </div>
            
                        <div class="col-xs-12 col-md-4">
                            <div class="card-info">
                                <ul>
                                    <li><i class="far fa-tag"></i> '.$row["prijs"].'</li>
                                    <li><i class="far fa-calendar"></i> '.$row["bouwjaar"].'</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <div class="card-info">
                                <ul>
                                    <li><i class="far fa-road"></i> '.$row["kmstand"].'<span> Km</span></li>
                                    <li><i class="far fa-gas-pump"></i> '.$row["brandstof"].'</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-5 text-center m-3">
                            <a href="car-edit.php?id='.$row["id"].'" class="btn btn-primary rounded-0  text-light">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-5 text-center m-3">
                        <a href="includes/delete-car.inc.php?id='.$row["id"].'" class="btn btn-danger rounded-0 text-light">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                    </div>
                </div>
            </div>

                ';
            }
        }


        ?>

            
        </div>

    </div>
</section>
<?php include('includes/footer.php')?>

