<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Fillable fields for a Job.
     *
     * @var array
     */
    protected $fillable = ['title', 'order_num', 'icon_url'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
}
