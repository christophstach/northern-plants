<?php

namespace AppBundle\Utils;

class Markdown
{
    /**
     * @var \Parsedown
     */
    private $parser;

    /**
     *
     */
    public function __construct()
    {
        $this->parser = new \Parsedown();
    }

    /**
     * @param string $text
     * @return string
     */
    public function toHtml($text)
    {
        $html = $this->parser->text($text);

        return $html;
    }
}