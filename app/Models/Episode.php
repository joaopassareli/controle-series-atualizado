<?php

namespace App\Models;

use App\Models\Season;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['number'];

    protected $casts = [
        'watched' => 'boolean'
    ];

    public function season()
    {
        $this->belongsTo(Season::class);
    }

    //Pode ser feito desta forma para garantir que o $watched será booleano, mas o recomendado é usar o $casts
    // protected function watched(): Attribute
    // {
    //     return new Attribute(
    //         get: fn($watched) => (bool) $watched,
    //         set: fn ($watched) => (bool) $watched,
    //     );
    // }
}
