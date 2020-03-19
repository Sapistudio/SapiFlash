<?php

namespace SapiStudio\SimpleFlash\Templates;

use SapiStudio\SimpleFlash\TemplateInterface;

/**
 * Class Siimple2Template.
 * Uses default Semantic UI markdown for flash messages.
 */
class Siimple2Template extends SiimpleTemplate implements TemplateInterface
{
    protected $wrapper = '<div class="siimple-alert siimple-alert--%s">%s</div>';
}
