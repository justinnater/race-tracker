<?php

namespace App\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Service for creating JSON API responses.
 */
class JsonApiService
{
    private String $version = '1.0';
    private JsonResource|AnonymousResourceCollection $data;
    private ?AnonymousResourceCollection $included = null;

    public function __construct(JsonResource|AnonymousResourceCollection $data)
    {
        $this->data = $data;
    }

    public function setIncluded(AnonymousResourceCollection $included): self
    {
        $this->included = $included;

        return $this;
    }

    public function setVersion(String $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function toArray(): array
    {
        $response = [
            'jsonapi' => [
                'version' => $this->version,
            ],
            'links' => [
                'self' => request()->url(),
            ],
            'data' => $this->data,
        ];

        if ($this->included) {
            $response['included'] = $this->included;
        }

        return $response;
    }
}
