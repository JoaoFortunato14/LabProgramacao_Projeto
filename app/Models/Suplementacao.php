<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplementacao extends Model
{
    use HasFactory;

    protected $fillable = ['category','nome','preco','info','imagem'];
}
