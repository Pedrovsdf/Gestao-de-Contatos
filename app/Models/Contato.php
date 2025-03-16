<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'observacoes',
        'status',
        'user_id',
    ];

    // Define o relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
