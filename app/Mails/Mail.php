<?php

namespace App\Mails;

class Mail
{
    /**
     * @var string
     */
    protected $to;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var array
     */
    protected $data;

    /* GETTERS */

    /**
     * @return mixed
     */
    public function to()
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function subject() :string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function body() :string
    {
        $this->body = view($this->template(), $this->data())->raw();

        return $this->body;
    }

    /**
     * @return string
     */
    public function template() :string
    {
        return $this->template;
    }

    /**
     * @return array
     */
    public function data() :array
    {
        return $this->data;
    }

    /* SETTERS */

    /**
     * @param $value
     */
    public function setTo($value)
    {
        $this->to = $value;
    }

    /**
     * @param $value
     */
    public function setSubject($value)
    {
        $this->subject = $value;
    }

    /**
     * @param $value
     */
    public function setBody($value)
    {
        $this->body = $value;
    }

    /**
     * @param $value
     */
    public function setTemplate($value)
    {
        $this->template = $value;
    }

    /**
     * @param $value
     */
    public function setMailData($value)
    {
        $this->data = $value;
    }
}