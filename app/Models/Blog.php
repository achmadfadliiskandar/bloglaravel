<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // untuk membuat mass asigment mass asignment nya bisa 2
    // cara satu
    protected $guarded = ['id'];
    // cara dua
    //protected $fillable = ['image','judul','content'];
}
