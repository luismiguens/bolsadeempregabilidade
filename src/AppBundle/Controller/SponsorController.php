<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sponsor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Sponsor controller.
 *
 */
class SponsorController extends Controller
{
    /**
     * Lists all sponsor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sponsors = $em->getRepository('AppBundle:Sponsor')->findAll();

        return $this->render('sponsor/index.html.twig', array(
            'sponsors' => $sponsors,
        ));
    }

    /**
     * Creates a new sponsor entity.
     *
     */
    public function newAction(Request $request)
    {
        $sponsor = new Sponsor();
        $form = $this->createForm('AppBundle\Form\SponsorType', $sponsor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sponsor);
            $em->flush();
            
             $this->get('session')->getFlashBag()->add(
                    'notice', 'Patrocinador criado com sucesso!'
            );

            return $this->redirectToRoute('admin_sponsor_edit', array('id' => $sponsor->getId()));
        }

        return $this->render('sponsor/new.html.twig', array(
            'sponsor' => $sponsor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sponsor entity.
     *
     */
//    public function showAction(Sponsor $sponsor)
//    {
//        $deleteForm = $this->createDeleteForm($sponsor);
//
//        return $this->render('sponsor/show.html.twig', array(
//            'sponsor' => $sponsor,
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }

    /**
     * Displays a form to edit an existing sponsor entity.
     *
     */
    public function editAction(Request $request, Sponsor $sponsor)
    {
        $deleteForm = $this->createDeleteForm($sponsor);
        $editForm = $this->createForm('AppBundle\Form\SponsorType', $sponsor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
             $this->get('session')->getFlashBag()->add(
                    'notice', 'Patrocinador actualizado com sucesso!'
            );

            return $this->redirectToRoute('admin_sponsor_edit', array('id' => $sponsor->getId()));
        }

        return $this->render('sponsor/edit.html.twig', array(
            'sponsor' => $sponsor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sponsor entity.
     *
     */
    public function deleteAction(Request $request, Sponsor $sponsor)
    {
        $form = $this->createDeleteForm($sponsor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sponsor);
            $em->flush();
        }

        return $this->redirectToRoute('admin_sponsor_index');
    }

    /**
     * Creates a form to delete a sponsor entity.
     *
     * @param Sponsor $sponsor The sponsor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sponsor $sponsor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_sponsor_delete', array('id' => $sponsor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
