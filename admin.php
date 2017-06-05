<?php
include $_SERVER['DOCUMENT_ROOT']."/user.php";
class admin extends user{
	var $admin_url;
	function user_list($logged_id){
		$get_user = $this->get_user($logged_id);
		if($get_user['position'] == 1){
			$upos =  '3, 2';
		}
		elseif($get_user['position'] == 2) {
			$upos =  '3';
		}
		if(trim($_POST['search_name']) != ''){
			$search_sql = " and username LIKE '%".$_POST['search_name']."%'";
		}
		if(isset($_POST['current_page'])){
			$start_row = ($_POST['current_page'] - 1)*$_POST['row_per_page'];
			// $limit = " limit ".$start_row.", ".$row_per_page;
		}
		$sql = "select * from user u left join user_detail ud on u.user_id=ud.user_id
			where position in (".$upos.")".$search_sql;
		$ulist = $this->mysqli->query($sql);
		$userlist = array();
		if($ulist->num_rows > 0){
			while($urow = $ulist->fetch_assoc()){
				$userlist[] = $urow;
			}
		}
		$user_list['data'] = array_slice($userlist, $start_row, $_POST['row_per_page']);
		$user_list['count'] = $ulist->num_rows;
		return $user_list;
		$this->mysqli->close();
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
	case user_list:
		$user_list = $admin->user_list($_COOKIE['uid']);
		if(isset($_POST['ajax'])){
			echo json_encode($user_list);
		}
		break;
}
?>