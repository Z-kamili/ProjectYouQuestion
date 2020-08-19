<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationPostQuestion;
use App\Image;
use App\Option;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilsController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::table('questions')->select('questions.titre','questions.id','questions.Desc as Description','questions.created_at','questions.updated_at')->where('questions.ID_user',$id)->paginate(4);
        $count = DB::table('questions')->where('questions.ID_user',$id)->count();
        return view('Profils.Profilsuser',[
            'posts' => $post,
            'count' =>$count
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Question::findOrFail($id);
        $image = Image::where("question_id",$id)->firstorFail();
        $option = Option::where("id",$post->ID_opt)->firstorFail();
        $alloption = Option::all();
        // dd($image->path);
        // $QuestionForum = DB::table('questions')->join('users','users.id', '=' ,'questions.ID_user')->join('images','images.question_id','=','questions.id')->select('questions.titre','images.path','questions.id','questions.Desc as Description','questions.created_at','users.name')->where('questions.id',$id)->get();
        return view('Profils.edit',[
            'posts' =>$post,
            "image"=>$image,
            "option"=>$option,
            "alloption"=>$alloption
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationPostQuestion $request, $id){
    $post = Question::findOrFail($id);
    $post->titre = $request->input('titre');
    $post->Desc = $request->input('Desc');
    $post->ID_opt = $request->input('ID_opt');
    if ($request->hasfile('image')){
        // dd("hello");
              $path =   $request->file('image')->store('question');
              $image = Image::where("question_id",$id)->firstorFail();
              $image->path = $path;
            $post->image()->save($image);
    }
    $post->save();
    $post = DB::table('questions')->select('questions.titre','questions.id','questions.Desc as Description','questions.created_at','questions.updated_at')->where('questions.ID_user',Auth::user()->id)->paginate(4);
    $count = DB::table('questions')->where('questions.ID_user',Auth::user()->id)->count();
    return view('Profils.Profilsuser',[
        'posts' => $post,
        'count' =>$count
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
        $post = Question::findOrFail($id);
        $post->delete();
        // $request->session()->flash('status','Question was deleted!!');
        $post = DB::table('questions')->select('questions.titre','questions.id','questions.Desc as Description','questions.created_at','questions.updated_at')->where('questions.ID_user',Auth::user()->id)->paginate(4);
        $count = DB::table('questions')->where('questions.ID_user',Auth::user()->id)->count();
        return view('Profils.Profilsuser',[
            'posts' => $post,
            'count' =>$count
        ]);
    }
}
