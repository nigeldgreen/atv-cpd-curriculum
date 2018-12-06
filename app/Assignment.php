<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'organisation_id',
        'department_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $hidden = [
        'id',
    ];
    protected $casts = [
        'course_id' => 'integer',
        'organisation_id' => 'integer',
        'department_id' => 'integer',
    ];

    /**
     * Relationship to link a component to its parent module
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
