<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    use HasFactory;

    protected $table = 'professores';

    protected $fillable = ['nome','email', 'data_nasc', 'cpf', 'rg'];

}
