<?php

namespace App\Http\Controllers;

Use App\Comment;
use App\Topic;
use App\Http\Requests\CommentRequest;
Use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(CommentRequest $request)
    {

        $Comment = new Comment();

        $request->request->add(['user_id' => auth()->user()->id]);
        $Comment->create($request->only(['comment', 'topic_id', 'user_id']));

        return back()->with('save_status', [
            'message' => 'Your comment saved',
            'status' => 'success'
        ]);
        //     $topics = Topic::with('user')
        //     ->orderBy('id', 'desc')
        //     ->paginate();

        // return view('home', compact('topics'));
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
        $Comment = Comment::find($id);

        $Comment->delete();

        return back()->with('save_status', [
            'message' => 'Your Delete success',
            'status' => 'danger'
        ]);
    }
}
