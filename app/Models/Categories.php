<?php

namespace App\Models;

use App\Models\Bird;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'color',
    ];

    /**
     * The birds that belong to the category.
     */
    public function users()
    {
        return $this->belongsToMany(Bird::class);
    }

}
