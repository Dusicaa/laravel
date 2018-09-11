<?php
/**
 * Created by PhpStorm.
 * User: Duca
 * Date: 10.9.2018.
 * Time: 21.21
 */

namespace App\Models;


class Licitacija
{
    public $id;
    public $last_user_id;
    public $artikl_id;
    public $pocetno_vreme;
    public $krajnje_vreme;
    public $created_at;
    public $updated_at;
    public $table = 'licitacije';


    public function dohvatiNoveLicitacije()
    {
        return \DB::table($this->table)
            ->join('users', 'users.id', '=', 'licitacije.last_user_id')
            ->join('artikli', 'artikli.id', '=', 'licitacije.artikl_id')
            ->join('slike', 'slike.id', '=', 'artikli.slika_id')
            ->join('cene', 'cene.id', '=', 'artikli.cena_id')
            ->where(

                'licitacije.krajnje_vreme', '>', date_timestamp_get(now())

            )
            ->select('licitacije.*', 'artikli.*', 'users.name', 'slike.src', 'slike.alt', 'cene.pocetnaCena', 'cene.krajnjaCena',
                'artikli.cena_id','licitacije.id' )
            ->get();

    }

    public function updejtujKorisnika($id)
    {


        return \DB::table($this->table)
            ->where('id',$id)
            ->update([
                'last_user_id' => $this->last_user_id

            ]);
    }


}