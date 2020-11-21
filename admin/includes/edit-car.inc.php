<?php include('header.php') ?>

<?php

if (isset($_POST['car-submit'])) {

    // Inputs
    $autoNaam = $_POST['autonaam'];
    $motor = $_POST['motor'];
    $kmstand = $_POST['kmstand'];
    $bouwjaar = $_POST['bouwjaar'];
    $brandstof = $_POST['brandstof'];
    $transmissie = $_POST['transmissie'];
    $verbruik = $_POST['verbruik'];
    $uitstoot = $_POST['uitstoot'];
    $pk = $_POST['pk'];
    $kw = $_POST['kw'];
    $prijs = $_POST['prijs'];

    // File thumbnail
    $file = $_FILES['thumbnail'];
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    // Get filetype name
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Allowed Types
    $allowed = ['jpeg', 'jpg', 'png'];

    // Error Handler Allowed Types
    if (in_array($fileActualExt, $allowed)) {

        // Error Control
        if ($fileError === 0) {

            // Filesize Control >5MB
            if ($fileSize < 50000) {
                $imageFullName = $autoNaam . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDest = '../img/thumbnail/' . $imageFullName;

                include_once("db-inc.php");

                if (empty($_POST['autonaam'] || $_POST['motor'] || $_POST['kmstand'] || $_POST['bouwjaar'] || $_POST['brandstof'] || $_POST['transmissie'] || $_POST['prijs'] || $_POST['verbruik'] || $_POST['uitstoot'] || $_POST['pk'] || $_POST['kw'])) {
                    header('location: ../car-edit.php?=empty');
                    exit();
                } else {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM autos";
                    $stmt = mysqli_stmt_init($con);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "Sql statement failed";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        $row = mysqli_fetch_assoc($result);
                        unlink('../img/thumbnail/' . $row['thumbnail']);

                        $sql = "UPDATE autos SET autonaam=?,motor=?,kmstand=?,bouwjaar=?,brandstof=?,transmissie=?,prijs=?,thumbnail=?,verbruik=?,uitstoot=?,vermogenKW=?,vermogenPK=? WHERE id=$id";
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "Sql statement failed";
                        } else {
                            mysqli_stmt_bind_param($stmt, "ssssssssssss", $autoNaam, $motor, $kmstand, $bouwjaar, $brandstof, $transmissie, $prijs, $imageFullName, $verbruik, $uitstoot, $kw, $pk);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName, $fileDest);
                            header("location: ../cars.php");
                        }
                    }
                }
            }
        } else {
            echo 'Bestand is te groot';
            exit();
        }
    } else {
        echo 'Upload een juist bestandstype';
        exit();
    }
}

?>