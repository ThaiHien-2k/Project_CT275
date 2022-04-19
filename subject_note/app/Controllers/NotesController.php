<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Models\Note;
use App\Models\Subject;


class NotesController extends Controller
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
		$this->sendPage('notes/view_note', [
			'notes' => Guard::user()->notes,
				// 'subjects' => Guard::user()->subjects
			]);
	}

	public function showAddPage(){
		$this->sendPage('notes/add', [
			'errors' => session_get_once('errors'),
			'old' => $this->getSavedFormValues()
		]);
	}


	public function create(){
		$data = $this->filterNoteData($_POST);
		$model_errors = Note::validate($data);
			if (empty($model_errors)) {
					$note = new Note();
					$note->fill($data);
					$note->user()->associate(Guard::user());
					$note->save();
						redirect('/notes/view_note');
			}
// Lưu các giá trị của form vào $_SESSION['form']
		$this->saveFormValues($_POST);
// Lưu các thông báo lỗi vào $_SESSION['errors']
		redirect('/notes/add', ['errors' => $model_errors]);
	}

protected function filterNoteData(array $data){
	return [
		'note' => $data['note'] ?? null,
		'ma_Mon' => $data['ma_Mon'] ?? null,
];}


public function showEditPage($note_id){
	$note = Guard::user()->notes->find($note_id);
		if (! $note) {
			$this->sendNotFound();
		}
	$form_values = $this->getSavedFormValues();
	$data = [
		'errors' => session_get_once('errors'),
		'note' => ( !empty($form_values) ) ?
		array_merge($form_values, ['id' => $note->id]) :
	$note->toArray()
	];
	$this->sendPage('notes/edit', $data);
}

public function update($note_id){
	$note = Guard::user()->notes->find($note_id);
	if (! $note) {
		$this->sendNotFound();
	}
	$data = $this->filterNoteData($_POST);
	$model_errors = Note::validate($data);
	if (empty($model_errors)) {
		$note->fill($data);
		$note->save();
		redirect('/notes/view_note');
	}
	$this->saveFormValues($_POST);
		redirect('/notes/edit/'.$note_id, [
		'errors' => $model_errors
		]);
	}
	
	public function delete($note_id)	{
		$note = Guard::user()->notes->find($note_id);
		if (! $note) {
			$this->sendNotFound();
		}
		$note->delete();
			redirect('/notes/view_note');
		}	
	}
