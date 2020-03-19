<?php

namespace SapiStudio\SimpleFlash\Templates;

use SapiStudio\SimpleFlash\BaseTemplate;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class Foundation5Template.
 * Uses Foundation 5 markdown for flash messages.
 */
class Foundation5Template extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div data-alert class="alert-box %s radius">%s</div>';

    /** Override base function to suite Foundation alert naming. */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'error') ? 'alert' : $type;
        return sprintf($this->getWrapper(), $type, $messages);
    }
}