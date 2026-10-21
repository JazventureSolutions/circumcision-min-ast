<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'header_html', 'footer_html'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
