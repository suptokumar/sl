<?php 
include '../db.php';
$id = $_POST['id'];
$sql = "SELECT * FROM dhar_nin WHERE id='$id'";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);
$gid = $row['gid'];
$user = $row['user'];
$phone = $row['phone'];

$sql = "SELECT * FROM dhar_nin_copy WHERE gid='$gid' AND user='' AND phone=''";
$m  = mysqli_query($db,$sql);
if (mysqli_num_rows($m)==0) {
	echo "No editing Detail Found";
} else {
?>
<table class="input_table res1">
	<tr>
		<td>Date</td>
		<td>Reseted Total Amount</td>
		<td>Reseted Paid Paid</td>
		<td>Editor</td>
		<td>Description</td>
	</tr>
<?php
while($row = mysqli_fetch_array($m)) {
	
	?>
<tr>
	<td><?php echo date("h:ia, d M Y", strtotime($row['date'])) ?></td>
	<td><?php echo $row['amount'] ?> Taka</td>
	<td><?php echo $row['paid'] ?> Taka</td>
	<td><?php echo $row['adder'] ?></td>
	<td><?php echo $row['des'] ?></td>
</tr>
	<?php
}
?>
</table>
<?php 
}


?>

<h2 style="background: lightyellow; text-align: center;">Payments:</h2>

<?php 
$sql = "SELECT * FROM dhar_nin_copy WHERE new=1 AND user='$user' AND phone='$phone'";
$m  = mysqli_query($db,$sql);
if (mysqli_num_rows($m)==0) {
	echo "No editing Detail Found";
} else {
?>
<table class="input_table res1">
	<tr>
		<td>Date</td>
		<td>Total Amount</td>
		<td>Total Paid Amount</td>
		<td>Date</td>
		<td>Collector</td>
		<td>Print</td>
	</tr>
<?php
while($row = mysqli_fetch_array($m)) {
	
	?>
<tr>
	<td><?php echo date("h:ia, d M Y", strtotime($row['date'])) ?></td>
	<td><?php echo $row['amount'] ?> Taka</td>
	<td><?php echo $row['paid'] ?> Taka</td>
	<td><?php echo ($row['amount'])-($row['paid']) ?> Taka</td>
	<td><?php echo $row['adder'] ?></td>
	<td><a href="print_dhar_din.php?cid=<?php echo $row['id'] ?>" target="_blank" class="button blue">🖨️ print</a></td>
</tr>
	<?php
}
?>
</table>
<?php 
}
