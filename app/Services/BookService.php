<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * Base uri to consume book's service
     *
     * @var string
     */
    public $baseUri;

    /**
     * Secret to consume book's service
     *
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    /**
     * Obtain the full list of books from the book service;
     *
     * @return string
     */
    public function index(): string
    {
        return $this->performRequest('GET', '/books');
    }

    /**
     * Create a book from the book service;
     *
     * @param array $data
     * @return string
     */
    public function store(array $data): string
    {
        return $this->performRequest('POST', '/books', $data);
    }

    /**
     * Obtain a book from the book service;
     *
     * @param integer $id
     * @return string
     */
    public function show(int $id): string
    {
        return $this->performRequest('GET', "/books/{$id}");
    }

    /**
     * Edit a book from the book service;
     *
     * @param array $data
     * @param integer $id
     * @return string
     */
    public function update(array $data, int $id): string
    {
        return $this->performRequest('PUT', "/books/{$id}", $data);
    }

    /**
     * Delete a book from the book service;
     *
     * @param integer $id
     * @return string
     */
    public function destroy(int $id): string
    {
        return $this->performRequest('DELETE', "/books/{$id}");
    }
}
