<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Read</title>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h2>READ DATA</h2>
    </div>
<?php
$id=isset($_GET['id']) ? $_GET['id'] :die("Error: ID not found");

 

include"config/database.php";

 

try
{
    $query="SELECT id, First_Name,Last_Name,Student_Email,Student_Phone From student where id=? LIMIT 0,1";
    $stmnt=$con->prepare($query);
    $stmnt->bindParam(1,$id);
    $stmnt->execute();

 

    $row=$stmnt->fetch(PDO::FETCH_ASSOC);

 

    /*echo"<pre>";
    print_r($row);
    echo"</pre>";*/

 

    $FirstName=$row["First_Name"];
    $LastName=$row["Last_Name"];
    $StudentEmail=$row["Student_Email"];
    $StudentPhone=$row["Student_Phone"];
        
}
catch(PDOException $e) 
{
    die("ERROR :".$e->getMessage());
}

 

?>
<table class="table table-hoover table-resonsive table-bordered">
    <tr>
        <td>First Name</td>
        <td><?php echo $FirstName; ?></td>        
    </tr>
    <tr>
        <td>Last Name</td>
        <td><?php echo $LastName; ?></td>        
    </tr>
    <tr>
        <td>Student Email</td>
        <td><?php echo $StudentEmail; ?></td>        
    </tr>
    <tr>
        <td>Student Phone</td>
        <td><?php echo $StudentPhone; ?></td>        
    </tr>
</table>
</div>
</body>
</html>