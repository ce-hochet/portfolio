<?php

namespace App\Controller\BackOffice;

use App\Entity\Formations;
use App\Form\FormationsType;
use DateTimeInterface;
use App\Repository\FormationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationsController
 * @package App\Controller\BackOffice
 * @Route("/admin/formations")
 */

Class FormationsController extends AbstractController{

    /** 
    * @Route(name="formation_manage")
    * @param FormationsRepository $formationsRepository
    * @return Response
    */

    public function manage(FormationsRepository $formationsRepository): Response
    {
        $formations = $formationsRepository->findAll();

        return $this->render("back_office/formations/manage.html.twig", [
            "formations" => $formations
        ]);
    }

    /**
     * @Route("/create", name="formation_create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) :Response 
    {
        $formations = new Formations();
        $form = $this->createForm(FormationsType::class,$formations)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->persist($formations);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", "La formation a été ajouté avec succès !");
            return $this->redirectToRoute("formation_manage");
        }
        return $this->render("back_office/formations/create.html.twig", ["form"=>$form->createView()]);
    }

 /**
     * @Route("/{id}/update", name="formation_update")
     * @param Formations formations
     * @return Response
     */
 public function update(Formations $formations, Request $request) :Response 
 {

    $form = $this->createForm(FormationsType::class,$formations)->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $this->getDoctrine()->getManager()->flush();
        $this->addFlash("success", "La compétence a été modifié avec succès !");
        return $this->redirectToRoute("formation_manage");
    }
    return $this->render("back_office\formations\update.html.twig", ["form"=>$form->createView()]);
 }

 /**
     * @Route("/{id}/delete", name="formation_delete")
     * @param Formations formations
     * @return RedirectResponse
     */
 public function delete(Formations $formations) :RedirectResponse 
 {
    $this->getDoctrine()->getManager()->remove($formations);
    $this->getDoctrine()->getManager()->flush();
    $this->addFlash("success", "La compétence a été supprimée avec succès !");
    return $this->redirectToRoute("formation_manage");
 }


}