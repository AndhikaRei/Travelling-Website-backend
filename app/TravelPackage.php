<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id','title','slug','location','about',
        'featured_events','language','foods','departure_date','duration',
        'type','price','deleted_at','added_on'
    ];
    
    protected $hidden =[

    ];

    public function galleries (){
        return $this ->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }
}
