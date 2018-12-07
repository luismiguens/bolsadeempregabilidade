<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $yearNumber = $request->get('year');
        //dump($yearNumber);

        //$year = new \AppBundle\Entity\Year();
        $year = $em->getRepository('AppBundle:Year')->findOneBy(['number' => $yearNumber]);

        $businesses = $year->getBusiness();
        $speakers = $year->getSpeakers();
        $photos = $year->getPhotos();
        $sponsors = $year->getSponsors();

        //dump($businesses);


//        $businesses = $em->getRepository('AppBundle:Business')->findAll();
//        $speakers = $em->getRepository('AppBundle:Speaker')->findAll();
//        $photos = $em->getRepository('AppBundle:Photo')->findAll();
//        $sponsors = $em->getRepository('AppBundle:Sponsor')->findAll();



        return $this->render('AppBundle:default:index.html.twig', array(
                    'year' => $yearNumber,
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
