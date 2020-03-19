<?php

namespace SapiStudio\SimpleFlash\Templates;

use SapiStudio\SimpleFlash\BaseTemplate;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class TailwindTemplate.
 * Uses default Semantic UI markdown for flash messages.
 */
class TailwindTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="bg-%s-lightest border border-%s-light text-%s-dark px-4 py-3 mb-3 rounded relative" role="alert"">%s</div>';

    /** Override base function to suite Bootstrap 3 alert naming. */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'success') ? 'green' : $type;
        $type = ($type == 'info') ? 'blue' : $type;
        $type = ($type == 'warning') ? 'orange' : $type;
        $type = ($type == 'error') ? 'red' : $type;

        return sprintf($this->getWrapper(), $type, $type, $type, $messages);
    }
}
