<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    // This method will return all blogs
    public function index()
    {
    }

    // This method will return a single blog
    public function show()
    {
    }

    // This method will insert a blog
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'author' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Please fix the errors',
                'errors' => $validator->errors(),
            ]);
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->shortDesc = $request->shortDesc;
        $blog->save();

        return response()->json([
            'status' => true,
            'message' => 'Blog added successfully',
            'data' => $blog,
        ]);
    }

    // This method will update a blog
    public function update()
    {
    }

    // This method will delete a blog
    public function destroy()
    {
    }
}
