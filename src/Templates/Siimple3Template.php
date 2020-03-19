<?php

namespace SapiStudio\SimpleFlash\Templates;

use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class Siimple3Template.
 * Uses default Semantic UI markdown for flash messages.
 */
class Siimple3Template extends SiimpleTemplate implements TemplateInterface
{
    protected $wrapper = '<div class="siimple-alert siimple-alert--%s">%s</div>';

    /** Override base function to suite Bootstrap 3 alert naming. */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'info') ? 'primary' : $type;
        return sprintf($this->getWrapper(), $type, $messages);
    }
}
