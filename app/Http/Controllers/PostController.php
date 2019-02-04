<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\StorePost;

use Illuminate\Http\Request;

class PostController extends Controller
{

//    public function show()
//    {
//        $posts = Posts::orderBy('created_at', 'desc')->paginate(5);
//        return view('home')->withPosts($posts);
//    }

    public function index()
    {
//        $posts = Posts::orderBy('created_at', 'desc')->paginate(5);
        $posts = Posts::all();
        return view('home')->withPosts($posts);
    }


    public function get_post($post_id)
    {
        $post = Posts::find($post_id);
        if (!isset($post)) abort(404);
        $author_id = $post->author_id;
        $user = User::find($author_id);
        event('postHasViewed', $post);
        return view('posts.post')->withUser($user)->withPost($post);
    }


    public function download($filename)
    {
        return response()->download(storage_path() . '/app/' . $filename);
    }

    public function store(StorePost $request)
    {
        $post = new Posts();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        if ($request->has('filename')) {
            $post->attachment_file = $request->filename->getClientOriginalName();
            $request->filename->storeAs('', $post->attachment_file);
//            $post->attachment_file = $request->filename->store('');
        }
        $post->author_id = $request->user()->id;
        $post->save();
        return redirect('/')->withMessage('Статья опубликована');
    }

    public function create(Request $request)
    {
        return view('posts.create');

    }

    public function destroy(Request $request, $id)
    {
        //
        $post = Posts::find($id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $post->delete();
        }
        return redirect('/');
    }

    public function update(Request $request)
    {
        //
        $post_id = $request->input('post_id');
        $post = Posts::find($post_id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $title = $request->input('title');
            $post->title = $title;
            $post->body = $request->input('body');
            $post->save();
            return redirect('/');
        } else {
            return redirect('/')->withErrors('у вас нет достаточных прав');
        }
    }


    public function edit(Request $request, $post_id)
    {
        $post = Posts::find($post_id);
        if ($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
            return view('posts.edit')->with('post', $post);
        return redirect('/')->withErrors('у вас нет достаточных прав');
    }


}
