<?php

namespace SapiStudio\SimpleFlash\Templates;

use SapiStudio\SimpleFlash\BaseTemplate;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class Bootstrap3Template.
 * Uses default Bootstrap 3 markdown for flash messages.
 */
class Bootstrap3Template extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="alert alert-%s" role="alert">%s</div>';

    /** Override base function to suite Bootstrap 3 alert naming.*/
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'error') ? 'danger' : $type;
        return sprintf($this->getWrapper(), $type, $messages);
    }
}