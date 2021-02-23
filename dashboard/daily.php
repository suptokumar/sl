<?php 
include '../db.php';
if (!isset($_SESSION['ms'])) {
	header("Location: ../login.php");
} else {
	$ms = $_SESSION['ms'];
}
if (user_detail("role",$ms)!=2) {
  header("Location: index.php");
}
 ?>
 <!DOCTYPE html>
<html>
<head>
  <title>Teenandtakey - The ultimate software</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/menu.css<?php echo $lock ?>">
  <script src="css/jquery.js"></script>
  <script src="ui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="ui/jquery-ui.min.css">
</head>
<body>
<nav class="nav">

<ul>
  <li><a href="index.php">চালনার অনুমতিপত্র</a></li>
  <li><a href="hajj.php">হজ</a></li>
  <?php if (user_detail("role",$ms)==2) {
  	?>

  <li><a class="active" href="daily.php">দৈনিক খরচ</a></li>
  <li><a href="dhar_din.php">ধার দিন</a></li>
  <li><a href="dhar_nin.php">ধার নিন</a></li>
  <li style="float: right; background: #9B0007;" class="logout"><a style="color: white;" href="../logout.php">প্রস্থান</a></li>
  	<?php 
  } ?>
</ul>
</nav>
<div class="container">

  <?php 
if (isset($_POST['submit'])) {
  
  $name = $_POST['name'];
  $amount = $_POST['total'];
  $description = $_POST['description'];
  $adder = user_detail("user",$ms);
  $date = date("Y-m-d H:i:s");
  $gid= time();
  $sql = "INSERT INTO `daily` (`id`, `amount`, `name`, `des`, `date`) VALUES (NULL, '$amount', '$name', '$description', '$date') ";
  if (mysqli_query($db,$sql)) {
    ?>
<div class="ani_top success">সংযোজন হয়েছে।</div>
    <?php
  }
}

  ?>
  <form action="" method="POST">
    
  <table class="input_table">
    <tr>
      <td>Expense Name</td>
      <td>
        <input type="text" name="name" autocomplete="off" class="input bordered">
      </td>
    </tr>
  <tr>
      <td>Total Amount</td>
      <td>
        <input type="text" name="total" autocomplete="off" id="total" class="input bordered">
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
<div class="container" style="border: 1px solid #ccc;">
  <table class="link_table" style="text-align: center;">
    <tr>
      <td>
        <div class="dts" style="float: left; padding: 8px 6px; border-radius: 10px; border: 1px solid lightblue; background: lightblue; margin-right: 4px;">
          Showing Todays Expense <br>
          <strong>0 Taka</strong>
        </div>
        <input type="text"  onchange="open_drive(1); " onkeyup="open_drive(1); " placeholder="search" id="search" style="padding: 10px; border: 1px solid #ccc;">
      </td>
      <td>
        <input type="date"  onchange="open_drive(1); " id="from" style="padding: 10px; border: 1px solid #ccc;"> to
        <input type="date"  onchange="open_drive(1); " id="to" style="padding: 10px; border: 1px solid #ccc;">
      </td>
    </tr>
  </table>
  <div class="dt"></div>
</div>
<script>
  $(document).ready(function() {
    open_drive(1);
  });
  function open_drive(page)
    {
      var search = $.trim($("#search").val());
      var from = $("#from").val();
      var to = $("#to").val();

      $.ajax({
        url: 'ajax.expense_list.php',
        type: 'POST',
        data: "search="+search+"&from="+from+"&to="+to+"&page="+page,
      })
      .done(function(data) {
        $(".dt").html(data);

        $(".dts").html($(".htdocs1").html());

      
      });
      
    }
    function edit(id)
    {
      $.ajax({
        url: 'ajax.daily.edit.php',
        type: 'POST',
        data: "id="+id,
      })
      .done(function(data) {
        $(".dt").html(data);
      });
    }
function deletes(id)
    {
      $(".delete").html("আপনি কি সত্যি এই ফাইলটি ডিলিট করতে চান ?");
      $(".delete").dialog({
        open: true,
        modal: true,
        title: "Confirmation",
        buttons:{
          "Yes":function(){
            $.ajax({
              url: 'delete.php',
              type: 'POST',
              data: "54d&id="+id,
            })
            .done(function(data) {
               var ret = $.parseJSON(data);
              if(ret[0]){
                $(".delete").dialog("close");
                $( "#d"+id ).effect("explode",500);
              } else {
              $(".delete").html(ret[1]);
              $(".delete").dialog({
                buttons:{
                  "ok":function(event) {
                   $(".delete").dialog("close");
                  }
                }
              });
              }
            });
            
          },
          "Cancel":function(){
            $(".delete").dialog("close");
          }
        }
      });
    }
</script>
<div class="delete"></div>
</body>
</html>
