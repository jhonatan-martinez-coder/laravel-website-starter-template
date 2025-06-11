<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavBarOption extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'type',
        'url',
        'parent_id'
    ];

    public function options(){
        return $this->hasMany(NavBarOption::class);
    }

    public function childrenOptions(){
        return $this->hasMany(NavBarOption::class)->with('options');
    }
}
