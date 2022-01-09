<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the book' microservice;
     *
     * @var BookService
     */
    public $bookService;

    /**
     * Create a new controller instance.
     *
     * @param BookService $bookService
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Return the list of books;
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->successResponse($this->bookService->index());
    }

    /**
     * Create a new book;
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return $this->successResponse($this->bookService->store($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Obtains and show a book;
     *
     * @param integer $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->successResponse($this->bookService->show($id));
    }

    /**
     * Updates a book;
     *
     * @param Request $request
     * @param integer $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        return $this->successResponse($this->bookService->update($request->all(), $id));
    }

    /**
     * Removes a book;
     *
     * @param integer $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        return $this->successResponse($this->bookService->destroy($id));
    }
}
