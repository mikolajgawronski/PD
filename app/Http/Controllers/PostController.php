<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()->get();

        return view("posts.index", [
            "posts" => $posts,
        ]);
    }

    public function create(): View
    {
        return view("posts.create");
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->date = Carbon::today();
        $post->time = Carbon::now()->addHours(2);
        $post->save();

        return redirect("/posts")->with("message", "Pomyślnie dodano post.");
    }

    public function show($id): View
    {
        $post = Post::query()->findOrFail($id)->get();

        return view("posts.show", [
            "post" => $post,
        ]);
    }

    public function edit($id): void
    {
        //
    }

    public function update(Request $request, $id): void
    {
        //
    }

    public function destroy($id)
    {
        Post::query()->findOrFail($id)->delete();

        return redirect("/posts")->with("message", "Pomyślnie usunięto post.");
    }
}
