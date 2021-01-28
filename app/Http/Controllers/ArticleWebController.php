<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use DB;

class ArticleWebController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //ELOQUENT
        $articles=Article::orderBy('created_at','desc')->paginate(10);
        return view ('articles.index')->with('articles',$articles);
    }
    /*public function createWeb()
    {
        return view('posts.create');
    }
   
           $filename=pathinfo($fileNameWitxExt,PATHINFO_FILENAME);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = DB::table('countries')->pluck('name', 'id','city','population');
        return view('articles.create',compact('countries'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'countries'=>'required',
        ]);

        $article= new Article;
        
         
         $article->title=$request->input('title');
         $article->body=$request->input('body');
         $article->user_id=auth()->user()->id;
         $article->country_id=$request->input('countries');
         $article->save();
         return redirect('/articles')->with('success','Article Created');
    }

   
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article= Article::find($id);
        return view('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article= Article::find($id);
        if(auth()->user()->id !==$article->user_id){
            return redirect('/articles')->with('error','Unauthorized Page');
            }
        $countries = DB::table('countries')->pluck('name', 'id','city','population');
       // $article= Article::find($id);
        return view('articles.edit')->with('article',$article)->with('countries',$countries);
        
    
       
      
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
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'countries'=>'required',
        ]);

       
        
         $article=Article::find($id);
         $article->title=$request->input('title');
         $article->body=$request->input('body');
         $article->user_id=auth()->user()->id;
         $article->country_id=$request->input('countries');
         $article->save();
         return redirect('/articles')->with('success','Article Updated');
    }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        if(auth()->user()->id !==$article->user_id){
            return redirect('/articles')->with('error','Unauthorized Page');
            }
        $article->delete();
        return redirect('/articles')->with('success','Article Removed');
    }
}
