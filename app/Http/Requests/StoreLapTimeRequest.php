<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreLapTimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'lap_time' => 'required|date_format:H:i:s.v',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException(
            $validator,
            $this->jsonApiErrorResponse('Invalid lap time', 'The lap time must be in the format H:i:s.v')
        );
    }

    private function jsonApiErrorResponse(string $title, string $detail, int $status = 400): JsonResponse
    {
        return response()->json([
            'jsonapi' => ['version' => '1.0'],
            'errors' => [
                [
                    'status' => $status,
                    'title' => $title,
                    'detail' => $detail,
                ],
            ],
        ], $status);
    }
}
