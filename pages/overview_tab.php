<div class="row">
	<div class="col-md-7">
		<h2>Users</h2>
			<?php
				$users = array_filter(getAllUsers());
				if (empty($users)) {
					echo '<div class="jumbotron jumbotron-fluid">
							<div class="container">
								<p class="lead">Sorry, You do not have any users yet.</p>
							</div>
						  </div>';
				}else{
					echo '<table class="table">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">First Name</th>
								  <th scope="col">Last Name</th>
								  <th scope="col">Username</th>
								  <th scope="col">Email</th>
								</tr>
							  </thead>
							  <tbody>' ;
					foreach ($users as $i => $user) {
						echo '
							<tr">
								<td>'.$i.'</td>
								<td>'.$user["firstName"].' </td>
								<td>'.$user["lastName"].'</td>
								<td>'.$user["username"].'</td>
								<td>'.$user["email"].'</td>
							</tr>';
					}
					echo' </tbody></table>';
				}	
			?>
			
		<h2>Statistics</h2>
		<div>
			<?php
				$query1 = "SELECT categoryText FROM category where categoryID =" .$row2["categoryID"];
				$query2 = "SELECT count(postID) AS number, categoryID FROM post GROUP BY categoryID";
				$db = connect();
				$get = $db->prepare($query2);
				$get->execute();
				$row = $get->fetch(PDO::FETCH_ASSOC);
				include("../vendor/wrappers/php-wrapper/fusioncharts.php");
				$statsData = array( 
					"chart" => array(
						"caption" => "Forum Site Traffic",
						"subCaption" => "Web Forum 4370",
						"xAxisName" => "Time(Hours, Days, Weeks, Months, Years)",
						"yAxisName" => "Number of Posts (Either)",
						"paletteColors" => "#0075c2",
						"bgcolor" => "#ffffff",
						"borderAlpha" => "20"
					)		
				);
				$statsData["data"] = array();
				while ($row = mysql_fetch_array($result)){
					$get = $db->prepare($query1);
					$get->execute();
					$row2 = $get->fetch(PDO::FETCH_ASSOC);
					array_push($statsData["data"], array("label" => $row2["categoryText"], "value" => $row["number"]));	
				}
				$jsonEncodedData = json_encode($statsData);
				$columnChart = new FusionCharts("column2D", "ForumStats", 600, 300, "forumchart", "json", $jsonEncodedData);
				$columnChart->render();
			?>
		</div>
	</div>
</div>