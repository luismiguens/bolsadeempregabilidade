<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
       public function indexAction(Request $request) {

        //return $this->render('AppBundle::default:index.html.twig');
        $em = $this->getDoctrine()->getManager();

        $businesses = $em->getRepository('AppBundle:Business')->findAll();
        $speakers = $em->getRepository('AppBundle:Speaker')->findAll();
        $photos = $em->getRepository('AppBundle:Photo')->findAll();
        $sponsors = $em->getRepository('AppBundle:Sponsor')->findAll();

  
        
        return $this->render('AppBundle:default:index.html.twig', array(
            'businesses' => $businesses,
            'speakers' => $speakers,
            'photos' => $photos,
            'sponsors' => $sponsors,
        ));
        
        
        
    }
    
     public function commingSoonAction(Request $request) {

        
        return $this->render('AppBundle:default:comming-soon.html.twig');
        
        
        
    }

}
