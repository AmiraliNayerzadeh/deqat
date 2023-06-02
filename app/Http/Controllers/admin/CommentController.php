<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(21);
        return view('admin.comments.index' , compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'admin.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'user_id' => 'required',
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'approved' => 'required',
            'comment' => 'required',
            'star' => 'required',
        ]);

        Comment::create($valid);
        return redirect(route('comments.index'))->with('msg' , 'دیدگاه مورد نظر شما با موفقیت ایجاد شد');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit' , compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $valid = $request->validate([
            'user_id' => 'required',
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'approved' => 'required',
            'comment' => 'required',
            'star' => 'required',
        ]);

        $comment->updateOrFail($valid);
        return redirect(route('comments.index'))->with('msg' , 'دیدگاه مورد نظر شما با موفقیت بروز شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->deleteOrFail();
        return redirect(route('comments.index'))->with('msg' , 'دیدگاه مورد نظر شما با موفقیت حذف شد');
    }
}
