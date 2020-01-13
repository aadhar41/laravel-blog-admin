<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Article;
use App\Models\ArticleMedia;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create')->with('controllername','Article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'required|file',
        ]);



        // Create Article
        
        $article = new Article;
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->short_description = $request->input('short_description');
        // $article->image = 'public/uploads/articles/'.$name;
        $article->created_by = auth()->user()->id;;
        $article->save();

        $files = $request->file('image');

        if($request->file('image'))
        {
            $destinationPath = public_path('/uploads/articles/');
            foreach ($files as $file) {

                $name = 'article_'.$file->getSize().time().'.'.$file->getClientOriginalExtension();
                $file->move($destinationPath,$name);
                $articleMedia = new ArticleMedia;
                $articleMedia->article_id = $article->id;
                $articleMedia->image = 'public/uploads/articles/'.$name;
                $articleMedia->save();
            }
        }
        
        return redirect('admin/article/create')->with('success', 'Article added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }
}
