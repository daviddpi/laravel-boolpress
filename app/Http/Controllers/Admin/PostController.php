<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categories, Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.posts.create", compact("post", "categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

                "title" => "required|string|unique:posts|min:8",
                "author" => "required|string",
                "category_id" => "nullable|exists:categories,id",
                "tags" => "nullable|exists:tags,id",
                "post_content" => "required|string|min:20",
                "image_url" => "required|string"
            ],
            [
                "title.required" => "Devi inserire il titolo prima di andare avanti",
                "title.min" => "il titolo deve essere lungo almeno 8 caratteri",
                "author.required" => "Devi inserire l'autore prima di andare avanti",
                "post_content.required" => "Devi inserire il contenuto prima di andare avanti",
                "post_content.min" => "Il contenuto del post deve essere lungo almeno 20 caratteri"
            ]
        );

        $data = $request->all();
        $post = new Post();
        $post->post_date = Carbon::now()->toDateTimeString();

        $post->fill($data);
        $post->save();

        //se esiste una key tags in data la inserisce nel post
        if(array_key_exists("tags", $data)) $post->tags()->sync($data["tags"]);

        return redirect()->route("admin.posts.show", compact("post"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Category $categories)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $tagIds = $post->tags->pluck("id")->toArray();

        return view("admin.posts.edit", compact("post", "categories", "tags" ,"tagIds"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([

                "title" => "required|string|unique:posts|min:8",
                "author" => "required|string",
                "category_id" => "nullable|exists:categories,id",
                "tags" => "nullable|exists:tags,id",
                "post_content" => "required|string|min:20",
                "image_url" => "required|string"
            ],
            [
                "title.required" => "Devi inserire il titolo prima di andare avanti",
                "author.required" => "Devi inserire l'autore prima di andare avanti",
                "post_content.required" => "Devi inserire il contenuto prima di andare avanti",
                "title.min" => "il titolo deve essere lungo almeno 8 caratteri",
                "post_content.min" => "Il contenuto del post deve essere lungo almeno 20 caratteri"
            ]
        );

        $data = $request->all();
        $post->update($data);

        if(array_key_exists("tags", $data)) $post->tags()->sync($data["tags"]);

        return redirect()->route("admin.posts.show", compact("post"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->tags) $post->tags()->detach();
        
        $post->delete();
        return redirect()->route("admin.posts.index")->with('delete', $post->title);
    }
}
