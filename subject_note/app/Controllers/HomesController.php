<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Models\Subject;
use App\Models\Note;
	

class HomesController extends Controller
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
		$this->sendPage('home', [
			'notes' => Guard::user()->Notes,
			'subjects' => Guard::user()->subjects
			]);
	}
}


