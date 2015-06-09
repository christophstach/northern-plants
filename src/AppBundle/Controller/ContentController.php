<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Form;
use AppBundle\Entity;

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
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $lead = new Entity\Lead();
        $lead->setTimestamp(new \DateTime());
        
        $form = $this->createForm(new Form\LeadType(), $lead);
        
        $form->remove('timestamp');
        $form->add('save', 'submit', array('label' => 'Send'));
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lead);
            $em->flush();
            
            $message = \Swift_Message::newInstance()
                ->setSubject('New Email from the ContactForm')
                ->setFrom('contact@northernplants.com.au')
                ->setTo('christoph.stach@outlook.com')
                ->setBody(
                    'New Email from the ContactForm of www.northernplants.com.au
                    <br />
                    <br />
                    Name: ' . $lead->getName() . '<br />
                    EmailAddress: ' . $lead->getEmailAddress() . '<br />
                    PhoneNumber: ' . $lead->getPhoneNumber() . '<br /><br />
                    Message: ' . $lead->getMessage(),
                    'text/html'
                )
            ;
            
            return $this->redirectToRoute('contact', array('success' => $this->get('mailer')->send($message)));
        } else {
            return array(
                'form' => $form->createView()
            );    
        }
    }


}
