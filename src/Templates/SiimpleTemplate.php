<?php

namespace SapiStudio\SimpleFlash\Templates;

use SapiStudio\SimpleFlash\BaseTemplate;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class SiimpleTemplate.
 * Uses default Semantic UI markdown for flash messages.
 */
class SiimpleTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="alert alert-%s">%s</div>';

    /** Override base function to suite Bootstrap 3 alert naming. */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'success') ? 'done' : $type;
        return sprintf($this->getWrapper(), $type, $messages);
    }
}
