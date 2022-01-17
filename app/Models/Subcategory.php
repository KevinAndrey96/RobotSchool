<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon_url',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
