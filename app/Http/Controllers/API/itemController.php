<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class itemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index()
    {
        //
        $items=Item::paginate(6);
        return view('dashboard')->with('items',$items);

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
        $$this->validate($request,[
            'title'=>'required|min:4|max:250',
            'image'=>'image|mimes:jpeg,png,avg|max:1000',
            'body'=>'required|min:4|max:100'

            ]);
       
       $destinationchemin=public_path("images");
        $item= new Item();
        $item->title=$request->input('title');
        $filename=$request->file('image');
        $item->image=time().'.'.$filename->getClientOriginalExtension();
        $filename->move($destinationchemin,$item->image);
        $item->body=$request->input('body');
        $item->user_id=Auth::user()->id;
        $item->save();

        session()->flash('success','l item a ete bien ajouté');
        return redirect()->route('dashboard');
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
          //recherche sur un item par identifiant id
        $items=Item::find($id);
        return view('items.item')->with('items',$items); 

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
             $item= Item::find($id);
             $imageancienne=$item->image;
          $validation=Validator::make($request->all(),[
            'title'=>'required|max:25',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1000',
            'body'=>'required|max:100'

            ]);
        $destinationchemin=public_path("images");
        $item->title=$request->input('title');
        $filename=$request->file('image');
        if($filename==null){
            $item->image=$imageancienne;

        }else{
             $item->image=time().'.'.$filename->getClientOriginalExtension();
        $filename->move($destinationpath,$item->image);
        }
       
        $item->body=$request->input('body');
        
        $item->update();
        session()->flash('modifier','l item a ete bien modifiée');
        return redirect()->route('item.show',['id'=>$item->id]);

        
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
         //la recherche sur item par identifiant id
        $item=Item::find($id);
        
        $item->delete();
         return redirect()->route('item.index'); 
    }
     public function create(){
        return view('items.createitem');
    }
     public function edit($id){
        $item=Item::find($id);
        return view('items.itemedit',['item'=>$item]);
    }
     //je redifini cette fonction pour recuperer les items sont supprimees 
    public function softDelete(){
        $deleteditems=Item::onlyTrashed()->get();
        return view('items.deletes',['datadeletes'=>$deleteditems]);

    }
}
