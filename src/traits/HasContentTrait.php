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

trait HasContentTrait
{
    public function createContent(
        string $identifier, string $contentType, Language $language, $content
    ): IsContentInterface {

        return ContentOperatorFactory::make($contentType)
                                     ->createContent($this, $identifier,
                                         $language,
                                         $content);
    }

    public function createTextContent(
        string $identifier, Language $language, string $content
    ): IsContentInterface {
        return $this->createContent($identifier, "text", $language,
            $content);
    }

    public function createIntegerContent(
        string $identifier, Language $language, int $content
    ): IsContentInterface {

        return $this->createContent($identifier, "integer", $language,
            $content);
    }

    public function hasContent(): Relation {
        return $this->morphMany(Content::class, 'object');
    }

    public function getTextContent(string $identifier, string $languageCode
    ): ?string {
        $language = Language::whereCode($languageCode)->whereIsActive(1)
                            ->first();
        if ($language) {
            return ContentOperatorFactory::make("text")
                                         ->getContent($this, $identifier,
                                             $language);
        }

        return null;

    }
}