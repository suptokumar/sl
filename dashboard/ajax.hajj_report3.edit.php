<?php 
include '../db.php';
$id = $_POST['id'];
?>

<?php 
$sql = "SELECT * FROM hajj WHERE hide=0 AND id='$id' ORDER BY id DESC LIMIT 50";
$m = mysqli_query($db,$sql);
while ($row=mysqli_fetch_array($m)) {
?>
<button class="button blue" onclick="open_drive(1)">Back</button>
<script>
	$(document).ready(function() {
		$("#m25 input,#m25 textarea,#m25 select").keyup(function(event) {
			$(".submit").removeClass('done');
  				$(".submit").removeAttr('disabled');
			$(".submit").val("Update");
		});
		$("#m25 input,#m25 textarea,#m25 select").change(function(event) {
			$(".submit").removeClass('done');
  				$(".submit").removeAttr('disabled');
			$(".submit").val("Update");
		});
	});
</script>
<form action="" id="m25">
      
  <table class="input_table width">
  <tr>
  <td>Name</td>
      <td>
        <input type="text" name="name" autocomplete="off" value="<?php echo $row['name'] ?>" class="input bordered">
      </td>
    </tr>
  <tr>
  <tr>
  <td>Address</td>
      <td>
        <input type="text" name="address" autocomplete="off" value="<?php echo $row['address'] ?>" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Phone Number</td>
      <td>
        <input type="text" name="phone" autocomplete="off" value="<?php echo $row['phone'] ?>" class="input bordered">
      </td>
    </tr>
  </table>
  <table class="input_table">
    <tr>
      <td>Passport</td>
      <td>
        <input type="text" name="passport" autocomplete="off" value="<?php echo $row['passport'] ?>" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>E-tracing Number</td>
      <td>
        <input type="text" name="tracking" autocomplete="off" value="<?php echo $row['tracking'] ?>" class="input bordered">
      </td>
    </tr>
  </table>
  <table class="input_table width">
  <tr>
      <td>Hajj Category</td>
      <td>
        <select name="type" class="input bordered">
          <option value="Hajj" <?php if ($row['type']=='Hajj') {
          	echo "selected";
          } ?>>Hajj</option>
          <option value="Omrah" <?php if ($row['type']=='Omrah') {
          	echo "selected";
          } ?>>Omrah</option>
        </select>
      </td>
    </tr>
  <tr>
      <td>Total Amount</td>
      <td>
        <input type="text" name="total" autocomplete="off" value="<?php echo $row['total_amount'] ?>" onkeyup="document.getElementById('due').value=(document.getElementById('total').value-document.getElementById('paid').value)" id="total" class="input bordered">
      </td>
    </tr>
  <tr>  <tr>
      <td>Paid Amount</td>
      <td>
        <input type="text" name="paid" autocomplete="off" value="<?php echo $row['paid_amount'] ?>" onkeyup="document.getElementById('due').value=(document.getElementById('total').value-document.getElementById('paid').value)" id="paid" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Due amount</td>
      <td>
        <input type="text" disabled name="due" id="due" class="input bordered" value="0">
      </td>
    </tr>
    <tr>
      <td>Description</td>
      <td>
        <textarea name="description" class="input bordered" spellcheck><?php echo $row['description'] ?></textarea>
      </td>
    </tr>
  </table>
<!--       <table class="input_table width">
<tr>
  <td style="background: lightgreen">Costing Detail</td>
</tr>
    <td>Ticket</td>
      <td>
        <input type="text" name="ticket" id="ticket" autocomplete="off" class="input bordered" value="<?php echo $row['ticket'] ?>">
      </td>
    </tr>
    <td>Visa</td>
      <td>
        <input type="text" name="visa" id="visa" autocomplete="off" class="input bordered" value="<?php echo $row['visa'] ?>">
      </td>
    </tr>

    <td>Transport</td>
      <td>
        <input type="text" name="transport" autocomplete="off" id="transport" class="input bordered" value="<?php echo $row['transport'] ?>">
      </td>
    </tr>
    <td>Home Rent</td>
      <td>
        <input type="text" name="rent" autocomplete="off" id="rent" class="input bordered" value="<?php echo $row['rent'] ?>">
      </td>
    </tr>
    <td>Food Cost</td>
      <td>
        <input type="text" name="food" autocomplete="off" id="food" class="input bordered" value="<?php echo $row['food'] ?>">
      </td>
    </tr>
    <td>Others</td>
      <td>
        <input type="text" name="others" autocomplete="off" id="others" class="input bordered" value="<?php echo $row['other'] ?>">
      </td>
    </tr>

  </table> -->
  <table class="input_table">
    <tr>
      <td>
      	<input type="hidden" name="2">
      	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      </td>
      <td>
        <input name="submit" type="submit" class="submit" value="Update">
        
      </td>
    </tr>
  </table>
  </form>
  <script>
  	$(document).ready(function() {
  		$("#m25").submit(function(event) {
  			var data = $(this).serialize();
  			event.preventDefault();
  			$.ajax({
  				url: 'edit.php',
  				type: 'POST',
  				data: data,
  				beforeSend:function()
  				{
  					$(".submit").addClass('process');
  					$(".submit").val("Please Wait...");
  				$(".submit").attr('disabled','disabled');
  				}
  			})
  			.done(function(data) {
  				$(".submit").removeClass('process');
  				$(".submit").addClass('done');
  				$(".submit").val(data);
  			});
  			
  		});
  	});
  </script>
<?php
}
?>
