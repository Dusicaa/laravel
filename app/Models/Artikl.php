<?php
/**
 * Created by PhpStorm.
 * User: Duca
 * Date: 10.9.2018.
 * Time: 20.35
 */
namespace App\Models;
class Artikl
{
     public $id;
     public $naziv;
     public  $opis;
     public  $slika_id;
     public $cena_id;
     public $kategorija_id;
     public $created_at;
     public  $updated_at;
     public  $table='artikli';



     public function dohvatiSve(){


         return \DB::table($this->table)
             ->join('slike','slike.id','=','artikli.slika_id')
             ->join('cene','cene.id','=','artikli.cena_id')
             ->join('kategorije','kategorije.id','=','artikli.kategorija_id')
             ->select('artikli.*','slike.src','slike.alt','kategorije.naziv','cene.pocetnaCena','artikli.naziv')
             ->get();
     }

     public function dohvatiNaAukciji(){
         return \DB::table($this->table)
             ->join('slike','slike.id','=','artikli.slika_id')
             ->join('cene','cene.id','=','artikli.cena_id')
             ->join('kategorije','kategorije.id','=','artikli.kategorija_id')

             ->select('artikli.*','slike.src','slike.alt','kategorije.naziv','cene.pocetnaCena','cene.krajnjaCena','artikli.naziv')
             ->get();

     }

}