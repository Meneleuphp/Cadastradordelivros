<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array'
    ];

    protected $guarded = [];  /* ESSA INSTRUÇÂO DEVE SER INSERIDA EM EVENT */

  public function user(){
      /* retorne esta pertence a Models */
      return $this->belongsTo('App\Models|User');
  }


}




