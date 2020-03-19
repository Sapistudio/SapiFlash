<?php

namespace SapiStudio\SimpleFlash;

class Engine
{
    private $key            = 'flash_messages';
    private $types          = ['error','warning','info','success'];
    private $template       = null;
    private static $engine  = null;
    
    /** Engine::load()*/
    public static function load(){
        if (! isset(self::$engine))
            self::$engine = new self();
        return self::$engine;
    }
    
    /** Engine::initiateTheme() */
    public static function initiateTheme($name = null)
    {
        $class = __NAMESPACE__ . '\\Templates\\' . ucwords($name) . 'Template';
        if (class_exists($class))
            return new $class();
        throw new \Exception("Template \"{$name}\" not found!");
    }
    
    /** Engine::__construct() */
    private function __construct()
    {
        if (!array_key_exists($this->key, $_SESSION))
            $_SESSION[$this->key] = [];
    }

    /** Engine::message()*/
    public function message($message = null, $type = 'info')
    {
        if (is_array($message)){
            foreach ($message as $issue)
                $this->addMessage($issue, $type);
            return $this;
        }
        return $this->addMessage($message, $type);
    }

    /** Engine::addMessage() */
    protected function addMessage($message = '', $type = 'info')
    {
        $type = strip_tags($type);
        if (empty($message) || ! in_array($type, $this->types))
            return $this;
        if (!array_key_exists($type, $_SESSION[$this->key]))
            $_SESSION[$this->key][$type] = [];
        $_SESSION[$this->key][$type][] = $message;
        return $this;
    }

    /** Engine::display() */
    public function display($type = null)
    {
        $result = '';
        if ( ! is_null($type) && ! in_array($type, $this->types)) {
            return $result;
        }
        if (in_array($type, $this->types)) {
            $result .= $this->buildMessages($_SESSION[$this->key][$type], $type);
        } elseif (is_null($type)) {
            foreach ($_SESSION[$this->key] as $messageType => $messages) {
                $result .= $this->buildMessages($messages, $messageType);
            }
        }
        $this->clear($type);
        return $result;
    }

    /** Engine::hasMessages() */
    public function hasMessages($type = null)
    {
        if ( ! is_null($type))
            return ! empty($_SESSION[$this->key][$type]);
        foreach ($this->types as $type) {
            if ( ! empty($_SESSION[$this->key][$type]))
                return true;
        }
        return false;
    }

    /** Engine::clear() */
    public function clear($type = null)
    {
        if (is_null($type)) {
            $_SESSION[$this->key] = [];
        } else{
            unset($_SESSION[$this->key][$type]);
        }
        return $this;
    }

    /** Engine::buildMessages()*/
    protected function buildMessages(array $flashes, $type)
    {
        $template = self::initiateTheme($this->getTemplate());
        $messages = '';
        foreach ($flashes as $msg)
            $messages .= $template->wrapMessage($msg);
        return $template->wrapMessages($messages, $type);
    }

    /** Engine::__toString() */
    public function __toString()
    {
        return $this->display();
    }

    /** Engine::error() */
    public function error($message)
    {
        return $this->message($message, 'error');
    }

    /** Engine::warning() */
    public function warning($message)
    {
        return $this->message($message, 'warning');
    }

    /** Engine::info()*/
    public function info($message)
    {
        return $this->message($message, 'info');
    }

    /** Engine::success()*/
    public function success($message)
    {
        return $this->message($message, 'success');
    }

    /** Engine::setTemplate() */
    public function setTemplate(TemplateInterface $template)
    {
        $this->template = $template;
        return $this;
    }

    /** Engine::getTemplate() */
    public function getTemplate()
    {
        return ($this->template) ? $this->template : Templates::BASE;
    }
}