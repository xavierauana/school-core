<?php
/**
 * Author: Xavier Au
 * Date: 9/3/2018
 * Time: 1:10 PM
 */

namespace Anacreation\School\traits;


use Anacreation\School\Contracts\IsContentInterface;
use Anacreation\School\Factories\ContentOperatorFactory;
use Anacreation\School\Models\Content;
use Anacreation\School\Models\Language;
use Illuminate\Database\Eloquent\Relations\Relation;

trait HsContentTrait
{
    public function createContent(
        string $contentType, Language $language, $content
    ): IsContentInterface {
        $contentOperator = ContentOperatorFactory::make($contentType);

        return $contentOperator->createContent($this, $language, $content);
    }

    public function createTextContent(Language $language, string $content
    ): IsContentInterface {
        $contentOperator = ContentOperatorFactory::make("text");

        return $contentOperator->createContent($this, $language, $content);
    }

    public function createIntegerContent(Language $language, int $content
    ): IsContentInterface {
        $contentOperator = ContentOperatorFactory::make("integer");

        return $contentOperator->createContent($this, $language, $content);
    }

    public function hasContent(): Relation {
        return $this->morphMany(Content::class, 'object');
    }
}