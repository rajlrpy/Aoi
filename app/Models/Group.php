<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'grp';
    protected $primaryKey = 'id';
    protected $fillable=[
        "name",
    ];

    public function person(){
        return $this->hasMany(Person::class);
    }
}
