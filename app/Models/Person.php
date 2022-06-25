<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'salary',
        'group_id'
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
