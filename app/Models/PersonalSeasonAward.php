<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalSeasonAward extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function app()
    {
        return $this->belongsTo(Application::class);
    }

}
