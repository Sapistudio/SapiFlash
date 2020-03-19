<?php

namespace SapiStudio\SimpleFlash\Templates;

use SapiStudio\SimpleFlash\BaseTemplate;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class SpectreTemplate.
 * Uses default Semantic UI markdown for flash messages.
 */
class SpectreTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="toast toast-%s">%s</div>';

    /** Override base function to suite Bootstrap 3 alert naming.*/
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'info') ? 'primary' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
