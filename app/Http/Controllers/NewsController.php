<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    
    function dashboard(){
        
        $liste_news = News::orderBy("date","desc")->paginate(5);
        return view('dashboard', compact("liste_news"));
    }

    public function create(){

        return view('create');
    }

    public function edit(News $news){
        
        return view('edit',compact("news"));
    }

    public function add(Request $request){
        $request->validate([
            "title"=>"required",
            "text"=>"required",
            "description"=>"required"
        ]);

        News::create($request->all());

        return back()->with("success", "News ajoutée avec succès");
    }

    public function delete($news)
    {
        // $news->delete();
        News::find($news)->delete();
        return back()->with("successDelete", "News  supprimé avec succès");
    }

    public function update(Request $request, News $news){
        $request->validate([
            "title"=>"required",
            "text"=>"required",
            "description"=>"required"
        ]);

       $news->update([
            "title"=>$request->title,
            "text"=>$request->text,
            "description"=>$request->description
       ]);

        return back()->with("success", "News modifiée avec succès");
    }

}
