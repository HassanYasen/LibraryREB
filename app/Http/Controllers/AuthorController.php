<?php

namespace App\Http\Controllers;

use App\Repository\AuthorsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Author;

class AuthorController extends Controller 
{
    private $AuthorsRepository;

    public function __construct(AuthorsRepository $AuthorsRepository) 
    {
        $this->AuthorsRepository = $AuthorsRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->AuthorsRepository->getAll()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $Details = $request->only([
            'author_name',
            'country',
            'age'
        ]);

        return response()->json(
            [
                'data' => $this->AuthorsRepository->create($Details)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $Id = $request->route('id');

        return response()->json([
            'data' => $this->AuthorsRepository->getById($Id)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $Details = $request->only([
            'author_name',
            'country',
            'age'
        ]);

        return response()->json([
            'data' => $this->AuthorsRepository->update($Id, $Details)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $this->AuthorsRepository->delete($Id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function show1($id)
    {
        $Authors = Author::with('Books')->findOrFail($id);
        return $Authors;
    }
}
