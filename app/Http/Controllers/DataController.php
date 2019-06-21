<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items=Item::paginate(6);
        return view('dashboard')->with('items',$items);
    }
    public function datapersonnel($id){
        $user=User::find($id);
        return view('profils.profil')->with('user',$user);
    }
    public function modifiermotpass($id){
        $user=User::find($id);

        return view('profils.update')->with('user',$user);
    }
    public function update(Request $request, $id){
        $user=User::whereId($id)->first();
       $this->Validate($request,[
            'passwod'=>'required|max:25',
            'passwod1'=>'required|max:25'

            ]);
        if($request->input('passwod') == $request->input('passwod1')){
            $user->password =Hash::make($request->input('passwod'));
            session()->flash('success','le mot de passe a été bien modifiée');
            $user->update();

            return view('profils.profil')->with('user',$user);
        }elseif($request->input('passwod')!=$request->input('passwod1')){
            session()->flash('error','les champs ne sont pas egaux');
            return view('profils.update')->with(['user'=>Auth::user()]);
        }
        
    }
}
