<?php 
// session_start();
include 'config.php';
// include 'admin-config.php';
class user{
	var $home_url;
	function __construct() {
		$this->mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	}
	function registration(){
		/* include_once $_SERVER['DOCUMENT_ROOT'] . '/tools/securimage/securimage.php';
		$securimage = new Securimage();
		if ($_POST['captcha_code'] == $_COOKIE['my_captcha']) {
			echo "<script>alert('Security Code salah.');history.go(-1);</script>";
		}
		else { */
		$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$username = $mysqli->real_escape_string($_POST['username']);
		$email = $mysqli->real_escape_string($_POST['email']);
		// $namarek = $mysqli->real_escape_string($_POST['namarek']);
		$dewahokiuser = $mysqli->real_escape_string($_POST['dewahokiuser']);
		$jayabolauser = $mysqli->real_escape_string($_POST['jayabolauser']);
		$chksql = "select * from user where username='".$username."'";
		$uchk = $mysqli->query($chksql);
		if($uchk->num_rows > 0){
			echo "<script>alert('Username sudah ada. Ganti yang lain.');window.location=window.location.origin+'/register';</script>";
			return;
		}
		$chksql1 = "select * from user_detail where dewahoki_username='".$dewahokiuser."'";
		$uchk1 = $mysqli->query($chksql1);
		if($uchk1->num_rows > 0){
			echo "<script>alert('Username 899Cash sudah ada. Ganti yang lain.');window.location=window.location.origin+'/register';</script>";
			return;
		}
		$chksql2 = "select * from user_detail where jayabola_username='".$jayabolauser."'";
		$uchk2 = $mysqli->query($chksql2);
		if($uchk2->num_rows > 0){
			echo "<script>alert('Username JayaBola sudah ada. Ganti yang lain.');window.location=window.location.origin+'/register';</script>";
			return;
		}
		$sql = "INSERT INTO user (username, password, position) 
			VALUES ('".$username."', '".md5($_POST['password'])."', 3)";
		$daftar = $mysqli->query($sql);
		if($daftar){
			$sql1 = "INSERT INTO user_detail (user_id, email, nohp, bank, norek, namarek, dewahoki_username, jayabola_username) 
			VALUES (".$mysqli->insert_id.", '".$email."', '".$_POST['nohp']."', '"./*$_POST['bank'].*/"', '"./*$_POST['norek'].*/"', '"./*$namarek.*/"', '".$dewahokiuser."','".$jayabolauser."')";
			$daftar1 = $mysqli->query($sql1);
		}
		if($daftar1){
			echo "<script>alert('Berhasil mendaftar.');window.location=window.location.origin;</script>";
		}
		else{
			echo "<script>history.go(-1);alert('Gagal mendaftar. Ada kesalahan.');</script>";
		}
		// }
	}
	function login($username, $password){
		$sql = "select * from user where username='".$username."' and password='".md5($password)."'";
		$user = $this->mysqli->query($sql);
		if($user->num_rows > 0){
			$u = $user->fetch_assoc();
			setcookie("uid", $u['user_id']);
			echo "<script>window.location='".$this->home_url."';</script>";
		}
		else{
			echo "<script>alert('Gagal Login.');window.location='".$this->home_url."';</script>";
		}
		$user->close();
		$this->mysqli->close();
	}
	function logout($uid){
		setcookie('uid', $uid, 1);
	}
	function get_user($uid){
		$sql = "select * from user u left join user_detail ud on u.user_id=ud.user_id where u.user_id=".$uid;
		$user = $this->mysqli->query($sql);
		if($user->num_rows == 1){
			$u = $user->fetch_assoc();
			return $u;
		}
		else{
			return '';
		}
		$this->mysqli->close();
	}
	function set_user($uid){
		$sql = "select * from user where user_id=".$uid;
		$user = $this->mysqli->query($sql);
		if($user->num_rows > 0){
			$u = $user->fetch_assoc();
			if($u['password'] == md5($_POST['old-password'])){
				$pwsql = "update user set password='".md5($_POST['new-password'])."' where user_id=".$uid;
				$updated = $this->mysqli->query($pwsql);
				if($this->mysqli->affected_rows > 0){
					echo 'updated';
				}
				else{
					echo 'not updated';
				}
			}
			else{
				echo 'password salah';
			}
		}
		else{
			echo '';
		}
		$this->mysqli->close();
	}
	function reset_password(){
		if(!isset($_GET['d'])){
			$sql = "select u.user_id, email from user u, user_detail ud 
				where username='".$_POST['uname']."' and u.user_id=ud.user_id";
			$user = $this->mysqli->query($sql);
			if($user->num_rows == 1){
				include 'common.php';;
				$random_string = $common->generate_random_string();
				$u = $user->fetch_assoc();
				$to = $u['email'];
				$headers = "MIME-Version: 1.0\r\n";
				// $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
				$headers .= 'From: INDOFREEBET <system@indofreebet.net>\r\n';
				$subject = 'Reset Password';
				$d = base64_encode($u['user_id']."|".date('Ymd')."|".$random_string);
				$message = 'Username : '.$_POST['uname']."\r\n".'Password setelah reset : '.$random_string."\r\n".
					'Klik/kunjungi link di bawah ini untuk mereset password.'."\r\n".$this->home_url.'user.php?page=reset_password&d='.$d."\r\n"."\r\n".'NB : Pesan ini tidak perlu dibalas.';
				mail($to, $subject, $message, $headers);
			}
			echo 'Reset password diproses, selanjutnya silahkan cek email Anda.';
		}
		else {
			$data = base64_decode($_GET['d']);
			$arr = explode("|",$data);
			if($arr[1] == date('Ymd')){
				$pwsql = "update user set password='".md5($arr[2])."' where user_id=".$arr[0];
				$updated = $this->mysqli->query($pwsql);
				if($this->mysqli->affected_rows > 0){
					echo "<script>alert('Proses reset password berhasil.');window.location='".$this->home_url."';</script>";
				}
			}
			else {
				echo "<script>alert('Reset password expired. Ulangi reset password.');window.location='".$this->home_url."';</script>";
			}
		}
		$this->mysqli->close();	
	}
}
$user = new user();
$user->home_url = $home_url;
switch($_POST['page']){
	case register:
		$user->registration();
		break;
	case login:
		$user->login($_POST['user_name'], $_POST['login_password']);
		break;
	case logout:
		$user->logout($_POST['user']);
		break;
	case get_user:
		$user->get_user($_POST['user']);
		break;
	case set_user:
		$user->set_user($_POST['uid']);
		break;
	case reset_password:
		$user->reset_password();
		break;
}
if($_GET['page'] == 'reset_password'){
	$user->reset_password();
}
?>