<?php

namespace App\Repositories;

use App\Constantes;

class ConstantesRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){
		$this->model=new Constantes();
	}
}