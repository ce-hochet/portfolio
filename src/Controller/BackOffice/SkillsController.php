<?php

namespace App\Controller\BackOffice;

use App\Entity\Skills;
use App\Form\SkillsType;
use App\Repository\SkillsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SkillsController
 * @package App\Controller\BackOffice
 * @Route("/admin/skills")
 */

Class SkillsController extends AbstractController{

	/** 
	* @Route(name="skill_manage")
	* @param SkillsRepository $skillsRepository
	* @return Response
	*/

 public function manage(SkillsRepository $skillsRepository): Response
    {
        $skills = $skillsRepository->findAll();

        return $this->render("back_office/skills/manage.html.twig", [
            "skills" => $skills
        ]);
    }

    /**
     * @Route("/create", name="skill_create")
     * @param Request $request
     * @return Response
     */
	public function create(Request $request) :Response 
	{
		$skills = new Skills();
		$form = $this->createForm(SkillsType::class,$skills)->handleRequest($request);

		if($form->isSubmitted() && $form->isValid())
		{
			$this->getDoctrine()->getManager()->persist($skills);
			$this->getDoctrine()->getManager()->flush();
			$this->addFlash("success", "La compétence a été ajouté avec succès !");
			return $this->redirectToRoute("skill_manage");
		}
		return $this->render("back_office\skills\create.html.twig", ["form"=>$form->createView()]);
	}

 /**
     * @Route("/{id}/update", name="skill_update")
     * @param Skills skills
     * @return Response
     */
	public function update(Skills $skills, Request $request) :Response 
	{
		
		$form = $this->createForm(SkillsType::class,$skills)->handleRequest($request);

		if($form->isSubmitted() && $form->isValid())
		{
			$this->getDoctrine()->getManager()->persist($skills);
			$this->getDoctrine()->getManager()->flush();
			$this->addFlash("success", "La compétence a été modifié avec succès !");
			return $this->redirectToRoute("skill_manage");
		}
		return $this->render("back_office\skills\update.html.twig", ["form"=>$form->createView()]);
	}


	public function delete() :RedirectResponse 
	{

	}

}