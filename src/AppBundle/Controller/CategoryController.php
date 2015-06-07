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
        $category1 = new \stdClass();
        $category1->imgSrc      = 'http://www.teraproc.com/wp-content/uploads/2015/05/banana-5.jpg';
        $category1->title       = 'Bananas';
        $category1->description = '';
        $category1->slug = 'bananas';
        
        $category2 = new \stdClass();
        $category2->imgSrc      = 'http://flavoritetomatoes.com.au/wp-content/uploads/new_truss_tomatoes.jpg';
        $category2->title       = 'Tomatoes';
        $category2->description = '';
        $category2->slug = 'tomatoes';
        
        $categories = array($category1, $category2);
        
        return array(
            'categories' => $categories
        );    
    }
}
