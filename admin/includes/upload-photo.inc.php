<?php 

if(isset($_POST['photo-submit'])){

    // Inputs
    $autoNaam=$_POST['autonaam'];
    

    // File thumbnail
    $file=$_FILES['foto'];
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    // Get filetype name
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    // Allowed Types
    $allowed = ['jpeg','jpg','png'];
    
    // Error Handler Allowed Types
    if(in_array($fileActualExt,$allowed)){

        // Error Control
        if($fileError === 0){
            
            // Filesize Control >5MB
            if($fileSize < 5000000){
                $imageFullName = $autoNaam.".".uniqid("",true).".".$fileActualExt;
                $fileDest = '../img/auto_fotos/'.$imageFullName;
                include_once('db-inc.php');

                if(empty($_POST['autonaam'])){
                    header('location: ../photo-add.php?=empty');
                    exit();
                }else{
                    $sql = "SELECT * FROM fotos";
                    $stmt = mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "Sql statement failed";
                    }
                    else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        $sql= "INSERT INTO fotos (auto_id,fotonaam) VALUES (?,?)";
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "Sql statement failed";
                        }
                        else{
                            mysqli_stmt_bind_param($stmt, "ss", $autoNaam,$imageFullName);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName,$fileDest);
                            header("location: ../photo-add.php");

                        }
                    }
                }
            }

        }else{
            echo 'Bestand is te groot';
            exit();
        }

    }else{
        echo 'Upload een juist bestandstype';
        exit();
    } 

}

// "ssssssssssss", $autoNaam,$motor,$kmstand,$bouwjaar,$brandstof,$transmissie,$prijs,$thumbnail,$verbruik,$uitstoot,$kw,$pk
// autonaam,motor,kmstand,bouwjaar,brandstof,transmissie,prijs,thumbnail,verbruik,uitstoot,vermogenKW,vermogenPK) VALUES (?,?,?,?,?,?,?,?,?,?,?,?

?>