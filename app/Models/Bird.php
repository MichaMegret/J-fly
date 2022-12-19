<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bird extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'french_name',
        'latin_name',
        'description',
        'image'
    ];


    /**
     * Categories that belong to the bird.
     */
    public function Categories()
    {
        return $this->belongsToMany(Categories::class, "bird_category", "bird_id", "category_id");
    }
}
