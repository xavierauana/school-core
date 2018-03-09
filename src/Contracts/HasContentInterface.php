<?php
/**
 * Author: Xavier Au
 * Date: 9/3/2018
 * Time: 12:34 PM
 */

namespace Anacreation\School\Contracts;


use Anacreation\School\Models\Language;
use Illuminate\Database\Eloquent\Relations\Relation;

interface HasContentInterface
{
    public function hasContent(): Relation;

    public function getContent(
        string $identifier,
        string $languageCode
    );

    public function createContent(
        string $identifier, string $contentType, Language $language, $content
    ): IsContentInterface;
}