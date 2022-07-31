<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{

    protected $table = 'cakes';
    //use HasFactory;
    protected $casts = [
        'toppings' => 'array',

    ];

    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
