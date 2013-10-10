<?php
include("connection.php");

    if(isset($_POST['login'])){ // Retrieved from method form POST in HTML
            //Prevent SQL injections
    	$username = mysql_real_escape_string($_POST['username']);
    	$address = mysql_real_escape_string($_POST['address']);
    	
            //Check to see if username exists
    	$sql = mysql_query("SELECT username FROM members WHERE username = '".$username."'");
    	if (mysql_num_rows($sql)>0){
    		die ("Username taken");
    	}
    	
            // Insert new record to database
    	mysql_query("INSERT INTO members (username, address) VALUES ( '$username', '$address')")
    	or die (mysql_error());
    	
    	header('Location: /basic-php-crud'); // replace with other redirection URL
    	die;
    }

    if (isset($_POST['delete'])) {
    	$username = mysql_real_escape_string($_POST['username']);
    	mysql_query("DELETE FROM members WHERE username='".$username."'");
    	header('location: /basic-php-crud');
    	echo 'Deleted';
    }
    
/*	if (isset($_POST['cancel'])) {
	    header('location: // Redirect to some page');
	}*/

	if (isset($_POST['update'])){
		$username = $_POST['username'];
		$address = $_POST['address'];
		mysql_query("UPDATE members SET address = '".$address."' WHERE username = '".$username."'");
		header('location: /basic-php-crud');
	}
	?>

	<!doctype html>
	<html>
	<head></head>
	<body>
		<h1>Create</h1>
		<form method="post">
			<table>
				<tr>
					<td>Username: </td>
					<td><input name="username" type="text" size="32" /></td>
				</tr>
				<tr>
					<td>Address: </td>
					<td><input name="address" type="text" size="32" /></td>
				</tr>
			</table>
			<input type="submit" name="login" value="Submit"/>
		</form>

		<h1>Retrieve</h1>
		<?php          
            // Use INNER JOIN to join foreign key tables
		$result = mysql_query("SELECT * FROM members");
		echo "<table border='1'>
		<tr>
		<th>Username</th>
		<th>Address</th>
		</tr>";
		
		while($row = mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['username']."</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		?>

		<h1>Update</h1>
		<form method="post">
			<input type="text" name="username" placeholder="username to update" />
			<input type="text" name="address" placeholder="update address"/>
			<input type="submit" name="update" value="Save" />
		</form>

		<h1>Delete</h1>
		<form method="post">

			<input type="text" name="username" placeholder="insert existing username" />
			<input type="submit" name="delete" value="Delete" />
			<!-- <input type="submit" name="cancel" value="Cancel" /> -->
		</form>

		<hr/>

	</body>
	</html>