<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\TopicPost;
class TopicPostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // authentication is required on all methods
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $topic = Topic::find($id);
        return view('topicposts.create')->with('topic', $topic);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this -> validate($request, ['body' => 'required']);

        // create a new topic post
        $topicPost = new TopicPost;
        $topicPost->body = $request->input('body');
        $topicPost->user_id = auth()->user()->id;
        $topicPost->topic_id = $request->id;

        $topicPost->save();         // save the topic post.
        return redirect('/topics')->with('success', 'Post added to topic');
    }
}
