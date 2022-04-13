<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Models\Subject;
use App\Models\Note;


class SubjectsController extends Controller
{
	public function __construct()
	{
		if (!Guard::isUserLoggedIn()) {
			redirect('/login');
		}

		parent::__construct();
	}

	public function index()
	{
		$this->sendPage('subjects/view_subject', [

			'subjects' => Guard::user()->subjects
			]);
	}

	public function showAddPage(){
		$this->sendPage('subjects/add', [
			'errors' => session_get_once('errors'),
			'old' => $this->getSavedFormValues()
		]);
	}


	public function create(){
		$data = $this->filterSubjectData($_POST);
		$model_errors = Subject::validate($data);
			if (empty($model_errors)) {
					$subject = new Subject();
					$subject->fill($data);
					$subject->user()->associate(Guard::user());
					$subject->save();
						redirect('/subjects/view_subject');
			}
// Lưu các giá trị của form vào $_SESSION['form']
		$this->saveFormValues($_POST);
// Lưu các thông báo lỗi vào $_SESSION['errors']
		redirect('/subjects/add', ['errors' => $model_errors]);
	}

protected function filterSubjectData(array $data){
	return [
		'subject_name' => $data['subject_name'] ?? null,
// 'phone' => preg_replace('/\D+/', '', $data['phone']),
		'teacher' => $data['teacher'] ?? null,
		'so_chi'=> $data['so_chi'] ?? null,
		'ma_subject' => $data['ma_subject'] ?? null,
];}


public function showEditPage($subject_id){
	$subject = Guard::user()->subjects->find($subject_id);
		if (! $subject) {
			$this->sendNotFound();
		}
	$form_values = $this->getSavedFormValues();
	$data = [
		'errors' => session_get_once('errors'),
		'subject' => ( !empty($form_values) ) ?
		array_merge($form_values, ['id' => $subject->id]) :
	$subject->toArray()
	];
	$this->sendPage('subjects/edit', $data);
}

public function update($subject_id){
	$subject = Guard::user()->subjects->find($subject_id);
	if (! $subject) {
		$this->sendNotFound();
	}
	$data = $this->filterSubjectData($_POST);
	$model_errors = Subject::validate($data);
	if (empty($model_errors)) {
		$subject->fill($data);
		$subject->save();
		redirect('/subjects/view_subject');
	}
	$this->saveFormValues($_POST);
		redirect('/subjects/edit/'.$subject_id, [
		'errors' => $model_errors
		]);
	}
	
	public function delete($subject_id)	{
		$subject = Guard::user()->subjects->find($subject_id);
		if (! $subject) {
			$this->sendNotFound();
		}
		$subject->delete();
			redirect('/subjects/view_subject');
		}	
	}
