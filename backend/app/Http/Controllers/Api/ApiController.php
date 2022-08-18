<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return response()->json($article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|max:255|email',
            'mobile' => 'required|max:10',
        ]);

        $article = Article::create($input);

        if(empty($article))
        {
            return response()->json([
                "message" => "Error"
            ], 404);
        }
        else
        {
            return response()->json([
                "message" => "Success"
            ], 201);
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
        $article = Article::find($id);
        if(!empty($article))
        {
            return response()->json($article);
        }
        else
        {
            return response()->json([
                "message" => "Article Not Found"
            ], 400);
        }
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

        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:10',
        ]);
        if(Article::where('id',$id)->exists())
        {
        $article = Article::find($id);
        $article->name = $request->name;
        $article->email = $request->email;
        $article->mobile = $request->mobile;
        $article->save();
        return response()->json([
            "message" => "Updated"
        ], 200);
        }
        else{
            return response()->json([
                "message" => "Error"
            ],404);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Article::where('id', $id)->exists())
        {
            $article = Article::find($id);
            $article->delete();
            return response()->json([
                "message" => "Deleted"
            ],200);
        }
        else{
            return response()->json([
                "message" => "Error"
            ],400);
        }
    }
}
