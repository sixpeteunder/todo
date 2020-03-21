<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use Carbon\Carbon;

class Todo extends Model
{
    use SoftDeletes;
    use HasTags;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'content' => '',
        'due_at' => null
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'user_id'
    ];

    /**
     * The attributes that will be cast to Carbon instances.
     *
     * @var array
     */
    protected $dates = [
        'due_at'
    ];

    /**
     * Get the todo's imminence string.
     *
     * @return string
     */
    public function getImminenceAttribute()
    {
        return $this->due_at->greaterThanOrEqualTo(Carbon::now())? 'is': 'was';
    }

    /**
     * Get the user that owns the todo.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
