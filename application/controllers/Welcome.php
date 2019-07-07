<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{



	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->load->view('layout');
	}

	public function about()
	{
		// fungsi untuk me-load view about.php
		$this->load->view('about');
	}

	public function contact()
	{
		// fungsi untuk me-load view contact.php
		$this->load->view('contact');
	}
}