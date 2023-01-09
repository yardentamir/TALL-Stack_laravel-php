<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ! DB queries
        // $posts = DB::statement('SELECT * FROM `posts`');
        // $posts = DB::select('SELECT * FROM posts WHERE id = :id', ['id' => 1]);
        // $posts = DB::insert('INSERT INTO posts (title, excerpt, body, image_path, is_published, min_to_read) VALUES (:title, :excerpt, :body, :image_path, :is_published, :min_to_read)',['title' => 'Test', 'excerpt'=> 'TEST', 'body'=> 'TEST', 'image_path'=> 'TEST', 'is_published'=> true, 'min_to_read'=> 1]);
        // $posts = DB::update('UPDATE posts SET body = :body WHERE id = :id', ['body' => 'Body 2', 'id' => 101]);
        // $posts = DB::delete('DELETE FROM posts WHERE id = :id', ['id' => 101]);

        // $posts = DB::table('posts')->select('title')->get(); // get only body!
        // $posts = DB::table('posts')->where('id', '>', 50)->where('is_published',false)->get();
        // $posts = DB::table('posts')->whereBetween('min_to_read',[2,6])->get();
        // $posts = DB::table('posts')->whereIn('min_to_read',[2,6,8])->get();
        // $posts = DB::table('posts')->whereNull('excerpt')->get(); // check if null
        // $posts = DB::table('posts')->select('min_to_read')->skip(2)->take(3)->orderBy('min_to_read', 'asc')->distinct()->get(); // no duplicates and order from 1 -10 and show only 3 and skip 2 first columns
        // $posts = DB::table('posts')->inRandomOrder()->get(); // random column order
        // $posts = DB::table('posts')->where('id', '>', 20)->first(); // first will get one only - get is all
        // $posts = DB::table('posts')->find(100); // based on primary key
        // $posts = DB::table('posts')->where('id', 100)->value('body'); // gets the value from array of posts - only one
        // $posts = DB::table('posts')->where('id', '>', 20)->count(); // counts the number of posts
        // $posts = DB::table('posts')->min('min_to_read'); // counts the number of posts
        // $posts = DB::table('posts')->max('min_to_read'); // counts the number of posts

        // $posts = DB::table('posts')->find(1);

        // dd($posts); // show db to screen localhost
        // return view('post.index')->with('posts', $posts);
        // return view('post.index',compact('posts'));

        // $posts = DB::table('posts')->get();
        // return view('post.index', ['posts' => $posts]);

        // ! using Modal
        // $posts = Post::all();
        // $posts = Post::orderBy('id', 'desc')->take(10)->get();
        // $posts = Post::where('min_to_read', '!=', 2)->get();
        // dd($posts); // show db to screen localhost

        // Post::chunk(25, function ($posts) {
        //     foreach ($posts as $post) {
        //         echo $post->title . '<br>';
        //     }
        // });

        // $posts = Post::get()->count();
        $posts = Post::orderBy('updated_at', "desc")->get();
        // dd($posts, ['posts' => $posts]);

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("post.partials.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $post = new Post();
        // $post->title = $request->title;
        // $post->excerpt = $request->excerpt;
        // $post->body = $request->body;
        // $post->image_path = 'temp';
        // $post->is_published = $request->is_published === 'on';
        // $post->min_to_read = $request->min_to_read;
        // $post->save();

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' => $request->is_published === 'on',
            'min_to_read' => $request->min_to_read,
        ]);

        return redirect(route('post'));
        // return view("post.partials.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post.partials.show', ['post' => Post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function storeImage($request)
    {
        // dd($request);
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        return $request->image->move(public_path('images'), $newImageName);
    }
}
