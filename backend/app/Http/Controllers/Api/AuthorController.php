<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        return response()->json($author);
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

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:255',
            'github' => 'required|max:255',
            'twitter' => 'required|max:255',
            'location' => 'required',
            'latest_article_published' => 'required',
        ]);

        $author = Author::create($request->all());

        if(empty($author))
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
        $author = Author::find($id);
        if(empty($author))
        {
            return response()->json([
                "message" => "Author Not Found",
                "status" => 404
            ],200);
        }
        else
        {
            return response()->json($author);
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
        if(Author::where('id', $id)->exists())
        {
            $author = Author::find($id);
            $author->name = $request->name;
            $author->email = $request->email;
            $author->github = $request->github;
            $author->twitter = $request->twitter;
            $author->location = $request->location;
            $author->latest_article_published = $request->latest_article_published;
            $author->save();

            if(empty($author))
            {
                return response()->json([
                    "message" => "Author Not Found",
                    "status" => 404
                ],404);
            }
            else
            {
                return response()->json([
                    "message" => "Updated",
                    "status" => 200
                ], 200);
            }
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
        if(Author::where('id', $id)->exists())
        {
            $author = Author::find($id);
            $author->delete();

            return response()->json([
                "message" => "Successfully Deleted",
                "status" => 200
            ]);
        }
        else
        {
            return response()->json([
                "message" => "Error while in deleting",
                "status" => 404
            ]);
        }
    }
}
