<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Task 1</title>
</head>
<body>
	<?php
		include "Class\Task1.php";

		function createChild($categories, $parentId = 0, $lavel = 0)
		{
		    $results = [];
		    foreach($categories as $category) {
		        if ($parentId == $category['ParentId']) {
		            $nextParentId = $category['Id'];
		            
		            for ($i=0; $i < $lavel; $i++) { 
		            	echo "&nbsp&nbsp&nbsp&nbsp";
		            }
		            echo $category['Name']."<br>";
		            $lavel++;
		            $category['Child'] = createChild($categories, $nextParentId, $lavel);
		            $results[] = $category;
		        }
		    }
		    return $results;
		}

		$task1 = new Task1();
		$result = $task1->get_parent_category();
		$array_data = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$array_data[] = $row;
			}
			echo "<pre>";

			$result = createChild($array_data);
			// print_r($result);



		} else {
			?>
			<tr>
				<td colspan="2">Not found!</td>
			</tr>
			<?php
		}
	?>
</body>
</html>

