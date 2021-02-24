<?php
class mainmodel extends CI_model
{

public function regiss($a)
{
$this->db->insert("user_register",$a);
}
public function encpswd($pass)
{
	return password_hash($pass, PASSWORD_BCRYPT);
}
public function approve_use()
{
	$this->db->select('*');
	$qry=$this->db->get("user_register");
	return $qry;
}
public function approvedetail($id)
{
	$this->db->set('status','1');
	$qry=$this->db->where("id",$id);
	$qry=$this->db->update("user_register");
	return $qry;
}
public function rejectdetail($id)
{
	$this->db->set('status','2');
	$qry=$this->db->where("id",$id);
	$qry=$this->db->update("user_register");
	return $qry;
}

public function selectpass($email,$pass)
{
	$this->db->select('password');
	$this->db->from("user_register");
	$this->db->where("email",$email);
	$qry=$this->db->get()->row('password');
	return $this->verifypass($pass,$qry);
}
public function verifypass($pass,$qry)
{
	return password_verify($pass,$qry);
}
public function getuserid($email)
{
	$this->db->select('id');
	$this->db->from("user_register");
	$this->db->where("email",$email);
	return $this->db->get()->row('id');
}
public function getuser($id)
{
	$this->db->select('*');
	$this->db->from("user_register");
	$this->db->where("id",$id);
	return $this->db->get()->row();
}

}
?>