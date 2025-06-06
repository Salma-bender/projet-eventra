<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
    public function event()    // relation entre category et event
    {
        return $this->hasMany(Events::class, 'categorie_id');
    }
}
