<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /** @var BookService */
    public $bookService;
    /** @var AuthorService */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @param BookService $bookService
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
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
        if ($request->author_id ?? 0) {
            $this->authorService->show($request->author_id);
        }

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
        if ($request->author_id ?? 0) {
            $this->authorService->show($request->author_id);
        }
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
