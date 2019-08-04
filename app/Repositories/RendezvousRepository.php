<?php

namespace App\Repositories;

use App\Rendezvous;

class RendezvousRepository extends BaseRepository implements BaseRepositoryInterface
{
    function __construct(){
		$this->model=new Rendezvous();
	}
}