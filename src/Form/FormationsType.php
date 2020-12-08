<?php 

namespace App\Form;

use App\Entity\Formations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** 
 * Class FormationsType
 * @package App\Form
 */

Class FormationsType extends AbstractType{
	/**
	 * @inheritDoc
	*/ 

	public function buildForm(FormBuilderInterface $builder, array $options)
	{

		$builder->add("name", TextType::class, [
		"label" =>"Nom de la formation :", 
		"attr"=>["placeholder"=> "Entrez le nom de la formation ..."]
		])
				->add("gradeLevel", ChoiceType::class, ["label"=>"Niveau d'étude",
						"choice"=>["BAC"=> 0, "BAC+1"=>1, "BAC+2"=>2,"BAC+3"=>3,"BAC+4"=>4,"BAC+5"=>5], "BAC+8"=>8				
					]);
				->add("description", TextareaType::class, ["label"=>"Description de la formation : ", 
						"attr"=>["placeholder"=>"Entrez une description ..."]
					]);
	}

    /**
	 * @inheritDoc
	*/ 
    public function configureOptions(OptionsResolver $resolver)
    {
    	$resolver->setDefault("data_class", Formations::class);
    }

}