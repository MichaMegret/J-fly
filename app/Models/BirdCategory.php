<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\BirdCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BirdCategory extends Model
{

    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bird_id',
        'category_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bird_category';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return BirdCategoryFactory::new();
    }

}
