<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $appends = ['created_at_edit'];

    public function getCreatedAtEditAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->isoFormat('dddd Y/mm/d');
    }
}
