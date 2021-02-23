<html>

<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="brain.colorhack.css?vs=2">
	<title>Color Match</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://www.paipixel.com/js/jquery.js"></script>

<script>
function translated(t){
	if (t.innerHTML=="Show Bangla") {
		t.innerHTML="Show English";
		document.getElementById('en').style.display='none';
		document.getElementById('bangla').style.display='block';
	}else{
		t.innerHTML="Show Bangla";
		document.getElementById('bangla').style.display='none';
		document.getElementById('en').style.display='block';
	}
}
<?php
		$db = mysqli_connect("localhost","paipixel_game","Sk571960","paipixel_game") or die("DB is not available");
		$dbs = mysqli_connect("localhost","paipixel_supto","Sk571960","paipixel_real") or die("DB is not available");
	 if (isset($_GET['user'])) {
		$user = $_GET['user'];
?>

function play(){
$(".game_side").css('display', 'block');
var gt = get_rid();
var t2 = get_rid();
$(".game_side .tarminal.t1").html(gt[0]);
$(".game_side .tarminal.t2").css('color', gt[1]);
$(".game_side .tarminal.t2").html(t2[0]);
$("#sdfjdofj").val(gt[2]);
run_time(120);
}
var x = "";
function run_time(dt){
	// Set the date we're counting down to
var countDownDate = new Date().getTime();
countDownDate = countDownDate + (dt*1000);
// Update the count down every 1 second
x = setInterval(function() {
  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
$("#sddfsadf").val(1);
	$(".soraa").html($(".scored4").html());
	var cc = Math.floor(Number($(".scored4").html()/10));
	if(cc>0){
		cc = "+"+cc;
	}
	$(".sorcc").html(cc);
	$(".scored4").html("0");
	$("#sdfjdofj").val("");
	$(".game_res").css('display', 'block');
	submit_game("<?php echo $user ?>",cc,Number($(".soraa").html()));
	resque();

    
  }else{
  	$(".time4").html((distance/1000).toFixed(0)+"s");
    }

}, 1);
}

function rematch(){
$(".game_res").slideUp('fast');
$("#werdfsdfds").val('0');
$("#d1d0d40").html("2 lifes");
clearInterval(x);
$(".scored4").html("0");
play();
}
function submit_game(user,cc,score){
	$.ajax({
		url: 'db.php',
		type: 'POST',
		data: {user: user, cc:cc, score:score, db1000112:score},
	})
	.done(function(data) {
		console.log(data);
	});
	
}

function submit(result){
	var ans = $("#sdfjdofj").val();
	var score = Number($(".scored4").html());
	if (ans==result) {
		score +=1;
		show_res(1);
	}else{
		show_res(0);
		$("#werdfsdfds").val(Number($("#werdfsdfds").val())+1);
		if((2-Number($("#werdfsdfds").val()))>1){
			$("#d1d0d40").html(2-Number($("#werdfsdfds").val())+" lifes");
		}else{
			$("#d1d0d40").html(2-Number($("#werdfsdfds").val())+" life");
		}
		if(Number($("#werdfsdfds").val())==2){
			clearInterval(x);
			
			$("#sddfsadf").val(1);
			$(".soraa").html($(".scored4").html());
			var cc = Math.floor(Number($(".scored4").html()/10));
			if(cc>0){
				cc = "+"+cc;
			}
			$(".sorcc").html(cc);
			$(".scored4").html("0");
			$("#sdfjdofj").val("");
			$(".game_res").css('display', 'block');
			submit_game("<?php echo $user ?>",cc,Number($(".soraa").html()));
			resque();
			setTimeout(new_area(),2000);
			return;
		}

	}
	if (score>0) {
		$(".scored4").html("+"+score);
	}else{
		$(".scored4").html(score);
	}
	setTimeout(new_area(),2000);
}
function new_area(){
var gt = get_rid();
var t2 = get_rid();
$(".game_side .tarminal.t1").html(gt[0]);
$(".game_side .tarminal.t2").css('color', gt[1]);
$(".game_side .tarminal.t2").html(t2[0]);
$("#sdfjdofj").val(gt[2]);
$(".game_side .tarminal").fadeIn("fast");
$(".game_side .tarminal.ans").fadeOut(0);
}
function show_res(val){
	var res = $(".game_side .tarminal.ans");
	if (val==1) {
		$(".game_side .tarminal").slideUp("slow");
		res.fadeIn('slow');
		res.html('Correct');
		res.css({'background':"green","color":"white"});
	}else{
		$(".game_side .tarminal").slideUp("slow");
		res.fadeIn('slow');
		res.html('Wrong');
		res.css({'background':"Red","color":"white"});
	}
}
function get_rid(){
	var array = [
	           ["Black","black",1],["Green","green",1],["Blue","blue",1],["Red","red",1],["Yellow","#ffe037",1],
			   ["Black","black",1],["Black","green",0],["Black","blue",0],["Black","#ffe037",0],["Black","red",0],
	           ["Yellow","black",0],["Yellow","green",0],["Yellow","blue",0],["Yellow","#ffe037",1],["Yellow","red",0],
	           ["Green","black",0],["Green","green",1],["Green","blue",0],["Green","#ffe037",0],["Green","red",0],
	           ["Blue","black",0],["Blue","green",0],["Blue","blue",1],["Blue","#ffe037",0],["Blue","red",0],
	           ["Black","black",1],["Green","green",1],["Blue","blue",1],["Red","red",1],["Yellow","#ffe037",1],
	           ["Red","black",0],["Red","green",0],["Red","blue",0],["Red","#ffe037",0],["Red","red",1],
	           ["Black","black",1],["Green","green",1],["Blue","blue",1],["Red","red",1],["Yellow","#ffe037",1],
	           ];

    var rand = Math.floor(Math.random() * array.length);
    return array[rand];
}
<?php
	} ?>
function resque(){
	$.ajax({
		url: 'db.php',
		type: 'POST',
		data: {asdf45: 'value1', user: '<?php echo $user ?>'},
	})
	.done(function(data) {
		var got = JSON.parse(data);
		$(".v5").html(got[0]);
		$(".v6").html(got[1]);
		$(".v7").html(got[2]);
		$(".answertips").html('Best Score: '+got[1]+"<br> Try More to Earn More CC.")
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}
function back_home(){
$(".game_side").fadeOut('slow');
$(".game_res").fadeOut('slow');
$("#werdfsdfds").val('0');
$("#d1d0d40").html("2 lifes");
clearInterval(x);
$(".scored4").html("0");
$(".game_user").slideUp('slow');
$(".open_dir").css('display','none');
$(".close_dir").css('display','none');
$("#userasdf").val('<?php echo $user ?>');
resque();
}
function texton(v){
	$.ajax({
		url: 'db.php',
		type: 'POST',
		data: {sdv45: 'value1', v: v},
	})
	.done(function(data) {
		$(".ebl_lin").html(data)
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	$(".game_user").css('display', 'block');
}
function open_dirg(d,v){
	$.ajax({
		url: 'db.php',
		type: 'POST',
		data: {sdvasdf45: 'value1', v: v,user: d},
	})
	.done(function(data) {
		$(".ebl_ling").html(data)
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	$(".open_dir").css('display', 'block');
	$("#userasdf").val(d);
}

function acitve_user(v){
	$.ajax({
		url: 'db.php',
		type: 'POST',
		data: {sdaasddf: 'value1', v: v},
	})
	.done(function(data) {
		$(".sgasfasd").html(data)
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	$(".close_dir").css('display', 'block');
}

</script>
</head>
<body>
<style>
	.blog div{
		animation: dp .3s;
	}
	@keyframes dp {
		from {
			filter: blur(100px);
		}
		to {
			filter: blur(0px);
		}
	}
	@keyframes drop_top {
		from {
			filter: blur(100px);
			top: 200px;
		}
		to {
			filter: blur(0px);
			top: 0px;
		}
	}
	@keyframes drop_box {
		from {
			filter: blur(100px);
			left: 200px;
		}
		to {
			filter: blur(0px);
			left: 0px;
		}
	}
</style>
<div class="game_room" style="position: relative;">
<div class="game_thumbnail">
	<img src="br.jpg" alt="">
</div>
<div class="game_name">
	<h2>Color Match	</h2>
	<p>Categories: Brain Games</p>
</div>

<div class="descr">
	<div class="header">How To Play <button onclick="translated(this)">Show Bangla</button></div>
	<div class="blog">
		<div class="en" id="en">
		You will get two boxes written two color names. The Top Box is called "Meaning" and The Bottom Box is called "Text Color". <br>
		Press <b>Yes</b> if the "Text Color"'s color matches with "Meaning", Press <b>No</b> otherwise.
		</div>
		<div class="bangla" id="bangla" style="display: none;">
			আপনাকে দুইটা বক্স দেওয়া হবে যেখানে দুইটা রং এর নাম দেওয়া থাকবে। উপরের বক্সটিকে বলা হয় "Meaning"  এবং নিচের বক্সটিকে বলা হয় "Text Color".<br> <b>Yes</b> বাটনে প্রেস করুন যদি "Text Color" এর রং "Meaning" এর সাথে মিলে যায়, অন্যথায় <b>No</b> প্রেস করুন। 
		</div>
	</div>



	<input type="hidden" id="sdfjdofj" value="">
	<input type="hidden" id="werdfsdfds" value="0">



	<div class="multi_content">
		<?php 
$sql = "SELECT score FROM colorhack WHERE user='$user' ORDER BY score DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$rv = mysqli_fetch_array($m); 

$sql = "SELECT score, user FROM colorhack ORDER BY score DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$rd = mysqli_fetch_array($m); 


$sql = "SELECT id FROM user WHERE active>(DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 13 HOUR)-10)";
$m = mysqli_query($dbs,$sql);
$rvs = mysqli_num_rows($m); 
		?>
		<div class="part_maker" onclick="open_dirg(document.getElementById('userasdf').value,'')">
			<h2 class="point v5"><?php if($rv[0]==''){echo "0";}else{echo $rv[0];} ?></h2>
			<p>Your Max Score</p>
		</div>
		<div class="part_maker" onclick="texton('')">
			<h2 class="point v6"><?php if($rd[0]==''){echo "No max scorer";}else{echo $rd[1]."(".$rd[0].")";} ?></h2>
			<p>Max Scorer</p>
		</div>
		<div class="part_maker" onclick="acitve_user('')">
			<h2 class="point v7"><?php echo $rvs; ?></h2>
			<p>Online Player</p>
		</div>
	</div>
	<div class="play_button">
		<?php if (isset($_GET['user'])) {
?>
		<button onclick="play()">Start Game</button>
<?php
}else{
	?>
		<button onclick="window.location = 'https://www.paipixel.com/login'">Login To Play Game</button>
	<?php
}
 ?>
	</div>
</div>

<div class="game_side" style="position: absolute;z-index: 1;  display:none;animation: drop_top .4s; top: 0;height;height: 100%;width: 100%;background: url(woodbg.jpg) 0 0/ 100% 100% #202020;">
	<header style="width: 100%; background: #222222; color: white; padding: 20px 10px; overflow: hidden;">
	<a href="javascript:void(0)" onclick="back_home()" style="color: white; text-shadow: 1px 1px 1px green; text-decoration: none; font-size: 20px;"> <span style="text-shadow: none;">⬅️</span>Exit</a>
	<span style="float: right; padding: 2px; font-size: 20px; margin-right: 20px;">Time Left: <span class="timl time4" style="color: red;width: 42px;display: inline-block;">0s</span></span>
	<span style="float: right; padding: 2px; font-size: 20px; margin-right: 20px;">Score: <span class="timl scored4" style="color: #01ff70;">0</span></span>
	</header>

	<div class="game_tarminal">
		<div class="sign sign1">Meaning</div>
		<div class="tarminal t1">Yellow</div>
		<div class="tarminal ans" style="height: 92px;line-height: 92px; display: none;"></div>
		<div class="tarminal t2">Yellow</div>
		<div class="sign sign2">Text Color</div>
		<div class="answertips">You have <span id="d1d0d40" style="font-weight: bold">2 lifes</span>. A wrong answer will cost a life.</div>
	</div>

	<div class="footer">
		<button onclick="submit(1)">Yes</button>
		<button onclick="submit(0)">No</button>
	</div>
</div>










<div class="game_res" style="position: absolute; display: none; z-index: 5; animation: drop_top .4s; top: 0;height;height: 100%;width: 100%;background: url(a1.gif) 0 0/ 100% 100% #202020;">
	<header style="width: 100%; background: #222222; color: white; padding: 20px 10px; overflow: hidden;">
	<a href="javascript:void(0)" onclick="back_home()" style="color: white; text-shadow: 1px 1px 1px green; text-decoration: none; font-size: 20px;"> <span style="text-shadow: none;">⬅️</span>Exit</a>
	<span style="padding: 2px; font-size: 29px; margin-right: ; color: yellow;width: 71%;text-align: center;display: inline-block;">Your Result</span>
	</header>

	<div class="game_tarminal">
		<div class="tarminal t1" style="background: none; color: yellow; border: none;">Your Score: <span class="soraa"></span></div>
		<div class="tarminal t2" style="background: none; color: yellow; border: none;">Earned CC: <span class="sorcc"></span></div>
		<div class="answertips">Hope You Enjoyed This Match!</div>
	</div>

	<div class="footer">
		<button onclick="back_home()">Home</button>
		<button onclick="rematch();">Rematch</button>
	</div>
</div>





<div class="game_user" style="position: absolute; display: none; z-index: 2; animation: drop_top .4s; top: 0;height;height: 100%;width: 100%;background: url(a1.gif) 0 0/ 100% 100%;">
	<header style="width: 100%; background: #222222; color: white; padding: 20px 10px; overflow: hidden;">
	<a href="javascript:void(0)" onclick="back_home()" style="color: white; text-shadow: 1px 1px 1px green; text-decoration: none; font-size: 20px;"> <span style="text-shadow: none;">⬅️</span>Exit</a>
	<span style="padding: 2px; font-size: 26px; margin-right: ; color: yellow;width: 71%;text-align: center;display: inline-block;">Score Board</span>
	</header>

	<div class="game_linear_list">
		<input type="text" id="txont" autocomplete="off" placeholder="Search by username" style="width: 100%; padding: 12px 2%; font-size: 20px; background: #fff" name="texton" onkeyup="texton(this.value)"> <div class="linear">
			<div class="ebl_lin" style=" overflow: auto; height: 415px;">

			</div>
		</div>
	</div>

	<div class="footer">
		<button onclick="back_home()">Home</button>
		<button onclick="open_dirg('<?php echo $user ?>','');">My Scoreboard</button>
	</div>
</div>



<div class="open_dir" id="open_dir" style="position: absolute; display: none; z-index: 2; animation: drop_box .4s; top: 0;height;height: 100%;width: 100%;background: url(a1.gif) 0 0/ 100% 100%;">
	<header style="width: 100%; background: #222222; color: white; padding: 20px 10px; overflow: hidden;">
	<a href="javascript:void(0)" onclick="document.getElementById('open_dir').style.display='none'" style="color: white; text-shadow: 1px 1px 1px green; text-decoration: none; font-size: 20px;"> <span style="text-shadow: none;">⬅️</span>Back</a>
	<span style="padding: 2px; font-size: 26px; margin-right: ; color: yellow;width: 71%;text-align: center;display: inline-block;">Score Board</span>
	</header>

	<div class="game_linear_list">
		<input type="hidden" id="userasdf" value="<?php echo $user ?>">
		<input type="date" autocomplete="off" id="txont" placeholder="Search by username" style="width: 100%; padding: 12px 2%; font-size: 20px; background: #fff" name="texton" onchange="open_dirg(document.getElementById('userasdf').value,this.value)"> <div class="linear">
			<div class="ebl_ling" style=" overflow: auto; height: 415px;">

			</div>
		</div>
	</div>

	<div class="footer">
		<button onclick="document.getElementById('open_dir').style.display='none'">Back</button>
		<button onclick="back_home()">Home</button>
	</div>
</div>



<div class="close_dir" id="close_dir" style="position: absolute; display: none; z-index: 1; animation: drop_box .4s; top: 0;height;height: 100%;width: 100%;background: url(a1.gif) 0 0/ 100% 100%;">
	<header style="width: 100%; background: #222222; color: white; padding: 20px 10px; overflow: hidden;">
	<a href="javascript:void(0)" onclick="document.getElementById('close_dir').style.display='none'" style="color: white; text-shadow: 1px 1px 1px green; text-decoration: none; font-size: 20px;"> <span style="text-shadow: none;">⬅️</span>Back</a>
	<span style="padding: 2px; font-size: 26px; margin-right: ; color: yellow;width: 71%;text-align: center;display: inline-block;">Active Users</span>
	</header>

	<div class="game_linear_list">
		<input type="date" autocomplete="off" id="txont" placeholder="Search by username" style="width: 100%; padding: 12px 2%; font-size: 20px; background: #fff" name="texton" onchange="acitve_user(this.value)"> <div class="linear">
			<div class="sgasfasd" style=" overflow: auto; height: 415px;">

			</div>
		</div>
	</div>

	<div class="footer">
		<button onclick="document.getElementById('close_dir').style.display='none'">Back</button>
		<button onclick="back_home()">Home</button>
	</div>
</div>


</div>

</body>
</html>