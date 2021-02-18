<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use File;

class ArticleController extends Controller
{
    
    public function index(Request $request, Article $article)
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.article', compact('articles'))
        ->with('i',(request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('admin.articleAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tag' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('images'), $imageName);

        $data = new Article;
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->tag = $request->input('tag');
        $data->image = $imageName;
        $data->save();
        return back()->with('success', 'Article created successfully.');
    }

    public function edit(Article $article, $id)
    {
        return view('admin.articleEdit')->with('articlesfind',Article::find($id));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tag' => 'required',
        ]);
        
        $dataUpdate = Article::find($request->id);
        if ($request->hasFile('photo')){
            $articleImage = $request->file('photo');
            $imgName = time().'_'.$articleImage->getClientOriginalName();
            $destinationPath = public_path('images');
            $articleImage->move($destinationPath, $imgName);
        }else {
           $imgName = $dataUpdate->image;
        }

          $dataUpdate->title = $request->title;
          $dataUpdate->description = $request->description;
          $dataUpdate->tag = $request->tag;
          $dataUpdate->image = $imgName;
          $dataUpdate->save();
          return redirect('article')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article, $id)
    {
        Article::destroy(array('id',$id));
        return redirect()->with('success', 'Article Delete successfully.');
    }

    public function frontendshow(Request $request, Article $article)
    {
        $frontArticles = Article::latest()->paginate(9);
        return view('frontEndHome', compact('frontArticles'))
        ->with('i',(request()->input('page', 1) - 1) * 9);
    }

    public function articleDetail(Article $article, $id)
    {
        return view('articleDetails')->with('findArticleDetails',Article::find($id));
    }

}
