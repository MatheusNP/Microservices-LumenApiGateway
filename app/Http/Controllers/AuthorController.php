<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the author' microservice;
     *
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @param AuthorService $authorService
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Return the list of authors;
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->successResponse($this->authorService->index());
    }

    /**
     * Create a new author;
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return $this->successResponse($this->authorService->store($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Obtains and show an author;
     *
     * @param integer $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->successResponse($this->authorService->show($id));
    }

    /**
     * Updates an author;
     *
     * @param Request $request
     * @param integer $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        return $this->successResponse($this->authorService->update($request->all(), $id));
    }

    /**
     * Removes an author;
     *
     * @param integer $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        return $this->successResponse($this->authorService->destroy($id));
    }
}
