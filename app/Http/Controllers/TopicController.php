<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Topic;
use App\Comment;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::with('user')
                ->select("topics.*",
                Topic::raw("(select count(*) from comments  where comments.topic_id = topics.id) AS couCM"))
                ->paginate(5)->fragment('topics');

              return Redirect('/machine');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topic.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $topic = new Topic();
 
        $request->request->add(['user_id' => auth()->user()->id]);
 
          $topic->create($request->only(['title', 'content', 'user_id']));
 
         return Redirect('/machine');
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
        $topic = Topic::where('id' , $id)
            ->firstOrFail();


        $comments = Comment::where('topic_id' , $id)
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('*','comments.id AS CmId')
        ->orderBy('comments.updated_at', 'desc')
        ->get();

        return view('topic.form', compact('comments','topic'));

    //     $topic = Topic::where('id' , $id)
    //     ->firstOrFail();

    // return view('topic.form', compact('topic'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request, $id)
    {
        $topic = Topic::where('id' , $id)
            ->firstOrFail();

        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->save();

        return back()->with('save_status', [
            'message' => 'Update success',
            'status' => 'success'
        ]);
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
