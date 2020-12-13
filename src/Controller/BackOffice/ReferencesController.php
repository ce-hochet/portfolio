<?php

namespace App\Controller\BackOffice;

use App\Entity\References;
use App\Form\ReferencesType;
use App\Repository\ReferencesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ReferencesController
 * @package App\Controller\BackOffice
 * @Route("/admin/references")
 */

Class ReferencesController extends AbstractController{

	/** 
	* @Route(name="reference_manage")
	* @param ReferencesRepository $referencesRepository
	* @return Response
	*/

	public function manage(ReferencesRepository $referencesRepository): Response
	{
		$references = $referencesRepository->findAll();

		return $this->render("back_office/references/manage.html.twig", [
			"references" => $references
		]);
	}

    /**
     * @Route("/create", name="reference_create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) :Response 
    {
    	$references = new References();
    	$form = $this->createForm(ReferencesType::class,$references)->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid())
    	{
    		$this->getDoctrine()->getManager()->persist($references);
    		$this->getDoctrine()->getManager()->flush();
    		$this->addFlash("success", "La référence a été ajouté avec succès !");
    		return $this->redirectToRoute("reference_manage");
    	}
    	return $this->render("back_office\references\create.html.twig", ["form"=>$form->createView()]);
    }

 /**
     * @Route("/{id}/update", name="reference_update")
     * @param References references
     * @return Response
     */
 public function update(References $references, Request $request) :Response 
 {

 	$form = $this->createForm(ReferencesType::class,$references)->handleRequest($request);

 	if($form->isSubmitted() && $form->isValid())
 	{
 		$this->getDoctrine()->getManager()->flush();
 		$this->addFlash("success", "La référence a été modifié avec succès !");
 		return $this->redirectToRoute("reference_manage");
 	}
 	return $this->render("back_office\references\update.html.twig", ["form"=>$form->createView()]);
 }

 /**
     * @Route("/{id}/delete", name="reference_delete")
     * @param References references
     * @return RedirectResponse
     */
 public function delete(References $references) :RedirectResponse 
 {
 	$this->getDoctrine()->getManager()->remove($references);
 	$this->getDoctrine()->getManager()->flush();
 	$this->addFlash("success", "La référence a été supprimée avec succès !");
 	return $this->redirectToRoute("reference_manage");
 }


}