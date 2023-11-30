<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index', [
            'posts' => auth()->user()->getPersonalPosts()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PostCreateRequest $request
     * @return RedirectResponse
     */
    public function store(PostCreateRequest $request)
    {
        $post = new Post();

        $post->user_id = auth()->id();
        $post->fill($request->validationData())->save();

        return redirect()->route('my_posts')->with('success', __('Post created'));
    }

    /**
     * Display the specified resource.
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        if($post->user_id != auth()->id())
            return redirect()->route('my_posts')->with('danger', __('Access closed'));

        $post->fill($request->validationData())->save();

        return redirect()->route('my_posts')->with('success', __('Post updated'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        if($post->user_id != auth()->id())
            return redirect()->route('my_posts')->with('danger', __('Access closed'));

        $post->delete();

        return redirect()->route('my_posts')->with('success', __('Post was deleted'));
    }
}
