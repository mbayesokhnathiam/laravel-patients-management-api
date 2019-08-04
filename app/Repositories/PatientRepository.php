<?php

namespace App\Repositories;

use App\Patient;

class PatientRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){
		$this->model=new Patient();
	}
}