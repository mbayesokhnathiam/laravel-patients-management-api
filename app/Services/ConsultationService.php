<?php

namespace App\Services;
use App\Repositories\ConsultationRepository;

class ConsultationService extends BaseService
{
    function __construct(ConsultationRepository $repository){
		$this->repository=new $repository;
		
	}
}