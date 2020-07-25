<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function Question()
    {
        return view('Question',[
            'posts' => Option::all()
        ]);
    }


    public function Home(){
        $data = DB::table('questions')->join('users','users.id', '=' ,'questions.ID_user')->select('questions.titre','questions.id','questions.Desc as Description','questions.created_at','users.name')->paginate(4);
        $categorie = Option::all();
      
        // Session::put('question_id', $data->id);
        // dd($data);
        // $value = session('question_id', $data);
        return view('home',[
            'Data'=> $data,
            'Categories' => $categorie,
        ]);
    }

    public function SignUp(){
        return view('Auhtentification.Signup');
    }
    public function Signin(){
        return view('Auhtentification.Signin');
    }
    public function Forum(){
        return view('Posts.Forum');
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
