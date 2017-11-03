<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{

    public function index(Request $request)
    {
      $blogs = Blog::latest()->get();

      return response()->json([
          'blogs' => $blogs,
      ]);
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->image = $request->image;
        $blog->save();

        return response()->json([
            'operation' => 'success',
        ]);
    }

    public function show(Request $request, Blog $blog)
    {
      return response()->json([
          'blog' => $blog,
      ]);
    }
}
