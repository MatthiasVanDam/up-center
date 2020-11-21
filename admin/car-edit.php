<?php include('includes/header.php') ?>
<?php include('includes/content-top.php') ?>

<?php if (empty($_GET['id'])) {
    header('location: cars.php');
} else {
    include('includes/db-inc.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM autos where id= $id";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "sql statement failed";
    } else {

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
        }
    }
}
?>


<div class="container">

    <!-- Outer Row -->
    <div class="row">

        <div class="col-4">
            <img class="img-fluid" src="img/thumbnail/<?php echo $row["thumbnail"] ?>" />


        </div>

        <div class="col-8">
            <form action="includes/edit-car.inc.php?id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-6">

                        <div class="form-group">
                            <label class="mb-1">Autonaam</label>
                            <input class="form-control" type="text" name="autonaam" placeholder="Autonaam" value="<?php echo $row['autonaam'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Motor</label>
                            <input class="form-control" type="text" name="motor" placeholder="Motor" value="<?php echo $row['motor'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Km Stand</label>
                            <input class="form-control" type="text" name="kmstand" placeholder="Kmstand" value="<?php echo $row['kmstand'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Bouwjaar</label>
                            <input class="form-control" type="text" name="bouwjaar" placeholder="Bouwjaar" value="<?php echo $row['bouwjaar'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Brandstof</label>
                            <input class="form-control" type="text" name="brandstof" placeholder="Brandstof" value="<?php echo $row['brandstof'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Transmissie</label>
                            <input class="form-control" type="text" name="transmissie" placeholder="Transmissie" value="<?php echo $row['transmissie'] ?>" />
                        </div>

                    </div>

                    <div class="col-6">

                        <div class="form-group">
                            <label class="mb-1">Verbruik</label>
                            <input class="form-control" type="text" name="verbruik" placeholder="Verbruik" value="<?php echo $row['verbruik'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Uitstoot</label>
                            <input class="form-control" type="text" name="uitstoot" placeholder="Uitstoot" value="<?php echo $row['uitstoot'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Vermogen PK</label>
                            <input class="form-control" type="text" name="pk" placeholder="Vermogen PK" value="<?php echo $row['vermogenPK'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Vermogen KW</label>
                            <input class="form-control" type="text" name="kw" placeholder="Vermogen KW" value="<?php echo $row['vermogenKW'] ?>" />
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Prijs</label>
                            <input class="form-control" type="text" name="prijs" placeholder="Prijs" value="<?php echo $row['prijs'] ?>" />
                        </div>

                        <div class="form-group mt-5">
                            <input type="file" name="thumbnail" />
                        </div>

                    </div>


                </div>

                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary" type="submit" name="car-submit">Toevoegen</button>
                </div>
            </form>
        </div>

    </div>



</div>



<?php include('includes/footer.php') ?>