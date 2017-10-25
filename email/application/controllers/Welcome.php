<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{

		$this->load->view('header');
		$this->load->view('email_form');
		$this->load->view('footer');
	}

	public function send_mail(){
		$this->load->helper('url');

		if (!isset($_POST['e-mail'])){
			//redirect if no parameter e-mail
			redirect(base_url());
		};

		//load email helper
		$this->load->helper('email');
		//load email library
		$this->load->library('email');

		//read parameters from $_POST using input class
		$email = $this->input->post('e-mail',true);

		// check is email addrress valid or no
		if (valid_email($email)){
			// compose email
			$this->email->from($email , 'Namesmile');
			$this->email->to($email);
			$this->email->subject('Runnable CodeIgniter Email Example');
			$this->email->message('Hello from Runnable CodeIgniter Email Example App!');

			// try send mail ant if not able print debug
			if ( ! $this->email->send())
			{
				$data['message'] ="Email not sent \n".$this->email->print_debugger();
				$this->load->view('header');
				$this->load->view('message',$data);
				$this->load->view('footer');

			}
			// successfull message
			$data['message'] ="Email was successfully sent to $email";

			$this->load->view('header');
			$this->load->view('message',$data);
			$this->load->view('footer');
		} else {

			$data['message'] ="Email address ($email) is not correct. Please <a href=".base_url().">try again</a>";

			$this->load->view('header');
			$this->load->view('message',$data);
			$this->load->view('footer');
		}

	}

	public function info(){
		phpinfo();
	}

	public function htmlmail(){
		$config = Array(

				'mailtype'  => 'html',
				'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);

		$this->email->set_newline("\r\n");

		$this->email->from('info@lestroismarios.com', 'L3M Info');
		$data = array('userName'=> 'Mario Alejandro Blanco');

		$userEmail = "mariowhite2007@gmail.com";
		$subject = "New comment...";

		$this->email->to($userEmail);
		$this->email->subject($subject);

		$body = $this->load->view('email.php',$data,TRUE);
		$this->email->message($body);

		if($this->email->send()){
			$data['message'] = "Mail sent...";
		}
		else{

			$data['message'] ="Email not sent \n".$this->email->print_debugger();


		}
		$this->load->view('header');
		$this->load->view('message',$data);
		$this->load->view('footer');

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */