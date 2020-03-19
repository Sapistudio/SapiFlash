<?php
namespace SapiStudio\SimpleFlash\Templates;
use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class Uikit3Template.
 * Uses default Semantic UI markdown for flash messages.
 */
class Uikit3Template extends Uikit2Template implements TemplateInterface
{
    protected $wrapper = '<div uk-alert class="uk-alert-%s">%s</div>';

    /** Override base function to suite Bootstrap 3 alert naming. */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'error') ? 'danger' : $type;
        $type = ($type == 'info') ? 'primary' : $type;
        return sprintf($this->getWrapper(), $type, $messages);
    }
}
