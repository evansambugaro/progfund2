<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="container">
        <h2>Basic Table</h2>
        <div>
            <?php

            $action=isset($_GET['action']) ? $_GET['action'] :"";
            if($action =="deleted")
            {
                echo"<div class='alert alert-success'> Record was deleted successfully</div>";
            }

            ?>
            <a href="create.php" class="btn btn-primary">Create New</a>
        </div>
        <table class="table">
            <head>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Student Email</th>
                    <th>Student Phone</th>
                </tr>
            </head>
            <tbody>
                <?php
                // include database connection
                include"config/database.php";

                // select all data
                $query ="SELECT id,First_Name,Last_Name,Student_Email,Student_Phone From student ORDER by id DESC";
                
                $stmt=$con->prepare($query);
                $stmt->execute();
            
                while ($row=$stmt->fetch(PDO :: FETCH_ASSOC))
                {
                    extract($row);

                    echo"<tr>";
                        echo"<td>{$id}</td>";
                        echo"<td>{$First_Name}</td>";
                        echo"<td>{$Last_Name}</td>";
                        echo"<td>{$Student_Email}</td>";
                        echo"<td>{$Student_Phone}</td>";
                        echo"<td>";
                        echo"<a href='read.php?id={$id}' class='btn btn-primary btn-sm'>Read</a>";
                        echo"<a href= 'update.php?id={$id}' class='btn btn-warning btn-sm'>Edit</a>";
                        echo"<a href ='#' onclick='delete_user({$id});' class='btn btn-danger btn-sm'> Delete </a>";
                        echo"</td>";
                    echo"</tr>";

                }

                ?>


            </tbody>
           
        </table>

 

    </div>

 
<script>
function delete_user(id) 

{
    var answer =confirm("Are you sure you want to delete?")
    if (answer)
    {
        window.location="delete.php?id="+id;
    }
}

</script>
</body>
</html>