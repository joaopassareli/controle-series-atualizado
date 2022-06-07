<?php

namespace App\Models;

use App\Models\Season;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = ['number'];

    public function season()
    {
        $this->belongsTo(Season::class);
    }
}
