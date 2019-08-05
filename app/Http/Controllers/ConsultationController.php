<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationRequest;
use App\Services\ConsultationService;
use Illuminate\Support\Facades\Log;


class ConsultationController extends BaseController
{
	/**
     * Create a new controller instance.
     *
     * @param  ConsultationRepository  $users
     * @return void
     */
    public function __construct(ConsultationService $service)
    {
        $this->service = $service;
    }
    public function index()
        {
            $consultation = $this->service->all();
            foreach ($consultation as $key => $value) {
                # code...
                $consultation[$key]["patient"] = $value->patient;
                $consultation[$key]["medecin"] = $value->medecin;
                $consultation[$key]["constante"] = $value->constante;
            }
            return $this->sendSuccess($consultation);
        }

        public function store(ConsultationRequest $request)
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
                return $this->sendError("Une erreur est survenue de de l'ajout de: consultation , Veuiller contacter l'administrateur"   );
            }
        }

        public function show($id)
        {
            return $this->sendSuccess($this->service->find($id));
        }

        public function update(ConsultationRequest $request, $id)
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