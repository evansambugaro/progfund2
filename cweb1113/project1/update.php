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

		$Fname="";
   		$FnameErr="";
    	$Lname="";
    	$LnameErr="";
    	$Email="";
    	$EmailErr="";
    	$Phone="";
    	$PhoneErr="";
    	$isFnameValid="false";
    	$isLnameValid="false";

    	if($_POST)
    	{
    		try
    		{
    			// write update query
    			$query="UPDATE student SET First_Name =?, Last_Name=?, Student_Email=?, Student_Phone=? WHERE id=?";

    			// prepare query for execution
    			$stmt=$con->prepare($query);

    			$fname=sanitize_input($_POST['fname']);
    			$lname=sanitize_input($_POST['lname']);
    			$email=sanitize_input($_POST['email']);
    			$phone=sanitize_input($_POST['phone']);
    			$id=sanitize_input($id);

    			//bind the parameters
    			$stmt->bindParam(1,$fname);
    			$stmt->bindParam(2,$lname);
    			$stmt->bindParam(3,$email);
    			$stmt->bindParam(4,$phone);
    			$stmt->bindParam(5,$id);

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
			$query="SELECT id, First_Name,Last_Name,Student_Email,Student_Phone From student where id=? LIMIT 0,1";
			$stmt=$con->prepare($query);
			$stmt->bindParam(1,$id);
			// execute the query
			$stmt->execute();
			$row=$stmt->fetch(PDO ::FETCH_ASSOC);

			/*echo"<pre>";
			echo $row;
			echo"</pre>";*/

			//values to fill up
    		$FirstName=$row["First_Name"];
    		$LastName=$row["Last_Name"];
    		$StudentEmail=$row["Student_Email"];
    		$StudentPhone=$row["Student_Phone"];
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
                <td>First Name</td>
                <td>
                    <input type="text" name="fname" class="form-control" value="<?php echo $FirstName; ?>">
                    <span class="Error"><?php echo $FnameErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>
                    <input type="text" name="lname" class="form-control" value="<?php echo $LastName; ?>">
                    <span class="Error"><?php echo $LnameErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Student Email</td>
                <td>
                    <input type="text" name="email" class="form-control" value="<?php echo $StudentEmail; ?>"></td>
                    <span class="Error"><?php echo $EmailErr ; ?></span>
                </td>
            </tr>
            <tr>
                <td>Student Phone</td>
                <td>
                    <input type="text" name="phone" class="form-control" value="<?php echo $StudentPhone; ?>"></td>
                    <span class="Error">
                    <span class="Error"><?php echo $PhoneErr ; ?></span>
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