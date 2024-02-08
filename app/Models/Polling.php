<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;
    protected $table = 'pollings';

    protected $fillable = ['state_id', 'lga_id', 'ward_id', 'polling_name'];

    // public function state(){
    //     return $this -> belongsTo(State::class);
    // }

    protected $guarded =[];

}
