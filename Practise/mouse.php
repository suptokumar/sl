<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://localhost/js/jquery.js?v"></script>
	<title>Document</title>
</head>
<body>
	<div id="mouse_move"></div>
	<div id="mouse_out"></div>
	<div id="mouse_up"></div>
</body>
<script>
$(function() {
$('html').on('mousedown touchstart', slideStart);
  $('html').on('mouseup touchend', slideEnd);
  $('html').on('mousemove touchmove', slide);
});
var s = 0;
function slideStart(event){
	s = event.clientX;
$("#mouse_move").html(event.clientX);
}

function slideEnd(event) {
	if (s<event.clientX) {
$("#mouse_up").html("Right");
	}else{
$("#mouse_up").html("Left");
	}
$("#mouse_out").html(event.clientX);
}
</script>
</html>