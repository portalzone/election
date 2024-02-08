<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'wards';

    protected $fillable = ['state_id', 'lga_id', 'ward_name'];

    // public function state(){
    //     return $this -> belongsTo(State::class);
    // }

    protected $guarded =[];

}
