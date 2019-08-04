<?php

namespace App\Services;
use App\Repositories\RendezvousRepository;

class RendezvousService extends BaseService
{
    function __construct(RendezvousRepository $repository){
		$this->repository=new $repository;
		
	}
}