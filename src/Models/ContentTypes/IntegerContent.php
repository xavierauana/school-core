<?php

namespace Anacreation\School\Models\ContentTypes;

use Anacreation\School\Contracts\IsContentInterface;
use Anacreation\School\traits\ContentTrait;
use Illuminate\Database\Eloquent\Model;

class NumberContent extends Model implements IsContentInterface
{
    use ContentTrait;

    /**
     * @param $content
     * @return \Anacreation\School\Contracts\IsContentInterface
     */
    public function saveContent($content): IsContentInterface {
        if (is_int($content)) {
            $this->content = $content;
            $this->save();

            return $this;
        }
        throw new \InvalidArgumentException('Content should be integer!');
    }
}
