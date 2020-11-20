<?php include('includes/header.php')?>
<?php include('includes/content-top.php')?>

<!-- Occasies -->
<section class="" id="occasies">
    <div class="container">
        <div>
            <h1 class="section-heading text-center text-uppercase">Occasies</h1>
        </div>
        <div class="row pt-5">

        <?php 
        include_once'admin/includes/db-inc.php';

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
                <div class="card p-2 px-4 shadow">
                    <!-- Card Titel -->
                    
                    <div class="text-center mb-3">
                        <h4>'.$row["autonaam"]." ".$row["motor"].'</h4>
                    </div>
                    
                    <!-- Card Info -->
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-6">
                            <div class="card-img-top mb-2">
                                <img class="img-fluid" src="admin/img/thumbnail/'.$row["thumbnail"].'"/>
                            </div>
                        </div>
            
                        <div class="col-xs-12 col-md-6 d-flex justify-content-center align-items-center">
                            
                                <ul>
                                    <li><i class="fas fa-tag"></i> € '.$row["prijs"].'</li>
                                    <li><i class="far fa-calendar"></i> '.$row["bouwjaar"].'</li>
                                    <li><i class="fas fa-road"></i> '.$row["kmstand"].'<span> Km</span></li>
                                    <li><i class="fas fa-gas-pump"></i> '.$row["brandstof"].'</li>
                                </ul>
                            
                        </div>

                        <div class="col-12 text-center mx-auto m-2">
                            <a class="btn btn-lg btn-primary">
                                Meer Weten?
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

