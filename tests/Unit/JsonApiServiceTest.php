<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\JsonApiService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class JsonApiServiceTest extends TestCase
{
    /**
     * Mock resource for testing.
     */
    private function mockResource(): AnonymousResourceCollection
    {
        return JsonResource::collection([
            (object) ['id' => 1, 'name' => 'Test Item'],
        ]);
    }

    public function test_it_generates_a_valid_json_api_response()
    {
        $response = (new JsonApiService($this->mockResource()))
            ->toArray();

        $this->assertArrayHasKey('jsonapi', $response);
        $this->assertArrayHasKey('version', $response['jsonapi']);
        $this->assertEquals('1.0', $response['jsonapi']['version']);

        $this->assertArrayHasKey('links', $response);

        $this->assertArrayHasKey('data', $response);
        $this->assertNotEmpty($response['data']);
    }

    public function test_it_allows_setting_a_custom_version()
    {
        $response = (new JsonApiService($this->mockResource()))
            ->setVersion('2.0')
            ->toArray();

        $this->assertEquals('2.0', $response['jsonapi']['version']);
    }

    public function test_it_includes_optional_related_data()
    {
        $response = (new JsonApiService($this->mockResource()))
            ->setIncluded($this->mockResource())
            ->toArray();

        $this->assertArrayHasKey('included', $response);
        $this->assertNotEmpty($response['included']);
    }

    public function test_it_does_not_include_optional_data_when_not_set()
    {
        $response = (new JsonApiService($this->mockResource()))
            ->toArray();

        $this->assertArrayNotHasKey('included', $response);
    }
}
