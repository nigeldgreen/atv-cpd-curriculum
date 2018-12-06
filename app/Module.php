<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\Assign;

class Module extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'module_id',
        'name',
        'description',
        'public',
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
        'public' => 'boolean',
    ];

    /**
     * Relationship to link components to Modules
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function components()
    {
        return $this->hasMany(Component::class);
    }

    /**
     * Relationship to link assignments to Modules
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Check to see if a course is required, based on the required property of it's child components
     *
     * @return bool
     */
    public function required()
    {
        foreach ($this->components as $component) {
            if ($component->required) {
                return true;
            }
        }

        return false;
    }
}
