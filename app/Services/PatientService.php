<?php

namespace App\Services;
use App\Repositories\PatientRepository;

class PatientService extends BaseService
{
    function __construct(PatientRepository $repository){
		$this->repository=new $repository;
		
	}
}