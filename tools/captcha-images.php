<?Php

//****************************************************************************
////////////////////////Downloaded from  www.plus2net.com   //////////////////////////////////////////
///////////////////////  Visit www.plus2net.com for more such script and codes.
////////                    Read the readme file before using             /////////////////////
//////////////////////// You can distribute this code with the link to www.plus2net.com ///
/////////////////////////  Please don't  remove the link to www.plus2net.com ///
//////////////////////////
//*****************************************************************************

// session_start();
// header ("Content-type: image/png");


if(isset($_COOKIE['my_captcha']))
{
	setcookie('my_captcha', '', 1);
// unset($_SESSION['my_captcha']); // destroy the session if already there
}
//////Part 1 Random string generation ////////
$string1="abcdefghijklmnopqrstuvwxyz";
$string2="1234567890";
$string=$string1.$string2;
$string= str_shuffle($string);
$random_text= substr($string,0,8); // change the number to change number of chars
/////End of Part 1 ///////////
setcookie("my_captcha", $random_text);
// $_SESSION['my_captcha'] =$random_text; // Assign the random text to session variable

///// Create the image ////////
$im = @ImageCreate (80, 20) // Width and hieght of the image. 
or die ("Cannot Initialize new GD image stream");
$background_color = ImageColorAllocate ($im, 204, 204, 204); // Assign background color
$text_color = ImageColorAllocate ($im, 51, 51, 255);      // text color is given 
ImageString($im,5,8,2,$_COOKIE['my_captcha'],$text_color); // Random string  from session added 
///im is the image source, Int 5 is the font size,Int 8 is the X position , Int 2 is the Y position //
ImagePng ($im); // image displayed
imagedestroy($im); // Memory allocation for the image is removed.
?>