<?php include('includes/header.php')?>
<?php if(empty($_GET['id'])){
    header('location: cars.php');
}else{
    include('includes/db-inc.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM autos where id=$id";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "sql statement failed";
    }else{

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
        }
    }
}
 ?>
<?php include('includes/content-top.php')?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <form action="includes/edit-car.inc.php?id="<?php echo $row['id'] ?> method="post" enctype="multipart/form-data">

          <div class="form-group">
              <input class="form-control py-4" type="text" name="autonaam" placeholder="Autonaam" value="<?php echo $row['autonaam'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="motor" placeholder="Motor" value="<?php echo $row['motor'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="kmstand" placeholder="Kmstand" value="<?php echo $row['kmstand'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="bouwjaar" placeholder="Bouwjaar" value="<?php echo $row['bouwjaar'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="brandstof" placeholder="Brandstof" value="<?php echo $row['brandstof'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="transmissie" placeholder="Transmissie" value="<?php echo $row['transmissie'] ?>"/>
          </div>
          
          <div class="form-group">
              <input class="form-control py-4" type="text" name="verbruik" placeholder="Verbruik" value="<?php echo $row['verbruik'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="uitstoot" placeholder="Uitstoot" value="<?php echo $row['uitstoot'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="pk" placeholder="Vermogen PK" value="<?php echo $row['vermogenPK'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="kw" placeholder="Vermogen KW" value="<?php echo $row['vermogenKW'] ?>"/>
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="prijs" placeholder="Prijs" value="<?php echo $row['prijs'] ?>"/>
          </div>



          <div class="form-group">
              <input  type="file" name="thumbnail"/>
          </div>



          <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
              <button class="btn btn-primary" type="submit" name="car-submit" >Toevoegen</button>
          </div>
        </form>


      </div>

    </div>

  </div>

<?php include('includes/footer.php')?>