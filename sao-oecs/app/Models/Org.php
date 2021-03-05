<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    use HasFactory;

    protected $fillable = ['org_name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }
}
