<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Redirect;
use App\Http\Requests\Post\StorePost;

use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index()
    {
//        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $posts = Post::all();
        return view('home')->withPosts($posts);

    }


    public function show(Post $post)
    {
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
        $post = new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        if ($request->has('filename')) {
            $post->attachment_file = $request->filename->getClientOriginalName();
            $request->filename->storeAs('', $post->attachment_file);
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
        $post = Post::find($id);
        if ($post && ($request->user()->is_owner($post) || $request->user()->is_admin())) {
            $post->delete();
        } else {
            return redirect('/')->withMessage('Нет прав');
        }
        return redirect('/');
    }

    public function update(Request $request)
    {
        $post_id = $request->input('post_id');
        $post = Post::find($post_id);
        if ($post && ($request->user()->is_owner($post) || $request->user()->is_admin())) {
            $title = $request->input('title');
            $post->title = $title;
            $post->body = $request->input('body');
            $post->save();
            return redirect('/');
        } else {
            return redirect('/')->withMessage('Нет прав');
        }
    }


    public function edit(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        if ($post && ($request->user()->is_owner($post) || $request->user()->is_admin())) {
            return view('posts.edit')->with('post', $post);
            return redirect('/');
        } else {
            return redirect('/')->withMessage('Нет прав');
        }
    }


}
