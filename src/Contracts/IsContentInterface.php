<?php
/**
 * Author: Xavier Au
 * Date: 9/3/2018
 * Time: 11:36 AM
 */

namespace Anacreation\School\Contracts;


use Anacreation\School\Models\Language;
use Illuminate\Database\Eloquent\Relations\Relation;

interface IsContentInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function belongsToContent(): Relation;

    /**
     * @param \Anacreation\School\Contracts\HasContentInterface $object
     * @param \Anacreation\School\Models\Language               $language
     * @param                                                   $content
     * @return \Anacreation\School\Contracts\IsContentInterface
     */
    public function createContent(
        HasContentInterface $object, string $identifier, Language $language,
        $content
    ): IsContentInterface;

    /**
     * @param $content
     * @return \Anacreation\School\Contracts\IsContentInterface
     */
    public function saveContent($content): IsContentInterface;

    public function getContent(
        HasContentInterface $contentOwner, string $identifier,
        Language $language
    );

    public function showContent();
}