<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PlantController extends Controller
{
    /**
     * @Route("/category/{slug}")
     * @Template()
     */
    public function indexAction($slug)
    {
        $category = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Category')
            ->findOneBySlug($slug);
            
        if (!$category) {
            throw $this->createNotFoundException(
                'No category found for "' . $slug . '"'
            );
        }
            
        return array(
            'category' => $category
        );   
    }

    /**
     * @Route("/plant/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $plant = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Plant')
            ->findOneBySlug($slug);
        
        return array(
            'plant' => $plant
        ); 
    }

}


