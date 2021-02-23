<?php
include '../db.php';
$id = $_POST['id'];
$sql = "SELECT * FROM dhar_nin WHERE id='$id' ORDER BY id DESC LIMIT 50";
$m = mysqli_query($db,$sql);
while ($row=mysqli_fetch_array($m)) {
?>
<button class="button blue" onclick="open_drive(1)">Back</button>
<form action="" id="collect_form">
	
<table class="input_table res2">
  <tr>
      <td>Name</td>
      <td>
        <?php echo $row['user'] ?>
      </td>
  </tr>
  <tr>
      <td>Phone Number</td>
      <td>
        <?php echo $row['phone'] ?>
      </td>
    </tr>
    <tr>
      <td>Total Paid Amount</td>
      <td>
        <?php echo (total_paids($row['user'],$row['phone'])) ?> Taka
      </td>
    </tr>
    <tr>
      <td>Total Due Amount</td>
      <td>
        <?php echo (total_amounts($row['user'],$row['phone']))-(total_paids($row['user'],$row['phone'])) ?> Taka
      </td>
    </tr>
    <tr>
      <td>Pay</td>
      <td>
        <input type="number" value="" class="input" autofocus id="collect" min="0" max="<?php echo (total_amounts($row['user'],$row['phone']))-(total_paids($row['user'],$row['phone'])) ?>">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="submit" value="Pay" class="submit" >
      </td>
    </tr>
  </table>

</form>
<script>
$(document).ready(function() {
	$("#collect_form").submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: 'collect.php',
			type: 'POST',
			data: "100d&&id=<?php echo $id ?>&&amount="+$("#collect").val(),
		})
		.done(function(data) {
			if ($.trim(data)=='Collected !') {
          open_drive(1);
          $("body,html").animate({
            scrollTop: 5000
          },1000);
        } else {
          alert(data);
        }
		});
		
	});
});
</script>
<?php
}