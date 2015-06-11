<?php
	
namespace AppBundle\Twig;

use AppBundle\Utils\Markdown;

class MarkdownExtension extends \Twig_Extension
{
    /**
     * @var Markdown
     */
    private $parser;

    /**
     * @var Markdown
     */
    public function __construct(Markdown $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'md2html',
                array($this, 'markdownToHtml'),
                array('is_safe' => array('html'))
            ),
        );
    }

    /**
     * @param string $content
     * @return string
     */
    public function markdownToHtml($content)
    {
        return $this->parser->toHtml($content);
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'markdown_extension';
    }
}