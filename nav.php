<?php 
include_once 'functions.php';
echo '<header class="h_m">';
echo '<div class="loader"></div>';
echo '<div class="logo">';
echo '<a href="'.return_domain("").'">';
echo '<img src="'.return_domain("/img/text.png").'" alt="PaiPixel"><br>';
echo '<span>Learn With Fun</span>';
echo '</a>';
echo '</div>';

echo '<div class="link">';
echo '<nav class="cf">';
echo '<ul class="nav">';
echo '<li><a href="'.return_domain("/join").'" class="active">Join</a></li>';
echo '<li class="auto_hide"><a href="'.return_domain("/ask_question").'">Ask Questions</a></li>';
echo '<li class="auto_hide"><a href="'.return_domain("/carrer").'">Carrer</a></li>';
echo '<li><a href="javascript:void(0)" id="drop_down">Services<span class="material-icons masiv_icon"> keyboard_arrow_down </span></a>';
echo '<ul class="drop drop1">';
echo '<li><a href="'.return_domain("/exams").'">Live Exam</a><li>';
echo '<li><a href="'.return_domain("/team_exam").'">Team Exam</a><li>';
echo '<li><a href="'.return_domain("/challenge").'">Live Challenge</a><li>';
echo '<li><a href="'.return_domain("/admission").'">Admission Test</a><li>';
echo '<li><a href="'.return_domain("/jobs").'">PaiPixel Jobs</a><li>';
echo '<li><a href="'.return_domain("/english").'">PaiPixel English</a><li>';
echo '</ul>';
echo '</li>';

echo '<li><a href="javascript:void(0)" id="drop_down">Cources<span class="material-icons masiv_icon"> keyboard_arrow_down </span></a>';
echo '<ul class="drop drop2">';
echo '<li><a href="'.return_domain("/primary").'">Primary Education</a><li>';
echo '<li><a href="'.return_domain("/course").'">High School & College</a><li>';
echo '<li><a href="'.return_domain("/univercity").'">Univercity</a><li>';
echo '<li><a href="'.return_domain("/programming").'">Programming</a><li>';
echo '<li><a href="'.return_domain("/outsourcing").'">Out sourcing</a><li>';
echo '</ul>';
echo '</li>';
echo '</ul>';
echo '</nav>';

echo '</div>';
echo '</header>';
?>
