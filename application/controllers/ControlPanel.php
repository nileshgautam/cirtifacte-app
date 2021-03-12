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

	function uploadData($arr = null, $path = null)
	{

		// Upload directory
		$upload_location = "uploads/";
		$dirName = $upload_location . $path;
		if (!file_exists($dirName)) {
			mkdir($dirName, 0755, true);
		}
		// To store uploaded files path
		$files_arr = '';
		// File name
		$filename = $arr['name'];
		// Get extension
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		// Valid image extension
		$valid_ext = array("png", "jpeg", "jpg", "pdf", "docx", "doc");


		// print_r(in_array($ext, $valid_ext));
		// // print_r($ext);
		// die;

		// Check extension
		if (in_array($ext, $valid_ext)) {
			$file_name = preg_replace("/\s+/", "_", $filename);
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$file_name = pathinfo($file_name, PATHINFO_FILENAME);
			$filename = $file_name . "_" . date('mjYHis') . "." . $file_ext;
			// File path
			$file_path = $dirName . '/' . $filename;
			// Upload file
			if (move_uploaded_file($arr['tmp_name'], $file_path)) {

				$files_arr = $file_path;

				return  json_encode(array('res' => 1, 'data' => $files_arr));
			}
		} else {
			return json_encode(array('res' => 0));
		}

		// print_r($files_arr);
		// return  json_encode($files_arr);
		// die;
	}

	public function index()
	{
		$tableName = 'students';
		$data['candidate'] = $this->CustomModel->selectAll($tableName);
		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}

	public function new_student()
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

		// echo '<pre>';
		// print_r($_POST);
		// die;

		$insert = array(
			'first_name' => $this->input->post('first-name'),
			'last_name' => $this->input->post('last-name'),
			'address' => $this->input->post('address'),
			'gender' => $this->input->post('gender'),
			'dob' => $this->input->post('dob'),
			'roll_no' => $this->input->post('roll-no'),
			'course' => $this->input->post('course'),
			'course_duration' => $this->input->post('duration'),
			'certificate_text' => $this->input->post('course-text'),
			'email' => $this->input->post('email'),
			'contact_no' => $this->input->post('mobile-no'),
			'join_date' => $this->input->post('join-date'),
			'director_name' => $this->input->post('director') != '' ? $this->input->post('director') : '',
			'director_signature' => $this->input->post('director-sign') != '' ? $this->input->post('director-sign') : '',
			'manager_name' => $this->input->post('manger-name') != '' ? $this->input->post('manger-name') : '',
			'manager_signature' => $this->input->post('manager-sing') != '' ? $this->input->post('manager-sing') : '',
			'created_date_time' => date("Y-m-d H:i:s")

		);
		// course
		if (isset($insert['first_name'])) {
			$res = $this->CustomModel->insertInto('students', $insert);
			echo $responce = json_encode(array('msg' => 'Certificate successfully generated', 'type' => 'success', 'path' => 'ControlPanel/getcirtificate/' . base64_encode($res)), true);
		} else {
			echo $responce = json_encode(array('msg' => 'system error! contact IT', 'type' => 'danger'), true);
		}
	}

	public function upload_signature()
	{

		
		if ($_FILES) {
			if (isset($_FILES['director-signature'])) {

				$director_signature = $this->uploadData($_FILES['director-signature'], 'signature');
				$director_signature = json_decode($director_signature, true);
				$director_signature['type'] = 'director-signature';

				echo json_encode($director_signature);
			} else if (isset($_FILES['manger-signature'])) {
				$manager_signature = $this->uploadData($_FILES['manger-signature'], 'signature');
				$manager_signature = json_decode($manager_signature, true);
				$manager_signature['type'] = 'manger-signature';
				echo json_encode($manager_signature);
			}
		}
	}
}
