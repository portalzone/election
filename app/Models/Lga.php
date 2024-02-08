<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lga extends Model
{
    protected $table = 'lgas';

    protected $fillable = ['state_id', 'lga_name'];

    // public function state(){
    //     return $this -> belongsTo(State::class);
    // }

    protected $guarded =[];

    use HasFactory;
}
