<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $comment = new Comment([
            'comment' => $request->get('comment'),
            'score' => $request->get('score'),
            'customer_id'=> auth()->user()->id,
            'room_id' => $request->get('room_id'),
        ]);
        $comment->save();

        return redirect(route('rooms'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.commentEdit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        
        if (empty($request->get('comment'))) {
            $comment->comment = $comment->comment;
        } else {
            $comment->comment = $request->get('comment');
        }
        if (empty($request->get('score'))) {
            $comment->score = $comment->score;
        } else {
            $comment->score = $request->get('score');
        }
        $comment->save();
        //$comment->update($request->all());
        return redirect(route('rooms'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return Redirect::back();
    }


    public function comment(Room $room)
    {
        return view('comments.commentRegister', compact('room'));
    }
    public function myComments()
    {
        $comments=Comment::where('customer_id', auth()->user()->id)->get();
        return view('comments.myComments', compact('comments'));
    }
}
