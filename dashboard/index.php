<?php 
include '../db.php';
if (!isset($_SESSION['ms'])) {
	header("Location: ../login.php");
} else {
	$ms = $_SESSION['ms'];
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Teenandtakey - The ultimate software</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/menu.css<?php echo $lock ?>">
</head>
<body>
<nav class="nav">

<ul>
  <li><a class="active" href="index.php">চালনার অনুমতিপত্র</a></li>
  <li><a href="hajj.php">হজ</a></li>
  <?php if (user_detail("role",$ms)==2) {
  	?>

  <li><a href="daily.php">দৈনিক খরচ</a></li>
  <li><a href="dhar_din.php">ধার দিন</a></li>
  <li><a href="dhar_nin.php">ধার নিন</a></li>
  	<?php 
  } ?>
  <li style="float: right; background: #9B0007;" class="logout"><a style="color: white;" href="../logout.php">প্রস্থান</a></li>
</ul>
</nav>
<div class="container">
  <table class="link_table">
    <tr>
      <td></td>
      <td><a class="link right" href="index.php">নতুন অনুমতিপত্র সংযোজন</a><a class="link right" href="index_report.php">পুরাতন অনুমতিপত্র দেখুন</a></td>
    </tr>
  </table>

  <?php 
if (isset($_POST['submit'])) {
  $serial = $_POST['serial'];
  $issue_date = $_POST['issue_date'];
  $dctb = $_POST['dctb'];
  $dctb_date = $_POST['dctb_date'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $class = $_POST['class'];
  $r_name = $_POST['r_name'];
  $r_phone = $_POST['r_phone'];
  $type = $_POST['type'];
  $total = $_POST['total'];
  $paid = $_POST['paid'];
  $description = $_POST['description'];
  $adder = user_detail("user",$ms);
  $date = date("Y-m-d H:i:s");
  $gid= time();
  $sql = "INSERT INTO `drive_copy` (`id`, `serial`, `issue`, `DCTB`, `DCTB_date`, `name`, `phone`, `r_name`, `r_phone`, `type`, `v_class`, `total_amount`, `paid_amount`, `description`, `hide`, `datetime`, `adder`, `pre`, `new`, `g_id`) VALUES (NULL, '$serial', '$issue_date', '$dctb', '$dctb_date', '$name', '$phone', '$r_name', '$r_phone', '$type', '$class', '$total', '$paid', '$description', '0', '$date', '$adder', '0', '0', '$gid')";
  mysqli_query($db,$sql);
  $sql = "INSERT INTO `drive` (`id`, `serial`, `issue`, `DCTB`, `DCTB_date`, `name`, `phone`, `r_name`, `r_phone`, `type`, `v_class`, `total_amount`, `paid_amount`, `description`, `hide`, `datetime`, `adder`, `g_id`, `file_brta`) VALUES (NULL, '$serial', '$issue_date', '$dctb', '$dctb_date', '$name', '$phone', '$r_name', '$r_phone', '$type', '$class', '$total', '$paid', '$description', '0', '$date', '$adder', '$gid', 'No')";
  if (mysqli_query($db,$sql)) {
    ?>
<div class="ani_top success">সংযোজন হয়েছে। <a href="print_invoice.php?gid=<?php echo $gid ?>">প্রিন্ট করতে এখানে ক্লিক করুন</a></div>
    <?php
  }
}

  ?>

  <form action="" method="POST">
    
  <table class="input_table">
    <tr>
      <td>Serial Number</td>
      <td>
        <?php 
$sql = "SELECT `serial` FROM drive ORDER BY `serial` DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);
$new  = (($row[0])+1);
        ?>
        <input type="text" name="serial" autocomplete="off" class="input bordered" value="<?php echo $new ?>">
      </td>
    </tr>
  <tr>
      <td>Learner issue date</td>
      <td>
        <input type="date" name="issue_date" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>DCTB</td>
      <td>
        <input type="text" name="dctb" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>DCTB date</td>
      <td>
        <input type="date" name="dctb_date" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Name</td>
      <td>
        <input type="text" name="name" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Phone Number</td>
      <td>
        <input type="text" name="phone" autocomplete="off" class="input bordered">
      </td>
    </tr>
  </table>
  <table class="input_table">
    <tr>
      <td>Refference Name</td>
      <td>
        <input type="text" name="r_name" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Refference Phone Number</td>
      <td>
        <input type="text" name="r_phone" autocomplete="off" class="input bordered">
      </td>
    </tr>
  </table>
  <table class="input_table">
  <tr>
      <td>License Type</td>
      <td>
        <select name="type" class="input bordered">
          <option value="Non-professional">Non-professional</option>
          <option value="Professional">Professional</option>
        </select>
      </td>
    </tr>
  <tr>
      <td>Vehicle Class</td>
      <td>
        <select name="class" class="input bordered">
          <option value="Motorcycle">Motorcycle</option>
          <option value="Light">Light</option>
          <option value="Motorcycle and Light">Motorcycle and Light</option>
        </select>
      </td>
    </tr>
  <tr>
      <td>Total Amount</td>
      <td>
        <input type="text" name="total" autocomplete="off" onkeyup="document.getElementById('due').value=(document.getElementById('total').value-document.getElementById('paid').value)" id="total" class="input bordered">
      </td>
    </tr>
  <tr>  <tr>
      <td>Paid Amount</td>
      <td>
        <input type="text" name="paid" autocomplete="off" onkeyup="document.getElementById('due').value=(document.getElementById('total').value-document.getElementById('paid').value)" id="paid" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Due amount</td>
      <td>
        <input type="text" disabled name="due" id="due" class="input bordered">
      </td>
    </tr>
    <tr>
      <td>Description</td>
      <td>
        <textarea name="description" class="input bordered" spellcheck></textarea>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input name="submit" type="submit" class="submit" value="Submit">
      </td>
    </tr>
  </table>
  </form>
</div>
</body>
</html>
