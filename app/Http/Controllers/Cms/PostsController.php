<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Posts\PostsService;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    private PostsService $postsService;


    public function __construct(
        PostsService $postsService
    )
    {
        $this->postsService = $postsService;
    }

    public function index()
    {
        \View::share([
            'posts' => $this->postsService->search([]),
        ]);

        return view('cms.posts.index');
    }

    public function create()
    {
        return view('cms.posts.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        \View::share([
            'post' => $post,
        ]);
        return view('cms.posts.show');
    }

    public function edit(Post $post)
    {
        \View::share([
            'post' => $post,
        ]);
        return view('cms.posts.show');
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        $this->postsService->delete($post);
        return redirect()->route('cms.posts.index');
    }
}
