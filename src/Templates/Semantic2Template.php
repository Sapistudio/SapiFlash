<?php

namespace SapiStudio\SimpleFlash\Templates;

use SapiStudio\SimpleFlash\BaseTemplate;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class Semantic2Template.
 * Uses default Semantic UI markdown for flash messages.
 */
class Semantic2Template extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="ui message %s">%s</div>';

    /** Override base function to suite Bootstrap 3 alert naming. */
    public function wrapMessages($messages, $type)
    {
        return sprintf($this->getWrapper(), $type, $messages);
    }
}
