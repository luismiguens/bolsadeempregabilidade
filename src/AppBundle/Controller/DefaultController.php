<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * Displays a form to edit an existing user entity.
     *
     */
    public function editUserAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $yearNumber = $request->get('year');
        $year = $em->getRepository('AppBundle:Year')->findOneBy(['number' => $yearNumber]);

        $businesses = $year->getBusiness();
        $speakers = $year->getSpeakers();
        $photos = $year->getPhotos();
        $sponsors = $year->getSponsors();

        $userNumber = $request->get('user');
        $user = $em->getRepository('AppBundle:User')->find($userNumber);

        $editUserForm = $this->createForm('AppBundle\Form\UserType', $user);
        $editUserForm->handleRequest($request);

        if ($editUserForm->isSubmitted() && $editUserForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->get('session')->getFlashBag()->add(
                    'notice', 'User actualizado com sucesso!'
            );
        }

        return $this->render('AppBundle:default:index.html.twig', array(
                    'year' => $yearNumber,
                    'businesses' => $businesses,
                    'speakers' => $speakers,
                    'photos' => $photos,
                    'sponsors' => $sponsors,
                    'edit_user_form' => $editUserForm->createView(),
        ));
    }

    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $yearNumber = $request->get('year');
        $year = $em->getRepository('AppBundle:Year')->findOneBy(['number' => $yearNumber]);

        
        $businesses = $em->getRepository('AppBundle:Business')->findBusinessByYear($year);
        //$businesses = $year->getBusiness();
        $speakers = $year->getSpeakers();
        $photos = $year->getPhotos();
        $sponsors = $year->getSponsors();

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
