<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Job controller.
 *
 */
class JobController extends Controller {

    /**
     * Lists all job entities.
     *
     */
    public function indexAction($year=2020) {
        $em = $this->getDoctrine()->getManager();

        $jobs = $em->getRepository('AppBundle:Job')->findBy(array('year' => $year), array('createdAt'=>'desc'));

        return $this->render('job/index.html.twig', array(
                    'jobs' => $jobs,
        ));
    }

    /**
     * Lists all job entities.
     *
     */
    public function indexUserAction($year=2020) {
        $em = $this->getDoctrine()->getManager();

        $jobs = $em->getRepository('AppBundle:Job')->findBy(array('year' => $year), array('createdAt'=>'desc'));

        return $this->render('job/index_user.html.twig', array(
                    'jobs' => $jobs,
            'year'=> $year
        ));
    }

    /**
     * Lists all job entities.
     *
     */
    public function indexBusinessAction(\AppBundle\Entity\Business $business) {


        //$business_lista = $user->getBusiness();
        //$business = $business_lista[0];
        //$jobs = $em->getRepository('AppBundle:Job')->findAll();

        $jobs = $business->getJobs();


        return $this->render('job/index_business.html.twig', array(
                    'jobs' => $jobs,
        ));
    }

    /**
     * Creates a new job entity.
     *
     */
    public function newAction(Request $request) {
        $job = new Job();
        $form = $this->createForm('AppBundle\Form\JobType', $job, array('user' => $this->getUser()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'notice', 'Oferta de Emprego criada com sucesso!'
            );


            return $this->redirectToRoute('admin_job_edit', array('id' => $job->getId()));
        }

        return $this->render('job/new.html.twig', array(
                    'job' => $job,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a job entity.
     *
     */
    public function showAction(Job $job) {
        $deleteForm = $this->createDeleteForm($job);

        return $this->render('job/show.html.twig', array(
                    'job' => $job,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing job entity.
     *
     */
    public function editAction(Request $request, Job $job) {
        $deleteForm = $this->createDeleteForm($job);
        $editForm = $this->createForm('AppBundle\Form\JobType', $job, array('user' => $this->getUser()));
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->get('session')->getFlashBag()->add(
                    'notice', 'Oferta de Emprego actualizada com sucesso!'
            );

            return $this->redirectToRoute('admin_job_edit', array('id' => $job->getId()));
        }

        return $this->render('job/edit.html.twig', array(
                    'job' => $job,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a job entity.
     *
     */
    public function submitAction(Job $job) {

        $user = $this->getUser();

        if ($user->getJobs()->contains($job)) {
            //delete job association
            $deleteSubmitForm = $this->deleteSubmitForm($job);
            return $this->render('job/submit_user.html.twig', array(
                        'job' => $job,
                        'delete_submit_form' => $deleteSubmitForm->createView()
            ));
        } else {
            $createSubmitForm = $this->createSubmitForm($job);
            return $this->render('job/submit_user.html.twig', array(
                        'job' => $job,
                        'create_submit_form' => $createSubmitForm->createView()
            ));
        }


        //$deleteSubmitForm = $this->createDeleteSubmitForm($job);
    }

    /**
     * Deletes a job entity.
     *
     */
    public function deleteAction(Request $request, Job $job) {
        $form = $this->createDeleteForm($job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($job);
            $em->flush();
        }

        return $this->redirectToRoute('admin_job_index');
    }

    /**
     * Creates a job entity.
     *
     */
    public function createSubmitAction(Request $request, Job $job) {
        $user = $this->getUser();
        $form = $this->createSubmitForm($job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $job->addUser($user);
            $em->merge($job);
            $em->flush();

            // - Enviar email
            $emailEmpresa = $job->getBusiness()->getEmail();
            $emailResponsavelEmpresa = $job->getBusiness()->getUsers()[0]->getEmail();

            $tituloEmprego = $job->getTitle();
            $nomeCandidato = $user->getName();
            $emailCandidato = $user->getEmail();
            $jobsEmpresa = $this->generateUrl('admin_job_index_business', array('id' => $job->getBusiness()->getId()));

            $message = (new \Swift_Message('Candidatura a Emprego submetida em http://bolsadeempregabilidade.pt'))
                    ->setFrom('geral@forumturismo21.org', "Bolsadeempregabilidade.pt")
                    ->setTo($emailEmpresa)
                    ->setCc(['geral@forumturismo21.org', $emailResponsavelEmpresa])
                    ->setBody('Foi submetida uma nova candidatura a emprego no site http://bolsadeempregabilidade.pt com os seguintes dados:' . '<br/>'
                            . 'Titulo do Emprego: ' . '' . $tituloEmprego . '<br/>'
                            . 'Nome do Candidato: ' . '' . $nomeCandidato . '<br/>'
                            . 'Email do Candidato: ' . '' . $emailCandidato . '<br/>'
                            . '<br/>'
                            . 'Em anexo segue o curriculo do candidato e poderá consultar todos os candidatos ' . $tituloEmprego . ' clicando no seguinte <a href="http://bolsadeempregabilidade.pt' . $jobsEmpresa . '">link</a>'
                    )
                    ->setContentType("text/html");
            if ($user->getCv() != NULL):
                $curriculo = $request->getUriForPath('/uploads/curriculo/' . $user->getCv());
                $message->attach(\Swift_Attachment::fromPath($curriculo)->setFilename('curriculo_' . $nomeCandidato . '.' . pathinfo($user->getCv(), PATHINFO_EXTENSION)));
            endif;

            $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->add(
                    'notice', 'Candidatura Criada com Sucesso!'
            );
        }

        return $this->redirectToRoute('admin_job_submit', array('id' => $job->getId()));
    }

    /**
     * Creates a job entity.
     *
     */
    public function deleteSubmitAction(Request $request, Job $job) {
        $user = $this->getUser();
        $form = $this->deleteSubmitForm($job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $job->removeUser($user);
            $em->merge($job);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'notice', 'Candidatura Eliminada com Sucesso!'
            );
        }

        return $this->redirectToRoute('admin_job_submit', array('id' => $job->getId()));
    }

    /**
     * Creates a form to delete a job entity.
     *
     * @param Job $job The job entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Job $job) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_job_delete', array('id' => $job->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    /**
     * Creates a form to delete a job entity.
     *
     * @param Job $job The job entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createSubmitForm(Job $job) {

        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_job_create_submit', array('id' => $job->getId())))
                        ->setMethod('POST')
                        ->getForm()
        ;
    }

    /**
     * Creates a form to delete a job entity.
     *
     * @param Job $job The job entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function deleteSubmitForm(Job $job) {

        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('admin_job_delete_submit', array('id' => $job->getId())))
                        ->setMethod('POST')
                        ->getForm()
        ;
    }

}
