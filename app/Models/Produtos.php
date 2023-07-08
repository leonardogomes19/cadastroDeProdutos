<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "tb_produtos";
    protected $dates = ['deleted_at'];
    protected $fillable = array('codigoID', 'nome', 'linkImg', 'preco', 'CEP');
}
