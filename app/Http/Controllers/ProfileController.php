<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Log;


class ProfileController extends BaseController
{
	/**
     * Create a new controller instance.
     *
     * @param  ProfileRepository  $users
     * @return void
     */
    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }
    public function index()
        {
            return $this->sendSuccess($this->service->all());
        }

        public function store(ProfileRequest $request)
        {
            try
            {
                $user= request()->user();
                                                $data = $request->all ();
                return $this->sendSuccess($this->service->create($data));
            }
            catch (\Exception $e) {
                // log the error on file
                Log::error($e->getMessage());
                return $this->sendError("Une erreur est survenue de de l'ajout de: profile , Veuiller contacter l'administrateur"   );
            }
        }

        public function show($id)
        {
            return $this->sendSuccess($this->service->find($id));
        }

        public function update(ProfileRequest $request, $id)
        {
            try
            {
                $user= request()->user();
                $data = $request->all ();
                $res = $this->service->update( $data, $id);
                if ($res) {
                    return $this->sendSuccess($res,'success');
                }
            } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    return $this->sendError("Une erreur est survenue lors de la modification, Veuiller contacter l'administrateur");
            }
        }

        public function destroy($id)
        {
            try{
                $user= request()->user();
                $res = $this->service->delete($id);
                return $this->sendSuccess(null,'Suppression effectue avec succes');
            } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    return $this->sendError("Une erreur est survenue lors de la modification, Veuiller contacter l'administrateur ");
            }
        }


}