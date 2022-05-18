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
            <a href="create.php" class="btn btn-primary">Create New Contact</a>
        </div>
        <table class="table">
            <head>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Title</th>
                    <th>Created Date</th>
                    <th>Modified Date</th>
                    <th>Action</th>
                </tr>
            </head>
            <tbody>
                <?php
                // include database connection
                include"config/database.php";

                // select all data
                $query ="SELECT Id, Name, Email, Phone, Title, Created_date, Modified_date From contacts ORDER by id DESC";
                
                $stmt=$con->prepare($query);
                $stmt->execute();
            
                while ($row=$stmt->fetch(PDO :: FETCH_ASSOC))
                {
                    extract($row);

                    echo"<tr>";
                        echo"<td>{$Id}</td>";
                        echo"<td>{$Name}</td>";
                        echo"<td>{$Email}</td>";
                        echo"<td>{$Phone}</td>";
                        echo"<td>{$Title}</td>";
                        echo"<td>{$Created_date}</td>";
                        echo"<td>{$Modified_date}</td>";
                        echo"<td>";
                        echo"<a href='read.php?id={$Id}' class='btn btn-primary btn-sm'>Read </a>";
                        echo"<a href= 'update.php?id={$Id}' class='btn btn-warning btn-sm'>Edit</a>";
                        echo"<a href ='#' onclick='delete_user({$Id});' class='btn btn-danger btn-sm'> Delete</a>";
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