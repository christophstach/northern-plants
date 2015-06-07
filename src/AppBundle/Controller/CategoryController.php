<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class CategoryController extends Controller
{
    /**
     * @Route("/category")
     * @Template()
     */
    public function indexAction()
    {
        $categories = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Category')
            ->findAll();
        
        return array(
            'categories' => $categories
        );    
    }
}
