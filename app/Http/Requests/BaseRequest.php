<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;
use Illuminate\Http\JsonResponse;
use App\Helpers\Utilities;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Cette classe pernet d'uniformiser la reponse pour les controle de validite des donnees recu
 * @author El Hadji Dame Cisse
 *
 */
abstract class BaseRequest extends LaravelFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}