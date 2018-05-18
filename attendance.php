<?php
include("includes/header.php");
include("includes/menu.php");
include("includes/check_session.php");

$results = mysqli_query($con, "SELECT * FROM `students` WHERE `id`='".mysqli_real_escape_string($con, base64_decode($_GET['id']))."'");
$course_fetch=mysqli_fetch_array($results);

?>
<script>
	$(document).ready(function() {
		$('.search_data').DataTable( {
			"paging":   false,
			"ordering": false,
			"info":     false
		});
	});
</script>
<section id="main-content">
	<section class="wrapper site-min-height">

		<div class="row mt">
			<div class="col-lg-12">
				<div class="tab-content">
					<div id="finder" class="tab-pane fade in active">
						<div class="row dashboard-stats container">
							<div class="col-md-2 col-sm-6 col-md-offset-8">
								<section class="panel panel-box">
									<div class="panel-left panel-icon bg-lovender"><i class="fa fa-users"></i></div>
									<div class="panel-right panel-icon bg-reverse">
										<p class="text-muted no-margin text"><span> </span></p>
										<Strong>
											<p class="size-h1">Maping Details</p>
										</Strong>
									</div>
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		



		<div class="tab-content" style="border: 1px solid #eee; background: #fff; padding: 10px;">
			<!--  data will write here -->
			<center><h2 class="text-center"><?php echo $course_fetch['course_name'] ?> Attendance</h2></center>
			<form method="post">
				<!--table responsive div start-->
				<div class="table-responsive" style="height: 500px;overflow-y: scroll;">
					<table class="table table-striped table-bordered table-centered table-hover search_data">
						<thead>
							<tr>
								<td>S No</td>
								<th>Name </th>
								<th>Roll Number</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Branch</th>
								<th>Year</th>
								<th>College</th>
								<th>Attendance</th>
							</tr>
						</thead>

						<?php 
						$x=1;             
						$query = "SELECT * FROM  `codeheat` WHERE `fee`='1' AND  `course_id`=".mysqli_real_escape_string($con, base64_decode($_GET['id']));
						$result1 = mysqli_query($con, $query);
						while($row = mysqli_fetch_array($result1)) {
							$result = mysqli_query($con, $query);
							$staff_details = mysqli_fetch_array($result);
							?> 
							<tr class="data">
								<td><?php echo $x;?></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['roll_no'] ?></td>
								<td><?php echo $row['mobile'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><?php echo $row['branch'] ?></td>
								<td><?php echo $row['year'] ?></td>
								<td><?php echo $row['college'] ?></td>
								<td><input type="checkbox" checked name="Attendance[]" value="<?php echo $row['roll_no'] ?>"></td>
							</tr>
							<?php
							$x++;
						}
						?>
					</table>
				</div>
				<br>
				<button class="btn btn-warning" name="get_attendance">Submit</button>
				<!--table responsive div end-->
			</form>

		</div>


	</section>
	<?php
	include("includes/footer.php");
	?>
</section>

</body>
</html>

<?php 
if (isset($_POST['get_attendance'])) {
	$count  = count($_POST['Attendance']);
	for ($i=0; $i < $count; $i++) { 
		$roll = $_POST['Attendance'][$i];
		$query = "INSERT INTO `codeheat_attendence_2018` SET `rollno`='".$roll."' , `course_id`='".$course_fetch['id']."', `course_name`='".$course_fetch['course_name']."', `added_date`='20-04-2018'";
		$result = mysqli_query($con, $query);
	}
	if ($result) {
		echo "<script>location.href='index.php?submit_msg=1'</script>";
	}
	else{
		echo "<script>location.href='index.php?submit_msg=2'</script>";
	}
}
?>