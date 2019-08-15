<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

	protected $limit = 5;

  public function index(){
		$categories = Category::with(['posts' => function($query){
		$query->published();
		}])
			->orderBy('title','asc')
			->get();

		$posts = Post::with('author')
				->latestFirst()
				->published()
				->paginate($this->limit);

  	return view("blog.index", compact('posts','categories'));
	}

  public function show(Post $post){

  	return view("blog.show", compact('post'));
  }

	public function category(Category $category){
	$categoryName = $category->title;

	$categories = Category::with(['posts' => function($query){
		$query->published();
	}])
			->orderBy('title','asc')
			->get();

	$posts = $category->posts()
					->with('author')
					->latestFirst()
					->published()
					->paginate($this->limit);

	return view("blog.index", compact('posts','categories','categoryName'));
	}
}
