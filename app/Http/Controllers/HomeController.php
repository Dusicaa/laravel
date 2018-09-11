<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikl;
use App\Models\Licitacija;
use App\Models\Cena;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $data;
    public function __construct()
    {
       // $this->middleware('auth')->except( $this->index());
        $artikl=new Artikl();
        $this->data['artikli']=$artikl->dohvatiSve();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $licitacija=new Licitacija();
        $this->data['licitacije']=$licitacija->dohvatiNoveLicitacije();

        return view('home',$this->data);


    }
    public function licitiraj(Request $request,$id,$idCene){
         $this->validate($request,[
             'aukcija'=>'required'
         ]);
        //kad neko licitira hvatamo ID korisnika i poslednju cenu
       $licitiraj=new Licitacija();
       $licitiraj->last_user_id=Auth::user()->id;
       $licitiraj->updejtujKorisnika($id);
       $cene=new Cena();
       $cene->krajnjaCena=$request->get('aukcija');
      $novaCena= $cene->updejtujCene($idCene);

      if($novaCena){
          return  redirect()->back()->with('success','Uspesno ste ucestvovali u aukciji');
      }
       return  redirect()->back()->with('error','Greska');

    }
    public function welcome()
    {

        return view('welcome',$this->data);
    }


}
