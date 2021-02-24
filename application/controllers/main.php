<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('');
	}

public function use_reg()
{
	$this->load->view('user_registr');
}

public function regiss()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("firstname","firstname",'required');
		$this->form_validation->set_rules("lastname","lastname",'required');
		$this->form_validation->set_rules("username","username",'required');
		$this->form_validation->set_rules("password","password",'required');
		$this->form_validation->set_rules("mobile","mobile",'required');
		$this->form_validation->set_rules("email","email",'required');
		
		if($this->form_validation->run())
		{
			$this->load->model('mainmodel');
			$pass=$this->input->post("password");
			$encpass=$this->mainmodel->encpswd($pass);
		$a=array("firstname"=>$this->input->post("firstname"),
			
			"lastname"=>$this->input->post("lastname"),
			"username"=>$this->input->post("username"),
			"password"=>$encpass,
					"mobile"=>$this->input->post("mobile"),
					"email"=>$this->input->post("email")
					);
		$this->mainmodel->regiss($a);
		redirect(base_url().'main/use_reg');	
	}
	}
  public function approve_use()
{

$this->load->model('mainmodel');
$data['n']=$this->mainmodel->approve_use();
$this->load->view('approve_reg',$data);
}
public function approvedetail()
{
$this->load->model('mainmodel');
$id=$this->uri->segment(3);
$this->mainmodel->approvedetail($id);
redirect('Main/approve_use','refresh');
}
public function rejectdetail()
{
$this->load->model('mainmodel');
$id=$this->uri->segment(3);
$this->mainmodel->rejectdetail($id);
redirect('Main/approve_use','refresh');
}
public function login_use()
	{
		
		$this->load->view('login_user');
	}
	public function log_use()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("email","email",'required');
		$this->form_validation->set_rules("password","password",'required');
		if($this->form_validation->run())
		{
			
			$this->load->model('mainmodel');
			$email=$this->input->post("email");
			$pass=$this->input->post("password");
			$rslt=$this->mainmodel->selectpass($email,$pass);
			if($rslt)
			{
				$id=$this->mainmodel->getuserid($email);
				$user=$this->mainmodel->getuser($id);
				$this->load->library(array('session'));
				$this->session->set_userdata(array('session'));
				$this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status));
				if($_SESSION['status']=='1')
				{
					redirect(base_url().'main/loginus');
					
				}
				else{
					echo "waiting for approval";
				}
			}
			else{
				echo "invalid user";
			}
		}
			else
			{
				redirect('main/login_use','refresh');
			}

	}
	public function loginus()
	{
		$this->load->view('loginuse');
	}
}