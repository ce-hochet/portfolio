<?php 

namespace App\Form;

use App\Entity\References;
use DateTimeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;




/** 
 * Class ReferencesType
 * @package App\Form
 */

Class ReferencesType extends AbstractType{
	/**
	 * @inheritDoc
	*/ 

	public function buildForm(FormBuilderInterface $builder, array $options)
	{

		$builder->add("title", TextType::class, [
			"label" =>"Nom de la références :", 
			"attr"=>["placeholder"=> "Entrez le nom de la référence ..."]
		])
		->add("company",TextType::class, [
			"label"=>"Nom de l'entreprise :",
			"attr"=>["placeholder"=>"Entrez le nom de l'entreprise'..."]
		])

		->add("description", TextareaType::class, ["label"=>"Description de l'experience professionnelle : ", 
			"attr"=>["placeholder"=>"Entrez une description ..."]
		])
	 ->add("startedAt", DateType::class, [
                "label" => "Début",
                "input" => "datetime_immutable",
                "widget" => "single_text"
            ])
            ->add("endedAt", DateType::class, [
                "label" => "Fin",
                "input" => "datetime_immutable",
                "widget" => "single_text",
                "required" => false
            ])
       ->add("medias", CollectionType::class,[
       	"entry_type"=>"MediasType::class",
       	" allow_add"=>true,
       	" allow_delete"=>true,
       	"by_reference"=>false
       ])
       ;

	}

    /**
	 * @inheritDoc
	*/ 
    public function configureOptions(OptionsResolver $resolver)
    {
    	$resolver->setDefault("data_class", References::class);
    }

}