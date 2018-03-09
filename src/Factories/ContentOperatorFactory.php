<?php
/**
 * Author: Xavier Au
 * Date: 9/3/2018
 * Time: 11:46 AM
 */

namespace Anacreation\School\Factories;


use Anacreation\School\Contracts\IsContentInterface;
use Anacreation\School\Exceptions\InvalidContentTypeException;

class ContentOperatorFactory
{
    /**
     * @param string $contentType
     * @return \Anacreation\School\Models\ContentTypes\IntegerContent|\Anacreation\School\Models\ContentTypes\TextContent
     * @throws \Anacreation\School\Exceptions\InvalidContentTypeException
     */
    public static function make(string $contentType): IsContentInterface {
        $registeredContentTypes = config('school_core.content_types');

        if (in_array($contentType,
            array_keys($registeredContentTypes))) {
            return new $registeredContentTypes[$contentType]();
        }
        throw new InvalidContentTypeException("Content Type is invalid!");

    }
}