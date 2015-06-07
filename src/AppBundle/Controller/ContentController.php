<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ContentController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $content = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Content')
            ->findOneBySlug('home');
            
        if (!$content) {
            throw $this->createNotFoundException(
                'No page found for "home"'
            );
        }
        
        return array(
            'content' => $content
        ); 
    }  
    
    /**
     * @Route("/page/{slug}")
     * @Template()
     */
    public function pageAction($slug)
    {      
        $content = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Content')
            ->findOneBySlug($slug);
            
        if (!$content) {
            throw $this->createNotFoundException(
                'No page found for "' . $slug . '"'
            );
        }
        
        return array(
            'content' => $content
        );
    }
    
    /**
     * @Route("/contact")
     * @Template()
     */
    public function contactAction()
    {
        return array(
            // ...
        );   
    }


}
