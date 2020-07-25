<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests\ValidationReply;
use Illuminate\Http\Request;
use App\Question;
use App\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Option;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(ValidationReply $request)
    {
        // dd("hello");
        $data = $request->only(['content']);
        $user = Auth::user();
        $data["users_id"] = $user->id;
        $id_question = Session::get('question_id');
        $data["question_id"] = $id_question[0];
        $reponse = Reply::create($data);
        // dd($data);
        return redirect()->back();

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
        $QuestionForum = DB::table('questions')->join('users','users.id', '=' ,'questions.ID_user')->join('images','images.question_id','=','questions.id')->select('questions.titre','images.path','questions.id','questions.Desc as Description','questions.created_at','users.name')->where('questions.id',$id)->get();
        $reply = DB::table('replies')->join('users','users.id', '=' ,'replies.users_id')->select('replies.content','replies.id','replies.created_at','users.name')->where('replies.question_id',$id)->get();
        $countreply = Reply::where('question_id',$id)->count();
        $commente = DB::table('comments')->join('users','users.id','=','comments.user_id')->select('content_commentaire','reply_id','users.name','comments.created_at')->get();
        // dd($commente);
        Session::push('question_id',$QuestionForum[0]->id);
        return view('Posts.Forum',[
            'postForum' =>$QuestionForum,
            'reply'=>$reply,
            'countreply'=>$countreply,
            'comments'=>$commente

        ]);
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
