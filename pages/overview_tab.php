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
				$xDatas = getCatStat();
						
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
				
				foreach ($xDatas as $xData){
					array_push($statsData["data"], array("label" => $xData["category"], "value" => $xData["number"]));
				}
				/*while ($row = $get->fetch(PDO::FETCH_ASSOC)){
					$get2 = $db->prepare("SELECT COUNT(postID) AS number FROM post where categoryID ='$row["categoryID"]' ");
					$get2->execute();
					$row2 = $get2->fetch(PDO::FETCH_ASSOC);
					echo $row["number"];
					array_push($statsData["data"], array("label" => $row["categoryText"], "value" => $row2["number"]));	
				}*/
				$jsonEncodedData = json_encode($statsData);
				$columnChart = new FusionCharts("column2D", "ForumStats", 600, 300, "forumchart", "json", $jsonEncodedData);
				$columnChart->render();
			?>
		</div>