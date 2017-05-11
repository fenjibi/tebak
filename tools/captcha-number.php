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

if($_SERVER["REQUEST_URI"] == "/register"){
	if(isset($_COOKIE['num_captcha']))
	{
		setcookie('num_captcha', '', 1);
	// unset($_SESSION['my_captcha']); // destroy the session if already there
	}
	$num1 = rand(0, 10);
	$num2 = rand(0, 10);
	$num3 = $num1 + $num2;
	//////Part 1 Random string generation ////////
	// $string1="abcdefghijklmnopqrstuvwxyz";
	// $string2="1234567890";
	// $string=$string1.$string2;
	// $string= str_shuffle($string);
	// $random_text= substr($string,0,8); // change the number to change number of chars
	/////End of Part 1 ///////////
	setcookie("num_captcha", $num3);
	// $_SESSION['my_captcha'] =$random_text; // Assign the random text to session variable
}
?>
