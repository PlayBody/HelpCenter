<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * Fillable fields for a Job.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'title', 'rank', 'description'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
