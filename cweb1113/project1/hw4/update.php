<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Edit Record</title>
</head>
<body>
	<!-- container -->
	<div class="container">
		<div class="page-header">
			<h1>Edit Record</h1>
		</div>

		<?php
		// include database connection
        include"config/database.php";
        $id=isset($_GET['id']) ? $_GET['id'] : die("ERROR: Record ID not found.");

		$Name="";
   		$NameErr="";

    	$Email="";
    	$EmailErr="";

    	$Phone="";
    	$PhoneErr="";

    	$Title="";
    	$TitleErr="";

    	$Createddate="";
    	$CreateddateErr="";

    	$Modifieddate="";
    	$ModifieddateErr="";

    	$isNameValid="false";
    	$isEmailValid="false";

    	if($_POST)
    	{
    		try
    		{
    			// write update query
    			$query="UPDATE contacts SET Name =?, Email=?, Phone=?, Title=?, Created_date=?, Modified_date=? WHERE id=?";

    			// prepare query for execution
    			$stmt=$con->prepare($query);

    			$name=sanitize_input($_POST['name']);
    			$email=sanitize_input($_POST['email']);
    			$phone=sanitize_input($_POST['phone']);
    			$title=sanitize_input($_POST['title']);
    			$createddate=sanitize_input($_POST['createddate']);
    			$modifieddate=sanitize_input($_POST['modifieddate']);
    			$id=sanitize_input($id);

    			//bind the parameters
    			$stmt->bindParam(1,$name);
    			$stmt->bindParam(2,$email);
    			$stmt->bindParam(3,$phone);
    			$stmt->bindParam(4,$title);
    			$stmt->bindParam(5,$createddate);
    			$stmt->bindParam(6,$modifieddate);
    			$stmt->bindParam(7,$id);

    			// Execute the query
    			if($stmt->execute())
    			{
    				echo"<div class='alert alert-success'> Record was updated. </div>";
    			}

    			else
    			{
    				echo"<div class='alert alert-danger'> Unable to update recordy. Please try again. </div>";
    			}

    		}

    	catch(PDOException $ER)
    	{
    		echo "ERROR :".$ER->getMessage();
    	}
    	}

		
		
		//echo $id;

		try
		{
			//prepare select query
			$query="SELECT Id, Name, Email, Phone, Title, Created_date, Modified_date From contacts where id=? LIMIT 0,1";
			$stmt=$con->prepare($query);
			$stmt->bindParam(1,$id);
			// execute the query
			$stmt->execute();
			$row=$stmt->fetch(PDO ::FETCH_ASSOC);

			//values to fill up
    		$Name=$row["Name"];
    		$Email=$row["Email"];
    		$Phone=$row["Phone"];
    		$Title=$row["Title"];
    		/* $Createddate=$row["Createddate"];
    		$Modifieddate=$row["Modifieddate"]; */
		}

		catch(PDOException $ER)
		{
			echo "ERROR".$ER->getMessage();
		}

		 function sanitize_input ($data)
    	{
        	$data=trim($data);
        	$data=stripslashes($data);
        	$data=htmlspecialchars($data);
        	return $data;

    	}

		?>

		<form action="update.php?id=<?php echo htmlspecialchars($id);?>" method="post">
        <table class="table table-hover table-responsive table-bordered">
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" class="form-control" value="<?php echo $Name; ?>">
                    <span class="Error"><?php echo $NameErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" class="form-control" value="<?php echo $Email; ?>">
                    <span class="Error"><?php echo $EmailErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>
                    <input type="text" name="phone" class="form-control" value="<?php echo $Phone; ?>"></td>
                    <span class="Error"><?php echo $PhoneErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Title</td>
                <td>
                    <input type="text" name="title" class="form-control" value="<?php echo $Title; ?>"></td>
                    <span class="Error"><?php echo $TitleErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Created Date</td>
                <td>
                    <input type="text" name="createddate" class="form-control" value="<?php echo $Createddate; ?>">
                    <span class="Error"><?php echo $CreateddateErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Modified Date</td>
                <td>
                    <input type="text" name="modifieddate" class="form-control" value="<?php echo $Modifieddate; ?>">
                    <span class="Error"><?php echo $ModifieddateErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" value="save" class="btn btn-primary">
                <a href="index.php" class="btn btn-danger">Go Back</a>
                </td>
            </tr>
        </table>
    </form>

	</div>
	<!-- End Container -->

</body>
</html>