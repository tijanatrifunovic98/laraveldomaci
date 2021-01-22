<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResources;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get articles
        //Prikazuju nam se 15 u PostMan-u
        $articles=Article::paginate(15);
        return ArticleResources::collection($articles);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //For creating and update-ing 
        $article=$request->isMethod('put')? Article::findOrFail($request->article_id):new Article;
        $article->id=$request->input('article_id');
        $article->title=$request->input('title');
        $article->body=$request->input('body');
        if($article->save()){
         return new ArticleResources($article);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Single Article
        //Ovaj id nam dolazi iz ruta 
        $article=Article::findOrFail($id);
        return new ArticleResources($article);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::findOrFail($id);
        if($article->delete()){
        return new ArticleResources($article);
        }
    }
}
