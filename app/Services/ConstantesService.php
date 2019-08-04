<?php

namespace App\Services;
use App\Repositories\ConstantesRepository;

class ConstantesService extends BaseService
{
    function __construct(ConstantesRepository $repository){
		$this->repository=new $repository;
		
	}
}