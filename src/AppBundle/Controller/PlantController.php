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
        $plant1 = new \stdClass();
        $plant1->name        = 'Tomatoe';
        $plant1->description = '';
        $plant1->imgSrc      = '';
        $plant1->slug        = 'tomatoe';
        
        $plant2 = new \stdClass();
        $plant2->name        = 'Banana';
        $plant2->description = '';
        $plant2->imgSrc      = '';
        $plant2->slug        = 'banana';
        
        return array(
            'plants' => array($plant1, $plant2)
        );   
    }

    /**
     * @Route("/plant/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $plant = new \stdClass();
        $plant->name        = $slug;
        $plant->description = 'aLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, <strong>no</strong> sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
        
        ' . "\n\n" . '
         sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';
        $plant->imgSrc      = 'http://flavoritetomatoes.com.au/wp-content/uploads/new_truss_tomatoes.jpg';
        $plant->slug        = $slug;
        
        return array(
            'plant' => $plant
        ); 
    }

}


