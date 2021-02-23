 <table class="table table-bordered">
 <tr>
 	<th>Image</th>
 	<th>Name</th>
 	<th>Size</th>
 	<th>Download</th>
 	<th>Delete</th>
 </tr>
 <?php 
 $search = $_GET['search'];
 $dir = "../Dropjone/data/".$search;
$b = scandir($dir,0);
for ($i=0; $i < count($b); $i++) { 
 	
// Sort in ascending order - this is default

// Sort in descending order
if (count($b)==2) {
?>
<tr>
	<td colspan="5" style="text-align: center;">No Images in This Serial No</td>
</tr>
<?php
exit();
}
  if ($b[$i]=='.' || $b[$i]=='..') {
    
} else {
  ?>
<tr>
	<td><img src="data/<?php echo $search ?>/<?php echo $b[$i] ?>" style="width: 150px"></td>
	<td><?php echo $b[$i] ?></td>
	<td><?php if(filesize("data/$search/$b[$i]")>1000000){echo (number_format(filesize("data/$search/$b[$i]")/1000000,2))." MB"; } else {
		echo number_format(filesize("data/$search/$b[$i]")/1000,2)." KB";
	} ?></td>
	<td><a href="data/<?php echo $search ?>/<?php echo $b[$i] ?>" class="btn btn-success" download>Download</a></td>
	<td><a onclick="deletes('data/<?php echo $search ?>/<?php echo $b[$i] ?>')" class="btn btn-danger" download>Delete</a></td>
</tr>
    <?php
  }
 }


 ?>
 </table>
 <script>
 	function deletes(dir)
 	{
 		if (confirm("Are you sure you want to delete this image?")) {
 			$.ajax({
 				url: 'unlink.php',
 				type: 'POST',
 				data: {dir: dir},
 			})
 			.done(function(data) {
 				if ($.trim(data)=='success') {
sopen("<?php echo $search ?>");
 				} else {
 					alert("delete failed.");
 				}
 			})
 			.fail(function() {
 				console.log("error");
 			})
 			.always(function() {
 				console.log("complete");
 			});
 			
 		}
 	}
 </script>