<?php
/**
 * Author: Xavier Au
 * Date: 9/3/2018
 * Time: 11:36 AM
 */

namespace Anacreation\School\traits;


use Anacreation\School\Contracts\HasContentInterface;
use Anacreation\School\Contracts\IsContentInterface;
use Anacreation\School\Models\Content;
use Anacreation\School\Models\Language;
use Illuminate\Database\Eloquent\Relations\Relation;

trait ContentTrait
{
    public function belongsToContent(): Relation {
        return $this->morphMany(Content::class, "content");
    }

    public function createContent(
        HasContentInterface $object, string $identifier, Language $language,
        $content
    ): IsContentInterface {
        $contentObject = $this->saveContent($content);
        $contentObject->belongsToContent()->create([
            "identifier"  => $identifier,
            "object_type" => get_class($object),
            "object_id"   => $object->id,
            "language_id" => $language->id,
        ]);

        return $contentObject;
    }

}