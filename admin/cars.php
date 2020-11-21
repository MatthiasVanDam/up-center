<?php include('includes/header.php') ?>
<?php include('includes/content-top.php') ?>
<section id="occasies">
    <div class="container">
        <div class="row">
            <h1 class="mx-auto text-uppercase">Occasies</h1>
        </div>
        <div class="row">

            <?php
            include_once('includes/db-inc.php');

            $sql = "SELECT * FROM autos";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                
                        <div class="col-sm-12 col-md-6">
                            <div class="card p-4 shadow">
                                <!-- Card Titel -->

                                <div class="text-center mb-3">
                                <h4>' . $row["autonaam"] . " " . $row["motor"] . '</h4>
                                </div>

                                <!-- Card Info -->
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-md-12 col-xl-6">
                                        <div class="card-img-top">
                                            <img class="img-fluid" src="img/thumbnail/' . $row["thumbnail"] . '"/>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-xl-6 d-flex justify-content-center align-items-center">
                                        <ul>
                                            <li><i class="fas fa-tag"></i> € ' . $row["prijs"] . '</li>
                                            <li><i class="far fa-calendar"></i> ' . $row["bouwjaar"] . '</li>
                                            <li><i class="fas fa-road"></i> ' . $row["kmstand"] . '<span> Km</span></li>
                                            <li><i class="fas fa-gas-pump"></i> ' . $row["brandstof"] . '</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-6 text-center">
                                        <a href="car-edit.php?id=' . $row["id"] . '" class="btn btn-primary rounded-0  text-light">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>

                                    <div class="col-6 text-center">
                                        <a href="includes/delete-car.inc.php?id=' . $row["id"] . '" class="btn btn-danger rounded-0 text-light">
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
<?php include('includes/footer.php') ?>