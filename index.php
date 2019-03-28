<?php
    include_once "includes/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect PHP and MYSQL</title>
</head>
<body>
    <?php
        //created a template 
        $data1 = "aasim123";
        $data2 = "aasim";
        $sql = "SELECT * FROM users WHERE users.user_uid=? AND users.user_first=?;";
        //Create a Prepared statement
        $stmt = mysqli_stmt_init($connect);
        //prepare the prepare statements;
        if(!mysqli_stmt_prepare($stmt, $sql)){ // if this function succeeds - always check for failure first
            echo "sql statement failed";
        }else{
            //Bind parameters to the placeholders.
            mysqli_stmt_bind_param($stmt, 'ss', $data1, $data2); //We can pass String, or I=integer, or b="BLOB, d="double - passing in placeholders.
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            while($row = mysqli_fetch_assoc($results)){ // fetchs all results we have
                echo $row["user_first"]. "<br>"; //gain access to information from query here.
            }

        
        
        }


            
        
    ?>


</body>
</html>