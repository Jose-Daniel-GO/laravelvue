<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CategoryRestController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, Response::HTTP_OK);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json([
            'messge' => "Registro creado satisfactoriamente",
            'category' => $category
        ], Response::HTTP_CREATED);
    }

    public function show(Category $categoryRest)
    {
        //
    }
    
    public function edit(Category $categoryRest)
    {
        //
    }
    public function update(Request $request, Category $category)
    {
   
        // $category->update($request->all());
        $category->update($request->only('name', 'slug'));
        return response()->json([
            'message' => "Registro actualizado satisfactoriamente",
            'category' => $category
        ], Response::HTTP_CREATED);

        // return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }
    public function destroy(Category $category)
    {
        // $category=Category::find($category);
        $category->delete();
        return response()->json([
            'message' => "Registro eliminado satisfactoriamente",
            'category' => $category
        ], Response::HTTP_OK);
    }
}
