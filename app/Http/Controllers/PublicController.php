<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PublicController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function userInfo(string $userId, string $userName)
    {
        return 'UserId : ' . $userId . ' UserName : ' . $userName;
    }

    public function displayPosts() {

        $posts = Post::all();

        foreach($posts as $post)
        {
            print($post->title) . '<br>';
        }
    }
}