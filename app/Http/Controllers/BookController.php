<?php

namespace App\Http\Controllers;

use App\RepositoryInterface\InterfaceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;

class BookController extends Controller 
{
    private InterfaceRepository $BookRepository;

    public function __construct(InterfaceRepository $BookRepository) 
    {
        $this->BookRepository = $BookRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->BookRepository->getAll()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $Details = $request->only([
            'title',
            'description',
            'price',
            'author_id',
            'category_id'
        ]);

        return response()->json(
            [
                'data' => $this->BookRepository->create($Details)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $Id = $request->route('id');

        return response()->json([
            'data' => $this->BookRepository->getById($Id)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $Details = $request->only([
            'title',
            'description',
            'price',
            'author_id',
            'category_id'
        ]);

        return response()->json([
            'data' => $this->BookRepository->update($Id, $Details)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $this->BookRepository->delete($Id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function show1($id)
    {
        $Books = Book::with('Authors')->findOrFail($id);
        return $Books;
    }
    public function show2($id)
    {
        $Books = Book::with('category')->findOrFail($id);
        return $Books;
    }
}

