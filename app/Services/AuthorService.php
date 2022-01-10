<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    /**
     * Base uri to consume author's service
     *
     * @var string
     */
    public $baseUri;

    /**
     * Secret to consume author's service
     *
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /**
     * Obtain the full list of authors from the author service;
     *
     * @return string
     */
    public function index(): string
    {
        return $this->performRequest('GET', '/authors');
    }

    /**
     * Create an author from the author service;
     *
     * @param array $data
     * @return string
     */
    public function store(array $data): string
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
     * Obtain an author from the author service;
     *
     * @param integer $id
     * @return string
     */
    public function show(int $id): string
    {
        return $this->performRequest('GET', "/authors/{$id}");
    }

    /**
     * Edit an author from the author service;
     *
     * @param array $data
     * @param integer $id
     * @return string
     */
    public function update(array $data, int $id): string
    {
        return $this->performRequest('PUT', "/authors/{$id}", $data);
    }

    /**
     * Delete an author from the author service;
     *
     * @param integer $id
     * @return string
     */
    public function destroy(int $id): string
    {
        return $this->performRequest('DELETE', "/authors/{$id}");
    }
}
