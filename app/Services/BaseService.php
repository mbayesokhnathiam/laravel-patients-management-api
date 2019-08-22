<?php

namespace App\Services;

use Illuminate\Http\Response;
use App\Exceptions\ModelNotFoundException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;

// use phpDocumentor\Reflection\Types\Self_;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use App\Repositories\BaseRepositoryInterface;
use App\Helpers\Constante;

class BaseService
{
    CONST LIMIT_ROWS = 100;

    protected $repository;
    protected $sms_api_url;


    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->sms_api_url = env('SMS_API_URL');

    }

    /**
     * Return Instance of Repository
     * @param $repositoryName
     * @return mixed
     */
    public function getRepository($repositoryName)
    {
        return new $repositoryName();
    }

    /**
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function find($id)
    {
        $model = $this->getById($id);
        return $model;
    }

    /**
     * @param $modelId
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findById($modelId, array $options = [])
    {
        $model = $this->getById($modelId, $options);
        return $model;
    }

    /**
     * @param $data
     * @return \App\Models\User
     */
    public function create($data)
    {
        $model = $this->repository->create($data);
        return $model;
    }

    /**
     * @param $modelId
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function update(array $data, $modelId)
    {
        $model = $this->getById($modelId);
        $this->repository->update($model, $data);
        return $model;
    }


    /**
     * @param $modelId
     */
    public function delete($modelId)
    {
        $model = $this->getById($modelId);
        $this->repository->delete($model->id);
    }


    /**
     * @param $modelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getById($modelId)
    {
        $model = $this->repository->getById($modelId);

        if (is_null($model)) {
            throw new ModelNotFoundException($model);
        }

        return $model;
    }

    /**
     * @param $modelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $models = $this->repository->all();
        return $models;
    }

    /**
     * @param $modelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPaginate($page)
    {
        $models = $this->repository->getPaginate($page);
        return $models;
    }

    public function orderBy($name,$order='asc'){
        $models = $this->repository->orderBy($name, $order);
        return $models;
    }
}