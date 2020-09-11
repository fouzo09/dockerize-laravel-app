<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
class HomeController extends Controller
{
    public function getArticles()
    {
        $articles = Article::get();

        return view('articles.list', compact('articles'));
        
    }

    public function getAdd()
    {
        return view('articles.add');
    }


    public function postAdd(Request $request)
    {
        $rules   = [
            'titre'=>'required',
            'contenu'=>'required'
        ];

        $request->validate($rules);
        
        $titre   = $request->titre;
        $contenu = $request->contenu;

        $article = new Article();

        $article->titre   = $titre;
        $article->contenu = $contenu;


        $article->save();

        return back()->with('success', 'Article ajouté avec succès');

        
    }
}
