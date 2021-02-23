<?php 
include_once 'functions.php';
include_once 'db.php';
echo '<div class="self">';
echo '<div class="search">';
echo '<h2><span class="pc">Looking</span> for a good Suggestion?</h2>';
echo '<p>PaiPixel is also a open platform for Student-Teacher blogging and problem solving. You can search any Blog Post, Courses, People or Resume  Here.</p>';
echo '<form action="" medhot="GET">';
echo '<input type="search" id="search5140" name="search" placeholder="Search in PaiPixel"><input type="submit" value="Search" id="submit_search">';
echo '</form>';
if(isset($_GET['search'])){
	echo "Session Started <br>";
	setcookie("loginCredentials", $_GET['search'], time()+ (86400 * 30)); // Expiring after 1 day
}
if(isset($_COOKIE['loginCredentials'])){
echo "You searched for ".$_COOKIE['loginCredentials'];
}else{
echo "Cookie Not Set";
}
echo '</div>';
echo '<div class="over_self">';
echo '<h2><span style="color: red;">More Exam</span> <span style="color: green">More Skills</span></h2>';
echo '<p>Why fear? Be a self tutor. Choose a chapter from your textbook. Judge yourself, we will help you to learn advanced.';
echo '<a href="'.return_domain("/custom").'" class="button">Start Exam Now<span class="material-icons">keyboard_arrow_right</span></a></p>';
echo '<div class="real_bar">';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam1.jpg").'">';
echo '<h2>Self Exam</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam2.jpg").'">';
echo '<h2>Live Exam</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam3.jpg").'">';
echo '<h2>Admission Test</h2>';
echo '</div>';
echo '<div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


// Top Students.
$sql = "SELECT * FROM user WHERE role=1 ORDER BY rating DESC LIMIT 20";
$m = mysqli_query($db,$sql);
echo '<div class="owl_stage owl_stage1" style="display: none;">';
echo '<h2 style="text-align: center; margin: 20px">Top Students</h2>';
echo '<div class="owl-carousel owl-theme owl-loaded">';
  echo '<div class="owl-stage-outer">';
        echo '<div class="owl-stage linker">';
        	while ($row = mysqli_fetch_array($m)) {
 echo '<div class="owl-item" onclick="window.location=\''.return_domain("/profile/".$row['user_name']).'\'" style="background:url('.return_domain("/content/".$row['image']).') 50% 0% / auto 70% no-repeat; height: 200px;  width: 280px">';
            	echo '<div style="height: 150px; width: 280px"></div>';
            	echo '<h3>'.my_name($row['user_name']).'</h3>';
            	echo '<span>'.rating($row['user_name']).'</span>';
           echo ' </div>';
        	 } 
        echo '</div>';
    echo '</div>';
echo '</div>';
echo '</div>';
// Ask Question.


echo '<div class="reback" style="background: #f9f9f9; padding: 20px">';
echo '<div class="self" style="background: #f9f9f9;">';
echo '<div class="search">';
echo '<h2><span class="pc">Problem</span> in a specific Question?</h2>';
echo '<br><p><span style="color: green; font-weight: bold;">4000+</span> Teachers are waiting for your question. Why waiting? Ask your question now. Better content, Best Learning. Want to hire the best teacher?</p>';
echo '<a href='.return_domain("/ask_question").' class="buttons">Ask Question Now<span class="material-icons masiv_icon"> keyboard_arrow_right </span></a>';
echo '</div>';
echo '<div class="over_self">';
echo '<h2>Learn with <span style="color: green">PaiPixel Courses</span></h2>';
echo '<br><p>PaiPixel uses <strong style="font-weight: bold !important;">Topic Specific</strong> courses for students. Also one can have a full course of a specific subject with live help. Our explained courses will help you to be beginner to expert.';
echo '<a href="'.return_domain("/course").'" class="button">Try Courses now <span class="material-icons">keyboard_arrow_right</span></a></p>';
echo '<div class="real_bar">';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam1.jpg").'">';
echo '<h2>Primary Education</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam2.jpg").'">';
echo '<h2>High School & College</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam3.jpg").'">';
echo '<h2>Univercity</h2>';
echo '</div>';
echo '<div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
// Ask Question.


echo '<div class="reback" style="background: #f9f9f9; padding: 20px">';
echo '<div class="self" style="background: #f9f9f9;">';
echo '<div class="over_self" style="width: 100%; text-align: center;">';
echo '<h2>What about <span style="color: green">Team Exam</span> ?</h2>';
echo '<br><p>Every one loves <strong style="font-weight: bold !important;">Team work.</strong> If you are a student, You might taken help your classmate or friend. Even did you challenged your friend for a debate or Short Question? Every student loves to share what he/she knows and also loves to know how much he/she skilled on the topic. Considering this, PaiPixel Started a Team Exam system for students.';
echo '<a href="'.return_domain("/faq/team_exam").'" class="button">Learn More <span class="material-icons">keyboard_arrow_right</span></a></p>';
echo '<div class="real_bar">';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam1.jpg").'">';
echo '<h2>Join A Team</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam2.jpg").'">';
echo '<h2>Pending Challenges</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam3.jpg").'">';
echo '<h2>Previous Exams</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam3.jpg").'">';
echo '<h2>Current Exams</h2>';
echo '</div>';
echo '<div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

// Top Teachers.
$sql = "SELECT * FROM user WHERE role=2 ORDER BY rating DESC LIMIT 20";
$m = mysqli_query($db,$sql);
echo '<div class="owl_stage owl_stage1" style="display: none;">';
echo '<h2 style="text-align: center; margin: 20px">Top Teachers</h2>';
echo '<div class="owl-carousel owl-theme owl-loaded">';
  echo '<div class="owl-stage-outer">';
        echo '<div class="owl-stage linker">';
            while ($row = mysqli_fetch_array($m)) {
 echo '<div class="owl-item" onclick="window.location=\''.return_domain("/profile/".$row['user_name']).'\'" style="background:url('.return_domain("/content/".$row['image']).') 50% 0% / auto 70% no-repeat; height: 200px;  width: 280px">';
                echo '<div style="height: 150px; width: 280px"></div>';
                echo '<h3>'.my_name($row['user_name']).'</h3>';
                echo '<span>'.rating($row['user_name']).'</span>';
           echo ' </div>';
             } 
        echo '</div>';
    echo '</div>';
echo '</div>';
echo '</div>';

// Confuse All.


echo '<div class="reback" style="background: #effaff; padding: 20px; margin-top: 20px;">';
echo '<div class="self" style="background: #effaff;">';
echo '<div class="search">';
echo '<h2><span class="pc">Skills</span> are important?</h2>';
echo '<br><p>You know much but don\'t know how to apply? Tensed about the future? What will happen if anyone ask you? If someday you really need to answer something? Why fare if exam is <span style="color: green; font-weight: bold;">Like a Game</span>? Rating and live score will let you know your position and explaination will help you to learn more. What about this game which will let you learn?</p>';
echo '<a href='.return_domain("/english").' class="buttons button_orangered">Join English Learning<span class="material-icons masiv_icon"> keyboard_arrow_right </span></a><br>';
echo '<a href='.return_domain("/jobs").' class="buttons button_orangered">Join PaiPixel Jobs<span class="material-icons masiv_icon"> keyboard_arrow_right </span></a><br>';
echo '</div>';
echo '<div class="over_self">';
echo '<h2>Want to get a job ?</h2>';
echo '<br><p>Every one study hard to pass in job exams. But what kind of exam will appear in jobs? Do you really have much knowledge to acure the job? Test your self with PaiPixel Jobs and earn more knowlege and skills.';
echo '<a href="'.return_domain("/jobs").'" class="button">See All Job Exams <span class="material-icons">keyboard_arrow_right</span></a></p>';
echo '<div class="real_bar">';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam1.jpg").'">';
echo '<h2>BCS</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam2.jpg").'">';
echo '<h2>Bank Jobs</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam3.jpg").'">';
echo '<h2>Primary Jobs</h2>';
echo '</div>';
echo '<div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

// Confuse All.


echo '<div class="reback" style="background: #effff0; padding: 20px;">';



echo '<div class="self" style="background: #effff0;">';
echo '<div class="over_self">';
echo '<h2>Want to make your <span style="color: green">Future Bright</span> ?</h2>';
echo '<br><p>PaiPixel is the first platform where one will get his total course detail publicly. A Programmer or Out Sourcer can use this as their <strong style="font-weight: bold !important;">Portfolio or Resume.</strong> We supply a <strong style="font-weight: bold !important;">Regular Task.</strong> Every course has exams and explaination. Be trained with live exam and tests. Solve your problem with <strong style="font-weight: bold !important;">Teach Support.</strong>';
echo '</p>';
echo '<div class="real_bar">';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam1.jpg").'">';
echo '<h2>Programming & Algorithm</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam2.jpg").'">';
echo '<h2>Designing And Marketing</h2>';
echo '</div>';
echo '<div class="options">';
echo '<img src="'.return_domain("/photo/exam3.jpg").'">';
echo '<h2>Out Sourceing</h2>';
echo '</div>';
echo '<div>';
echo '</div>';
echo '</div>';
echo '</div>';


echo '<div class="search">';
echo '<h2>I can\' understand.</h2>';
echo '<br><p>If you have any problem to understand PaiPixel. We are always available to help you out. If you have any issues or questions, you can select an option below.</p>';
echo '<a href='.return_domain("/about").' class="buttons button_orangered">About us<span class="material-icons masiv_icon"> keyboard_arrow_right </span></a><br>';
echo '<a href='.return_domain("/FAQ").' class="buttons button_orangered">FAQ<span class="material-icons masiv_icon"> keyboard_arrow_right </span></a><br>';
echo '<a href='.return_domain("/Contact").' class="buttons button_orangered">Contact us<span class="material-icons masiv_icon"> keyboard_arrow_right </span></a>';
echo '</div>';
echo '</div>';
echo '</div>';










if (isset($_GET['i'])) {
	$i = $_GET['i'];
}else{
	$i = "Shomojit";
}

// Gameing Platform

echo "<div style='text-align: center;'><iframe style='width: 100%; height: 657px; max-width: 500px; max-height: 850px; border: 1px solid #ccc;' src='game/br.colorhack?user=".$i."'></iframe></div>";













echo '<div class="footer_part">';
  echo '<div class="partitions w80">';
    echo '<h2 style="font-family: \'Orbitron\', sans-serif;">PaiPixel</h2>';
    echo '<h4 style="font-family: \'Orbitron\', sans-serif;">More Exam, More Skills</h4>';
    echo '<br>';
    echo '<p>';
    echo '  PaiPixel বাংলাদেশের সর্ববৃহৎ Student-Teacher Interactive Educational Platform যেটি বেশি বেশি প্রতিযোগিতামূলক পরীক্ষার মাধ্যমে শিক্ষার্থীদের নিজ নিজ বিষয়ে দক্ষ করে তোলে। PaiPixel বিশ্বাস করে একজন ছাত্র কে গড়ে তুলতে হলে তাকে প্রথমে ছাত্র করে তুলতে হবে। কেউ নিজের দুর্বলতাটা জানতে পারলেই সেটাকে শক্ত করে আগলে ধরে উন্নতির দিকে ধাবিত হতে পারবে। তাই শিক্ষার্থীদের পরীক্ষা ও প্রতিযোগিতাকে মজার মধ্যে এনে তাদের জীবনকে আলোকিত করাই PaiPixel এর লক্ষ্য ।';
    echo '</p>';
 echo ' </div>';
   echo '<div class="partitions">';
    echo '<h2 style="font-family: \'Orbitron\', sans-serif;">PaiPixel</h2>';
    echo '<ul>';
        echo '<li><a href="'.return_domain("/about").'">Who We Are</a></li>';
        echo '<li><a href="'.return_domain("/career").'">Careers</a></li>';
        echo '<li><a href="'.return_domain("/termsandconditions").'">Terms & conditions</a></li>';
        echo '<li><a href="'.return_domain("/privacy_policy").'">Privacy Policy</a></li>';
        echo '<li><a href="'.return_domain("/collaborate").'">Callaborate PaiPixel</a></li>';
        echo '<li><a href="'.return_domain("/feedback").'">Give Feedback</a></li>';
        echo '<li><a href="'.return_domain("/Contact").'">Contact us</a></li>';
    echo '</ul>';
  echo '</div>';
   echo '<div class="partitions">';
    echo '<h2 style="font-family: \'Orbitron\', sans-serif;">Follow us</h2>';
    echo '<ul>';
        echo '<li><a target="_blank" href="https://www.facebook.com/PaiPixel/"><span class="images_ft"><img style="width: 18px;" src="'.return_domain("/Image/social/facebook.png").'"/></span>Facebook Page</a></li>';
       echo ' <li><a target="_blank" href=""><span class="images_ft"><img style="width: 18px;" src="'.return_domain("/Image/social/youtube.png").'"/></span>Youtube</a></li>';
        echo '<li><a target="_blank" href="https://www.instagram.com/paipixel/"><span class="images_ft"><img style="width: 18px;" src="'.return_domain("/Image/social/instragram.png").'"/></span>Instragram</a></li>';
        echo '<li><a target="_blank" href="https://www.linkedin.com/company/paipixel"><span class="images_ft"><img style="width: 18px;" src="'.return_domain("/Image/social/linkedin.png").'"/></span>LinkedIn</a></li>';
   echo ' </ul>';
  echo '</div>';
echo '</div>';

echo '<div class="ending" style="color: white; background: #0E0E0E; padding: 10px; font-style: italic; text-align: center;">';
    echo 'Copyright©2020 PaiPixel. All Rights Reserved.';
echo '</div>';