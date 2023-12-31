<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $blogs = Blog::create();
        
        return response()->json(['success' =>  true,'blog created']);
    }

    
    public function show(Blog $blog)
    {
        return response()->json($blog);
    }

    
    public function edit(Blog $blog)
    {
        //
    }

    
    public function update(Request $request, Blog $blog)
    {
        $blog->title =  $request->title;
        $blog->contenido =  $request->contenido;

        $blog->update();

        return response()->json(['succes' => true, 'Actualizado!']);
    }

    
    public function destroy(Blog $blog)
    {
        $blog->delete();    
        return response()->json(['deleted' => true, 'eliminado!']);
    }
}
