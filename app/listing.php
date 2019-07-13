<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    //
        // Add many-to-one relationship
    public  function user(){
        // jedan user moze imati mnogo listing-a
        // tj. vise listinga pripada jednom useru
        // listing si aut. kreirao kada si kreirao listing controller tipa resource
        return $this->belongsTo('App\User');
    }
}
