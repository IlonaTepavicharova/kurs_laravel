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
    // firstOrCreate

    public function firstOrCreate(){

        $anotherPost = [
            'title' => 'some post title',
            'content' => 'some content',
            'image' => 'imagination.jpg',
            'likes' => 2000,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'some post title',
        ],
            [
            'title' => 'some post title',
            'content' => 'some content',
            'image' => 'imagination.jpg',
            'likes' => 2000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('firstOrCreate');
    }

    public function updateOrCreate(){
        $anotherPost = [
            'title' => 'update some post title',
            'content' => 'update1 some content',
            'image' => 'new_imagination.jpg',
            'likes' => 200,
            'is_published' => 0,
        ];
        $post = Post::updateOrCreate([
            'title' => 'update some post title',
        ],
            $anotherPost
        );

        dd('updateOrCreate');
    }
}
