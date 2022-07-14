<?php

namespace App\Http\Controllers;

use App\RepositoryInterface\InterfaceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\categories;

class CategoriesController extends Controller 
{
    private InterfaceRepository $CategoriesRepository;

    public function __construct(InterfaceRepository $CategoriesRepository) 
    {
        $this->CategoriesRepository = $CategoriesRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->CategoriesRepository->getAll()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $Details = $request->only([
            'category_name',
        ]);

        return response()->json(
            [
                'data' => $this->CategoriesRepository->create($Details)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $Id = $request->route('id');

        return response()->json([
            'data' => $this->CategoriesRepository->getById($Id)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $Details = $request->only([
            'category_name',
        ]);

        return response()->json([
            'data' => $this->CategoriesRepository->update($Id, $Details)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $Id = $request->route('id');
        $this->CategoriesRepository->delete($Id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function show1($id)
    {
        $category = categories::with('Books')->findOrFail($id);
        return $category;
    }
}
