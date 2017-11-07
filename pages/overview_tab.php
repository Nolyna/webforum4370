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
							<tr>
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
				$statsData = array( 
					"chart" => array(
						"caption" => "Forum Site Traffic",
						"subCaption" => "Web Forum 4370",
						"xAxisName" => "Time",
						"yAxisName" => "Number of Posts",
						"paletteColors" => "#0075c2",
						"bgcolor" => "#ffffff",
						"borderAlpha" => "20"
					)		
				);
				$statsData["data"] = array();
				
				$xDatas = array_filter(getCategories());
				if (empty($xDatas)) {
					echo '<div class="jumbotron jumbotron-fluid">
							<div class="container">
								<p class="lead">Sorry, You do not have any data yet.</p>
							</div>
						  </div>';
				}else{
					echo '<table class="table">
							  <thead>
								<tr>
								  <th scope="col">Category</th>
								  <th scope="col">Number of Posts</th>
								</tr>
							  </thead>
							  <tbody>' ;
					foreach ($xDatas as $xData) {
						$dataId = getStat($xData["categoryID"]);
						array_push($statsData["data"], array("label" => $xData['categoryText'], "value" => $dataId));
						echo '
							<tr>
								<td>'.$xData["categoryText"].' </td>
								<td>'.$dataId.' </td>
							</tr>';
					}
					echo' </tbody></table>';
				}			
				
				$jsonEncodedData = json_encode($statsData);
				$columnChart = new FusionCharts("column2D", "ForumStats", 600, 300, "forumchart", "json", $jsonEncodedData);
				$columnChart->render();
			?>
		</div>