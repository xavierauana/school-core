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

    public function getTextContent(string $identifier, string $languageCode
    ): ?string;

    public function createIntegerContent(
        string $identifier, Language $language, int $content
    ): IsContentInterface;

    public function createContent(
        string $identifier, string $contentType, Language $language, $content
    ): IsContentInterface;
}