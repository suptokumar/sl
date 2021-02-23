<?php 
include '../db.php';
$id = $_POST['id'];
$sql = "SELECT * FROM dhar_din WHERE id='$id'";
$m = mysqli_query($db,$sql);
$row  =mysqli_fetch_array($m);
?>
<form id="ftz">
<button class="button blue" onclick="open_detail('<?php echo $row['id'] ?>');">Back</button>
  
<table class="input_table ">
    <tr>
      <td>Total Amount</td>
      <td>
        <input type="text" name="total_amount" value="<?php echo $row['amount'] ?>" autocomplete="off" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Paid Amount</td>
      <td>
        <input type="text" name="paid_amount" value="<?php echo $row['paid'] ?>" autocomplete="off" class="input bordered">
      </td>
    </tr>

    <tr>
      <td>Description</td>
      <td>
        <textarea name="des" class="input bordered" spellcheck><?php echo $row['des'] ?></textarea>
      </td>
    </tr>
    <tr>
      <td><input type="hidden" name="5sdf0d"> <input type="hidden" value="<?php echo $row['gid'] ?>" name="id"></td>
      <td>
        <input name="submit" type="submit" class="submit" value="Save">
      </td>
    </tr>
  </table>
</form>
<script>
  $(document).ready(function() {
    $("#ftz").submit(function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        url: 'edit.php',
        type: 'POST',
        data: data,
      })
      .done(function(data) {
      	// alert(data);
        open_detail('<?php echo $row['id'] ?>');
      });
      
    });
  });
</script>