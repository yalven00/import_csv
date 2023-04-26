<?php

include_once("db_connect.php");

$sql = "SELECT * FROM stuffs order by created_at";

$result = $db_conn->query($sql);

if (mysqli_num_rows($result) > 0) {

?>
<!DOCTYPE html>
<html>
<head>
<title>Import CSV file</title>
</head>
<body>
<form enctype="multipart/form-data" action="import_data.php" method="post">
<div class="input-row">
<label class="col-md-4 control-label">Choose file:</label>
<input type="file" name="file" id="file" accept=".csv">
<button type="submit" id="submit" name="import" class="btn-submit">Submit</button>
<br />
</div>
</form>
<table>
<thead>
<tr>
<th>ID</th>
<th>Code</th>
<th>Title</th>
<th>Level 1</th>
<th>Level 2</th>
<th>Level 3</th>
<th>Price</th>
<th>Price SP</th>
<th>Fields Properties</th>
<th>Mutual Purchases</th>
<th>Unit Of Measure</th>
<th>Image Path</th>
<th>Show on Main</th>
<th>Description</th>
</tr>
</thead>
<?php while ($row = mysqli_fetch_array($result)) { ?>
<tbody>
<tr>
<td><?php  echo $row['id']; ?></td>
<td><?php  echo $row['code']; ?></td>
<td><?php  echo $row['title']; ?></td>
<td><?php  echo $row['level1']; ?></td>
<td><?php  echo $row['level2']; ?></td>
<td><?php  echo $row['level3']; ?></td>
<td><?php  echo $row['price']; ?></td>
<td><?php  echo $row['price_sp']; ?></td>
<td><?php  echo $row['fields_properties']; ?></td>
<td><?php  echo $row['mutual_purchases']; ?></td>
<td><?php  echo $row['unit_of_measure']; ?></td>
<td><?php  echo $row['image_path']; ?></td>
<td><?php  echo $row['show_on_main']; ?></td>
<td><?php  echo $row['description']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } 
$db_conn->close();
?>
</body>
</html>