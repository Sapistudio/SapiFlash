<?php
namespace SapiStudio\SimpleFlash;

interface TemplateInterface
{
    /** wrapMessage() */
    public function wrapMessage($message);
    /** wrapMessages() */
    public function wrapMessages($messages, $type);
    /** getPrefix()*/
    public function getPrefix();
    /** getPostfix() */
    public function getPostfix();
    /** getWrapper() */
    public function getWrapper();
    /** setPrefix() */
    public function setPrefix($prefix);
    /** setPostfix()*/
    public function setPostfix($postfix);
    /** setWrapper()*/
    public function setWrapper($wrapper);
}
