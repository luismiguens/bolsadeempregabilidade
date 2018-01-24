<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Speaker;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Speaker controller.
 *
 */
class SpeakerController extends Controller
{
    /**
     * Lists all speaker entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $speakers = $em->getRepository('AppBundle:Speaker')->findAll();

        return $this->render('speaker/index.html.twig', array(
            'speakers' => $speakers,
        ));
    }

    /**
     * Creates a new speaker entity.
     *
     */
    public function newAction(Request $request)
    {
        $speaker = new Speaker();
        $form = $this->createForm('AppBundle\Form\SpeakerType', $speaker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($speaker);
            $em->flush();
            
             $this->get('session')->getFlashBag()->add(
                    'notice', 'Orador criado com sucesso!'
            );

            return $this->redirectToRoute('admin_speaker_edit', array('id' => $speaker->getId()));
        }

        return $this->render('speaker/new.html.twig', array(
            'speaker' => $speaker,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a speaker entity.
     *
     */
//    public function showAction(Speaker $speaker)
//    {
//        $deleteForm = $this->createDeleteForm($speaker);
//
//        return $this->render('speaker/show.html.twig', array(
//            'speaker' => $speaker,
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }

    /**
     * Displays a form to edit an existing speaker entity.
     *
     */
    public function editAction(Request $request, Speaker $speaker)
    {
        $deleteForm = $this->createDeleteForm($speaker);
        $editForm = $this->createForm('AppBundle\Form\SpeakerType', $speaker);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            $this->get('session')->getFlashBag()->add(
                    'notice', 'Orador actualizado com sucesso!'
            );

            return $this->redirectToRoute('admin_speaker_edit', array('id' => $speaker->getId()));
        }

        return $this->render('speaker/edit.html.twig', array(
            'speaker' => $speaker,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a speaker entity.
     *
     */
    public function deleteAction(Request $request, Speaker $speaker)
    {
        $form = $this->createDeleteForm($speaker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($speaker);
            $em->flush();
        }

        return $this->redirectToRoute('admin_speaker_index');
    }

    /**
     * Creates a form to delete a speaker entity.
     *
     * @param Speaker $speaker The speaker entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Speaker $speaker)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_speaker_delete', array('id' => $speaker->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
