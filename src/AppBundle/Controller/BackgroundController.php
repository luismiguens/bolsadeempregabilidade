<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Background;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Background controller.
 *
 */
class BackgroundController extends Controller
{
    /**
     * Lists all background entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $backgrounds = $em->getRepository('AppBundle:Background')->findAll();

        return $this->render('background/index.html.twig', array(
            'backgrounds' => $backgrounds,
        ));
    }

    /**
     * Creates a new background entity.
     *
     */
    public function newAction(Request $request)
    {
        $background = new Background();
        $form = $this->createForm('AppBundle\Form\BackgroundType', $background);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($background);
            $em->flush();

             $this->get('session')->getFlashBag()->add(
                    'notice', 'Background criado com sucesso!'
            );
            
            
            return $this->redirectToRoute('admin_background_edit', array('id' => $background->getId()));
        }

        return $this->render('background/new.html.twig', array(
            'background' => $background,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a background entity.
     *
     */
    public function showAction(Background $background)
    {
        $deleteForm = $this->createDeleteForm($background);

        return $this->render('background/show.html.twig', array(
            'background' => $background,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing background entity.
     *
     */
    public function editAction(Request $request, Background $background)
    {
        $deleteForm = $this->createDeleteForm($background);
        $editForm = $this->createForm('AppBundle\Form\BackgroundType', $background);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            
                        $this->get('session')->getFlashBag()->add(
                    'notice', 'Background actualizado com sucesso!'
            );

            return $this->redirectToRoute('admin_background_edit', array('id' => $background->getId()));
        }

        return $this->render('background/edit.html.twig', array(
            'background' => $background,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a background entity.
     *
     */
    public function deleteAction(Request $request, Background $background)
    {
        $form = $this->createDeleteForm($background);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($background);
            $em->flush();
        }

        return $this->redirectToRoute('admin_background_index');
    }

    /**
     * Creates a form to delete a background entity.
     *
     * @param Background $background The background entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Background $background)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_background_delete', array('id' => $background->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
