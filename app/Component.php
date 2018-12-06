<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'component_id',
        'name',
        'description',
        'units',
        'module_order',
        'required',
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
        'units' => 'integer',
        'module_order' => 'integer',
        'required' => 'boolean',
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
