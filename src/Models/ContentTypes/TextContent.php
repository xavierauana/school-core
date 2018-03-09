<?php

namespace Anacreation\School\Models\ContentTypes;

use Anacreation\School\Contracts\IsContentInterface;
use Anacreation\School\traits\ContentTrait;
use Illuminate\Database\Eloquent\Model;

class TextContent extends Model implements IsContentInterface
{
    use ContentTrait;

    public function saveContent($content): IsContentInterface {
        $this->content = $content;
        $this->save();

        return $this;
    }

    public function showContent() {
        return $this->content;
    }
}
