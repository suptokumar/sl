<?php 
include '../db.php';
$sql = "SELECT datetime,id,SUM(total_amount),SUM(paid_amount),SUM(ticket+visa+transport+rent+food+other) FROM hajj WHERE hide=1 GROUP BY month(datetime), year(datetime) ORDER BY id DESC";
$m = mysqli_query($db,$sql);
?>
<table class="input_table res2">
	<tr>
		<td>Date</td>
		<td>Total Amount</td>
		<td>Paid Amount</td>
		<td>Costs</td>
		<td>Profits</td>
		<td>More Info</td>
	</tr>
	<?php if (mysqli_num_rows($m)==0): ?>
		<tr>
			<td colspan="6" style="text-align: center;">Nothing Found</td>
		</tr>
	<?php endif ?>
<?php
while($r = mysqli_fetch_array($m)){
?>
<tr>
	<td><?php echo date("M Y",strtotime($r['datetime'])) ?></td>
	<td><?php echo $r['SUM(total_amount)'] ?> Taka</td>
	<td><?php echo $r['SUM(paid_amount)'] ?> Taka</td>
	<td><?php echo $r['SUM(ticket+visa+transport+rent+food+other)'] ?> Taka</td>
	<td><?php echo $r['SUM(paid_amount)']-$r['SUM(ticket+visa+transport+rent+food+other)'] ?> Taka</td>
	<td><button class="button" onclick="open_report(<?php echo $r['id'] ?>)">Open</button></td>
</tr>
<?php
}
?>
</table>