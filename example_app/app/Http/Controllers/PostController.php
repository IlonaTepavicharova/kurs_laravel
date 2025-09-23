<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('is_published',0)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }
        dump('end');
    }
    public function create(){
        $postsArr = [
            [
            'title' => 'title of post from phpstorm',
            'content' => 'some intresting content',
            'image' => 'imageblabla.jpg',
            'likes' => 20,
            'is_published' => 1,
        ],
        [
            'title' => 'another title of post from phpstorm',
            'content' => 'another some intresting content',
            'image' => 'anotherimageblabla.jpg',
            'likes' => 20,
            'is_published' => 1
        ]
        ];
        foreach ($postsArr as $item) {
            Post::create($item);
        }


        dd('created');
    }
    public function update(){
        $post = Post::find(4);
        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated.jpg',
            'likes' => 20,
            'is_published' => 1
        ]);
        dd('updated');
    }
    public function delete(){
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restored');
    }

}
