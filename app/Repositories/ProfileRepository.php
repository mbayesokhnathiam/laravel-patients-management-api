<?php

namespace App\Repositories;

use App\Profile;

class ProfileRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){
		$this->model=new Profile();
	}
}