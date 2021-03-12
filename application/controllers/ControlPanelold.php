<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlPanel extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata"); //Set server date an time to Asia
        if (!isset($_SESSION['userInfo'])) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

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
	    $tableName = 'students';
		$data['candidate'] = $this->CustomModel->selectAll($tableName);
		$this->load->view('header');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}
	public function new_students()
	{
		$tableName = 'course';
		$duration = 'course_duration';
		$data['course'] = $this->CustomModel->selectAll($tableName);
		$data['duration'] = $this->CustomModel->selectAll($duration);

		$this->load->view('header');
		$this->load->view('new-certificate', $data);
		$this->load->view('footer');
	}
	function loadCertificate()
	{
		$tableName = 'students';
		$data['candidate'] = $this->CustomModel->selectAll($tableName);
		echo json_encode($data['candidate'], true);
	}

	function getcirtificate($id = null)
	{
		$id = base64_decode($id);
		$tableName = 'students';
		$condition = array('id' => $id);
		$data['cirtificate'] = $this->CustomModel->getWhere($tableName, $condition);
		$this->load->view('header');
		$this->load->view('cirtificate', $data);
		$this->load->view('footer');

		// echo json_encode($data['cirtificate'],true);
	}

	public function studentPost()
	{

		// print_r($_POST);
		// die;

		$first_name = $this->input->post('first-name');
		$last_name = $this->input->post('last-name');

		$gender = $this->input->post('gender');
		$dob = $this->input->post('dob');

		$email = $this->input->post('email');
		$contact_no = $this->input->post('mobile-no');

		$address = $this->input->post('address');
		$joindate = $this->input->post('join-date');

		$rollno = $this->input->post('roll-no');

		$course = $this->input->post('course');
		$duration = $this->input->post('duration');

		// course

		if (isset($rollno)) {

			$data = $this->CustomModel->getWhere('students', array('roll_no' => $rollno, 'course' => $course));

			if ($data) {
				echo json_encode(array('msg' => 'Student roll no. already exist, Duplicate Roll number not allowed', 'type' => 'warning'), true);
			} else {
				$insert = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'address' => $address,
					'gender' => $gender,
					'dob' => $dob,
					'roll_no' => $rollno,
					'course' => $course,
					'course_duration' => $duration,
					'email' => $email,
					'contact_no' => $contact_no,
					'join_date' => $joindate
				);
				$res = $this->CustomModel->insertInto('students', $insert);
				// print_r($res);
				// die;
				// $this->session->set_userdata("company_data", $company_data);
				echo $responce = json_encode(array('msg' => 'Certificate successfully generated', 'type' => 'success', 'path' => 'ControlPanel/getcirtificate/' . base64_encode($res)), true);
			}
		} else {
			echo $responce = json_encode(array('msg' => 'system error! contact IT', 'type' => 'danger'), true);
		}
	}
}
