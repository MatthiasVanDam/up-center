<?php include('header.php')?>

<?php 
if (empty($_GET['id']))
{
    header("location: ../cars.php");
}
else{
    include_once "db-inc.php";
    $id = $_GET['id'];



    $sql = "SELECT * FROM autos where id=$id";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Sql statement failed";
    }
    else{
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        unlink("../img/thumbnail/".$row['thumbnail']);



        $sql= "DELETE FROM autos where id=$id";
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "Sql statement failed";
        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);

            header("location: ../cars.php");

        }
    }
}




?>