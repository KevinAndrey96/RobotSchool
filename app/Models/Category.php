<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $description
 */
class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'icon_url'
    ];

}
