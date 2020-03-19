<?php

namespace SapiStudio\SimpleFlash\Templates;
use SapiStudio\SimpleFlash\BaseTemplate;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class Uikit2Template.
 * Uses default Semantic UI markdown for flash messages.
 */
class Uikit2Template extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '<p>';
    protected $postfix = '</p>';
    protected $wrapper = '<div class="uk-alert uk-alert-%s" data-uk-alert>%s</div>';

    /** Override base function to suite Bootstrap 3 alert naming. */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'error') ? 'danger' : $type;
        return sprintf($this->getWrapper(), $type, $messages);
    }
}
