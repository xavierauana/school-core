<?php

namespace Anacreation\School\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Content extends Model
{
    protected $fillable = [
        'object_type',
        'object_id',
        'language_id',
        'identifier',
    ];

    public function content(): Relation {
        return $this->morphTo();
    }

    public function object(): Relation {
        return $this->morphTo();
    }
}
