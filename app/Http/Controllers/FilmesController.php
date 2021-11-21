<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\filmes;
use App\Http\Requests\MovieRequest;


class FilmesController extends Controller
{

/////////////////////////////////////////////////////////////////

    private $objUser;
    private $objfilmes;

    public function __construct()
    {
        $this->objUser=new User();
        $this->objfilmes=new filmes();
    }

/////////////////////////////////////////////////////////////////

    public function Lista()
    {
        $filmes = filmes::all();
        return view('table',compact('filmes'));
    }
    public function create()
    {
        $User= User::all();
        return view('create', compact('User'));
    }


    public function store(MovieRequest $request)
    {
        $cad=$this->objfilmes->create([
            'title' =>$request->title,
            'user_id'=>$request->user_id,
            'rating'=>$request->rating,
            'about'=>$request->about
        ]);
        if($cad){
            return redirect()->route('lista.page');
        }
    }


    public function show($id)
    {
        $filmes= filmes::find($id);
        return view('central',compact('filmes'));
    }


    public function edit($id)
    {
        $filmes = filmes::find($id);
        $User = User::all();
        return view('create',compact('filmes','User'));
    }


    public function update(MovieRequest $request, $id)
    {
        $this->objfilmes->where(['id'=>$id])->update([
            'title' =>$request->title,
            'user_id'=>$request->user_id,
            'rating'=>$request->rating,
            'about'=>$request->about
        ]);
        return redirect('filmes');
    }



    public function test()
    {
        return view('central');
    }

    public function destroy($id)
    {
        $del = filmes::destroy($id);
        return($del)?"sim":"não";
    }
}
