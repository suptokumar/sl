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
	<script src="css/jquery.js"></script>
	<script src="ui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="ui/jquery-ui.min.css">
	<script>
		$(document).ready(function() {
			
		});
	</script>
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
      <td style="width:60%" class="rotate"><input type="search" id="search" onchange="open_drive(1);" onkeyup="open_drive(1);" autocomplete="off" placeholder="Search..." style="padding: 10px 20px; border: 1px solid #ccc;"> <span class="os">OR</span> <input type="date" name="from" id="from" style="padding: 10px; border: 1px solid #ccc;" onchange="open_drive(1);"> <span class="os">to</span> <input type="date" name="to" id="to" onchange="open_drive(1);" style="padding: 10px; border: 1px solid #ccc;"><label for="brtafile" class="button"><input type="checkbox" onchange="open_drive(1)" id="brtafile"> Only BRTA Sent Files</label></td>
      <td><a class="link right" href="index.php">নতুন অনুমতিপত্র সংযোজন</a><a class="link right" href="index_report.php">পুরাতন অনুমতিপত্র দেখুন</a></td>
    </tr>
  </table>
  <script>
  	$(document).ready(function() {
  		open_drive(1);
  	});
  	function open_drive(page)
  	{
  		var search = $.trim($("#search").val());
  		var from = $("#from").val();
  		var to = $("#to").val();
      if ($('#brtafile').is(":checked"))
{
  check= "yes";
} else {
  check= "no";

}
  		$.ajax({
  			url: 'ajax.index_report.php',
  			type: 'POST',
  			data: "search="+search+"&from="+from+"&to="+to+"&page="+page+"&check="+check,
  		})
  		.done(function(data) {
  			$(".dt").html(data);
  		});
  		
  	}
  	function open_detail(id){
		$.ajax({
  			url: 'ajax.index_report2.php',
  			type: 'POST',
  			data: "id="+id,
  		})
  		.done(function(data) {
  			$(".dt").html(data);
  		});
  	}
    function edit(id)
    {
      $.ajax({
        url: 'ajax.index_report3.edit.php',
        type: 'POST',
        data: "id="+id,
      })
      .done(function(data) {
        $(".dt").html(data);
      });
    }
    function collect(id){
      $.ajax({
        url: 'data.php',
        type: 'POST',
        data: "1&&id="+id,
      })
      .done(function(data) {
        $(".dt").html(data);
      });
    }
  	function deletes(id)
  	{
  		$(".delete").html("আপনি কি সত্যি এই ফাইলটি ডিলিট করতে চান ? <br> Hide: আপনি এই ফাইলটি ডিলিট করলে কোন তথ্য এদিক সেদিক হবে না। <br> Delete: আপনার এই ফাইল সংক্রান্ত যাবতীয় তথ্য ডিলিট হয়ে যাবে ।");
  		$(".delete").dialog({
  			open: true,
  			modal: true,
  			title: "Confirmation",
  			buttons:{
  				"hide":function(){
  					$.ajax({
  						url: 'delete.php',
  						type: 'POST',
  						data: "1&id="+id,
  					})
  					.done(function(data) {
              var ret = $.parseJSON(data);
              if(ret[0]){
                $(".delete").dialog("close");
                $( "#p"+id ).fadeOut(500);
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
  				"delete":function(){
  					$.ajax({
  						url: 'delete.php',
  						type: 'POST',
  						data: "2&id="+id,
  					})
  					.done(function(data) {
  						 var ret = $.parseJSON(data);
              if(ret[0]){
                $(".delete").dialog("close");
                $( "#p"+id ).effect("explode",500);
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
  				"cancel":function(){
  					$(".delete").dialog("close");
  				}
  			}
  		});
  	}
  </script>
    <div class="dt">
    	

    </div>
<div class="delete" style="display: none;">
	
</div>
</div>
</body>
</html>
