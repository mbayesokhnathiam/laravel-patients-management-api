<?php

namespace App\Repositories;

use App\Consultation;

class ConsultationRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){
		$this->model=new Consultation();
	}
}