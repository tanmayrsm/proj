<?php
	include("config.php");
	$resu = mysqli_query($mysqli ,"SELECT * from record ORDER by schedule_date ASC;");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
</head>
<body>
	<form action = "function.php" method = 'POST'>
		Topic:<input type="text" name="topic"><br>
		No of words:<input type="text" name="words"><br>
		Instr:<input type="text" name="inst"><br>
		<input type="submit" name="submit">
	</form>

	<table border = "2">
		<tr>
			<th>Id</th>
			<th>Topic</th>
			<th>No of words</th>
			<th>Instruction</th>
			<th>Scheduled Date</th>
		</tr>
		<?php
			while($p = mysqli_fetch_array($resu)){
				echo '<tr>';
					echo '<td>'.$p['ID'].'</td>';
					echo '<td>'.$p['topic'].'</td>';
					echo '<td>'.$p['no_words'].'</td>';
					echo '<td>'.$p['inst'].'</td>';
					echo '<td>'.$p['schedule_date'].'</td>';
				echo'</tr>';
			}

		?>
		<!-- id11775201_root is usrname and swamiji@1 is pwd..

				recordo.000webhostapp.com
				https://www.000webhost.com/members/website/recordo/build
				https://www.000webhost.com/members/website/recordo/database
				https://databases.000webhost.com/sql.php?server=1&db=id11775201_chammo&table=record&pos=0
		 -->
	</table>
	

</body>
</html>