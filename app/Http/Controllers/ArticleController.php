<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoryId = null)
    {
        if($categoryId == null){
            $articles = Article::getAllArticle();
        }else{
            $category = Category::find($categoryId);
            $articles = $category->article->all();
        }

        return view('article',['articles' => $articles]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_blog');
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
            'title' => 'required',
            'story' => 'required|min:3|max:1000',
            'image' => 'required|image|mimes:png,jpg|max:5120'
        ]);

        $fileName = time().'_'.str_replace(' ', '', $request->image->getClientOriginalName());
        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');


        Article::create([
            'user_id' => Auth::id(),
            'category_id' => $request->input('category'),
            'title' => $request->title,
            'description' => $request->story,
            'image' => 'storage/'.$filePath
        ]);

        return back()->with('success', 'Blog added!');
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('blog_detail',['article' => $article]);
    }

    public function showByUser($id = null){
        if($id == null){
            $articles = Article::where('user_id', Auth::id())->get();
            $user = null;
        }else{
            $articles = Article::where('user_id', $id)->get();
            $user = User::find($id);
        }


        return view('myblog',['articles' => $articles, 'user' => $user]);
    }


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
        if(Auth::user()->role == 'Admin'){
            Article::destroy($id);
        }else{
            $article = Article::find($id);
            if($article->user_id == Auth::user()->id){
                Article::destroy($id);
            }
        }

        return back()->with('success', 'Blog deleted!');
    }
}
