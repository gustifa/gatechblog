<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type(){
        return $this->belongsTo(PropertyType::class, 'ptype_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'agen_id','id');
    }
    public function ame(){
        return $this->belongsTo(Amenities::class, 'amenities_id','id');
    }

    
}
