<?php
/**
 * Created by PhpStorm.
 * User: Duca
 * Date: 10.9.2018.
 * Time: 22.01
 */

namespace App\Models;


class Cena
{
  public $pocetnaCena;
  public $krajnjaCena;
  public $table='cene';


  public function dohvatiCene(){

  }

  public function updejtujCene($idCene){
      return \DB::table($this->table)
          ->where('id',$idCene)
          ->update([
              'krajnjaCena' => $this->krajnjaCena

          ]);
  }
}