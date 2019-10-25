<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//14追記
use App\News;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }
    //13追記
    public function create(Request $request)
    {
        //14追記
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image',
        ]);
        
        $news = new News();
        $news->title = $validatedData['title'];
        $news->body = $validatedData['body'];
        
        if(isset($validatedData['image'])){
            $path = $validatedData['image']->store('images');
            $news->image_path = basename($path);
        }
        $news->save();
        // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
}
