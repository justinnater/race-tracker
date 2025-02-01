<?php

namespace Tests\Feature\Helpers;


use Illuminate\Testing\TestResponse;

class JsonApiAsserter {
    public static function assertResponseIsJsonApi(TestResponse $response, string $endpoint): void
    {
        $endpoint = config('app.url') . '/api/car';

        $response->assertJson([
            'jsonapi' => [
                'version' => '1.0',
            ],
            'links' => [
                'self' => $endpoint,
            ],
            'data' => [],
        ]);
    }
}
