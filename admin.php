<?php
include 'admin.php';
include 'admin-config.php';
class admin extends user{
	var $admin_url;
	function user_list(){
		
	}
	function update_user($id){
		$nama = $this->mysqli->real_escape_string($_POST['nama']);
		$email = $this->mysqli->real_escape_string($_POST['email']);
		$url = $this->mysqli->real_escape_string($_POST['url']);
		$namarek = $this->mysqli->real_escape_string($_POST['namarek']);
		$keterangan = $this->mysqli->real_escape_string($_POST['keterangan']);
		$sql = "update daftar_peserta_seo set nama='".$nama."', email='".$email."', nohp='".$_POST['nohp']."', url='".$url."', bank='".$_POST['bank']."', norek='".$_POST['norek']."', namarek='".$namarek."', keterangan='".$keterangan."', status='".$_POST['status']."' 
			where id=".$id;
		$updatep = $this->mysqli->query($sql);
		if($this->mysqli->affected_rows > 0){
			echo 'updated';
		}
		else{
			echo 'not updated';
		}
		$this->mysqli->close();
	}
	function delete_user($id){
		$sql = "delete from daftar_peserta_seo where id=".$id;
		$delp = $this->mysqli->query($sql);
		if($this->mysqli->affected_rows > 0){
			echo 'deleted';
		}
		else{
			echo 'not deleted';
		}
		$this->mysqli->close();
	}
}
$admin = new admin();
$admin->admin_url = $admin_url;
switch($_POST['page']){
	case login:
		$admin->login($_POST['username'], $_POST['password']);
		break;
	case logout:
		$admin->logout($_POST['user']);
		break;
	case delete_peserta:
		$admin->delete_peserta($_POST['id']);
		break;
	case update_peserta:
		$admin->update_peserta($_POST['uid']);
		break;
	case add_page:
		$admin->add_page();
		break;
	case update_page:
		$admin->update_page($_POST['pid']);
		break;
	case delete_page:
		$admin->delete_page($_POST['pid']);
		break;
	case get_content:
		$admin->get_content($_POST['pid']);
		break;
	case get_user:
		$admin->get_user($_POST['user']);
		break;
	case set_user:
		$admin->set_user($_POST['uid']);
		break;
}
?>