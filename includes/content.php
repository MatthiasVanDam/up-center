<header>
    <div class="vid-container">
        <div class="video">
            <iframe src="https://www.youtube.com/embed/zXoHO3pu4fI?controls=0&rel=0&autoplay=1&loop=1&playlist=zXoHO3pu4fI&mute=1" frameborder=" 0" loop allow="autoplay loop" allowfullscreen></iframe>
            <div class="color-overlay"></div>
            <div class="heading-overlay">
                <div class="heading">
                    <h1>UP! Center</h1>
                </div>
                <div class="button-container">
                    <a href="#intro" class="btn">Kom meer te weten</a>
                    <a href="contact.php" class="btn">Contact</a>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- INTRO -->
<section id="intro">
    <div class="intro-content">
        <div class="intro-img"><img src="img/intro.jpg" /></div>
        <div class="intro-text  rounded shadow-lg">
            <h3>De Volkswagen UP!</h3>
            <p>De UP! is de kleinste en meest onderschatte wagen in de Volkswagen familie.
                Met dit klein stadswagentje tilt Volkswagen het op dit moment zeer populaire A-segment naar een hoger niveau.
                De afmetingen buiten zijn dan wel klein, de binnenruimte is in verhouding erg groot, dit hebben we te danken aan de lange wielbasis en de kleinere motorruimte.
                Wist u dat de Vw UP! bijna even groot is als de 3de generatie Polo?
            </p>
            <p>U hoort het al wij zijn ons hart verloren aan de UP!
                Door onze jarenlange ervaring als VAG specialist, hebben we de UP! steeds beter leren kennen, en hij heeft ook ons verbaasd, in rijplezier, zuinigheid en onderhoudskosten.
                Wij hebben mede door onze verkoop een groot aandeel UP!’s in ons klantenbestand, en uit ervaring merken we dat dit de betrouwbaarste auto is uit het Volkswagen segment.
                Ook hebben we gemerkt dat de kosten voor herstellingen bijzonder laag uitvallen en zelden voorkomen.
            </p>
            <p>Kortom, veel rijplezier in een klein voordelig pakketje!</p>
        </div>
    </div>
</section>


<!-- Occasies -->
<section id="">
    <div class="container">
        <div class="row">
            <h1 class="section-heading mx-auto text-uppercase">Occasies</h1>
        </div>
        <div class="row">

            <?php
            include_once 'admin/includes/db-inc.php';

            $sql = "SELECT * FROM autos LIMIT 2";
            $stmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL statement failed";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                
            <div class="col-xs-12 col-lg-6">
                <div class="preview-card card p-4 shadow">

                    <!-- Card Titel -->
                    
                    <div class="d-flex text-center mx-auto">
                        <h4 class="mb-4">' . $row["autonaam"] . " " . $row["motor"] . '</h4>
                    </div>
                    
                    <!-- Card Info -->

                    <div class="d-flex justify-content-between text-center align-items-center">
                        <div class="col-sm-12 col-md-12">
                            <div class="card-img-top mb-2">
                                <img class="img-fluid" src="admin/img/thumbnail/' . $row["thumbnail"] . '"/>
                            </div>
                        </div>


                    </div>

                    <div class="d-flex  justify-content-between text-center align-items-center">
                        <div class="col-12">
                            <div class="card-info">
                                <ul class="d-flex">
                                    <li><span class="font-weight-bold">€&nbsp;' . $row["prijs"] . ',-</span> </li>

                                    <li><i class="far fa-calendar"></i>&nbsp;' . $row["bouwjaar"] . '</li>
                                    <li><i class="fas fa-road"></i>&nbsp;' . $row["kmstand"] . '<span> km</span></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex  justify-content-center text-center align-items-center">
                        <a class="btn btn-lg btn-primary ">
                            Meer Weten?
                        </a>
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