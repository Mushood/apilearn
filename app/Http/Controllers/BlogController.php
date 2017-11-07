<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

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

        $rules = [
          'title' => 'required',
          'body' => 'required',
          'image' => 'required'
        ];

        $messages = [
          'body.required' => 'The content field is required.'
        ];

        $this->validate($request, $rules, $messages);

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

    public function storeImage(Request $request)
    {
      $imageData = $request->get('image');
      $filename =  $request->get('imageName');
      $fileName = Carbon::now()->timestamp . '_' . $filename;
      $manager = new ImageManager();
      $savedImage= $manager->make($request->get('image'))->save(public_path('images/').$fileName);
      return response()->json([
        'error' => false,
        'filename' => $fileName
      ]);
    }

    public function storeImageMultiple(Request $request)
    {

      dd($request);
      $imageData = $request->get('image');
      $filename =  $request->get('imageName');
      $fileName = Carbon::now()->timestamp . '_' . $filename;
      $manager = new ImageManager();
      $savedImage= $manager->make($request->get('image'))->save(public_path('images/').$fileName);
      return response()->json([
        'error' => false,
        'filename' => $fileName
      ]);
    }
}
