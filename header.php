<?php 
include_once 'functions.php';
function get_header($title,$desc,$key)
{
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<meta charset="UTF-8">';
echo '<meta name="description" content="'.$desc.'">';
echo '<meta name="keywords" content="'.$key.'">';
echo '<meta name="author" content="PaiPixel">';
echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Raleway&display=swap" rel="stylesheet"> ';
echo '<link href="'.return_domain("/css/main.css".d_link()).'" rel="stylesheet"> ';
echo '<link href="'.return_domain("/dist/assets/owl.carousel.min.css").'" rel="stylesheet"> ';
echo '<link href="'.return_domain("/dist/assets/owl.theme.default.min.css").'" rel="stylesheet"> ';
echo '<link href="'.return_domain("/img/favicon.png").'" rel="icon"> ';
echo '<title>'.$title.'</title>';
echo '</head>';

}
function get_footer(){
	include_once 'footer.php';
}
function get_nav(){
	include_once 'nav.php';
}
function get_body(){
	include_once 'body.php';
}
?>