<?php
		include("config.php");

		if(isset($_POST['submit'])){
			$topic = $_POST['topic'];
			$no = $_POST['words'];
			$inst = $_POST['inst'];
			$time = '';
			$last = '';

			if($no > 1000){
				echo "You must enter no of words<=1000 name";
				return false;
			}

			///laugic
			$curr_date = date('Y-m-d');

			$check = mysqli_query($mysqli ,"SELECT * from record WHERE schedule_date='$curr_date';");
			
			if(mysqli_num_rows($check) == 0){
				echo 'Kuch nhi tha re table me';
				$res = mysqli_query($mysqli ,"INSERT into record (topic,no_words,inst,schedule_date) VALUES ('$topic','$no','$inst',CURRENT_TIMESTAMP);");
				if($res){
				echo "Done for first case";
				}
				else{
					echo "error";
				}
			}

			else{

				$bam = mysqli_query($mysqli ,"SELECT sum(no_words) as man,schedule_date from record GROUP BY schedule_date ORDER BY schedule_date ASC;");

				while($p = mysqli_fetch_array($bam)){
					// echo '<p>'.$p['man'].'</p>';
					// echo '<p>'.$p['schedule_date'].'</p>';
					if($no + $p['man'] <= 1000){
						$time = $p['schedule_date'];						
					}
					if($time!='')
						break;
					else{
						$last = $p['schedule_date'];
					}
				}

				if($time == ''){
					#$lasto = $last;

					$last_date = date('Y-m-d', strtotime($last. ' + 1 days'));
					echo 'Last date:'.$last_date;

					$res2 = mysqli_query($mysqli ,"INSERT into record (topic,no_words,inst,schedule_date) VALUES ('$topic','$no','$inst','$last_date');");
					echo "INSERT into record (topic,no_words,inst,schedule_date) VALUES ('$topic','$no','$inst','$last_date');";
					if($res2){
					echo "Done for case 2";
					}
					else{
						echo "error";
					}
				}
				else{
					$res2 = mysqli_query($mysqli ,"INSERT into record (topic,no_words,inst,schedule_date) VALUES ('$topic','$no','$inst','$time');");
					echo "INSERT into record (topic,no_words,inst,schedule_date) VALUES ('$topic','$no','$inst','$time');";
					if($res2){
					echo "Done for case 2";
					}
					else{
						echo "error";
					}
				}

				

			}
			
			

			
		}
	?>