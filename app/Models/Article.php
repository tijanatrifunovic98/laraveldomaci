<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Article extends Model
{
    use HasFactory;
    protected $fillable =['country_id'];
    public function country(){
    return $this->hasOne(Country::class);

    }
 
    
}
