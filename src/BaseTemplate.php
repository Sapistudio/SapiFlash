<?php
namespace SapiStudio\SimpleFlash;

abstract class BaseTemplate implements TemplateInterface
{
    /** BaseTemplate::wrapMessages() */
    abstract public function wrapMessages($messages, $type);

    /** BaseTemplate::wrapMessage()*/
    public function wrapMessage($message)
    {
        return $this->getPrefix() . $message . $this->getPostfix();
    }

    /** BaseTemplate::getPrefix() */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /** BaseTemplate::setPrefix() */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }

    /** BaseTemplate::getPostfix()*/
    public function getPostfix()
    {
        return $this->postfix;
    }

    /**  BaseTemplate::setPostfix()*/
    public function setPostfix($postfix)
    {
        $this->postfix = $postfix;
        return $this;
    }

    /** BaseTemplate::getWrapper()*/
    public function getWrapper()
    {
        return $this->wrapper;
    }

    /** BaseTemplate::setWrapper()*/
    public function setWrapper($wrapper)
    {
        $this->wrapper = $wrapper;
        return $this;
    }

    /** BaseTemplate::__get() */
    public function __get($name)
    {
        throw new \Exception("No \"{$name}\" defined in template! Please, make sure you have prefix, postfix and wrapper defined!");
    }
}