<?php

namespace App\Http\Controllers;

use App\Http\Requests\RendezvousRequest;
use App\Services\RendezvousService;
use Illuminate\Support\Facades\Log;


class RendezvousController extends BaseController
{
	/**
     * Create a new controller instance.
     *
     * @param  RendezvousRepository  $users
     * @return void
     */
    public function __construct(RendezvousService $service)
    {
        $this->service = $service;
    }
    public function index()
        {
            $RV = $this->service->all();
           
            foreach ($RV as $key => $value) {
                # code...
                $RV[$key]["patient"] = $value->patient;
            }
            // dd($RV);
            return $this->sendSuccess($RV);
        }

        public function store(RendezvousRequest $request)
        {
            try
            {
                $user= request()->user();
                $data = $request->all();
                return $this->sendSuccess($this->service->create($data));
            }
            catch (\Exception $e) {
                // log the error on file
                Log::error($e->getMessage());
                return $this->sendError("Une erreur est survenue de de l'ajout de: rendezvous , Veuiller contacter l'administrateur"   );
            }
        }

        public function show($id)
        {
            return $this->sendSuccess($this->service->find($id));
        }

        public function update(RendezvousRequest $request, $id)
        {
            try
            {
                $user= request()->user();
                $data = $request->all();
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