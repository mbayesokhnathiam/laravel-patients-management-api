<?php

namespace App\Services;
use App\Repositories\ProfileRepository;

class ProfileService extends BaseService
{
    function __construct(ProfileRepository $repository){
		$this->repository=new $repository;
		
	}
}