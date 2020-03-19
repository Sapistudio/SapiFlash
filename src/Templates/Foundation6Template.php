<?php

namespace SapiStudio\SimpleFlash\Templates;
use SapiStudio\SimpleFlash\BaseTemplate;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class Foundation6Template.
 * Uses Foundation 6 markdown for flash messages.
 */
class Foundation6Template extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="callout %s">%s</div>';

    /** Override base function to suite Foundation alert naming. */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'info') ? 'primary' : $type;
        $type = ($type == 'error') ? 'alert' : $type;
        return sprintf($this->getWrapper(), $type, $messages);
    }
}
