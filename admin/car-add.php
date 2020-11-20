<?php include('includes/header.php')?>
<?php include('includes/content-top.php')?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <form action="includes/upload-car.inc.php" method="post" enctype="multipart/form-data">

          <div class="form-group">
              <input class="form-control py-4" type="text" name="autonaam" placeholder="Autonaam" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="motor" placeholder="Motor" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="kmstand" placeholder="Kmstand" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="bouwjaar" placeholder="Bouwjaar" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="brandstof" placeholder="Brandstof" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="transmissie" placeholder="Transmissie" />
          </div>
          
          <div class="form-group">
              <input class="form-control py-4" type="text" name="verbruik" placeholder="Verbruik" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="uitstoot" placeholder="Uitstoot" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="pk" placeholder="Vermogen PK" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="kw" placeholder="Vermogen KW" />
          </div>

          <div class="form-group">
              <input class="form-control py-4" type="text" name="prijs" placeholder="Prijs" />
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