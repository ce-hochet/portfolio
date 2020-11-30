<?php 

namespace App\Form;

use App\Entity\Skills;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** 
 * Class SkillsType
 * @package App\Form
 */

Class SkillsType extends AbstractType{
	/**
	 * @inheritDoc
	*/ 

	 public function buildForm(FormBuilderInterface $builder, array $options)
    {

$builder->add("name", TextType::class, [
		"label"=> "Nom de la compétence :",
		"attr" => ["placeholder" => "Entrez le nom de la compétence ..."]
		])
		->add("level", RangeType::class, [
			"label"=>"Votre niveau :",
			"attr"=> [
				"min"=>1,
				"max"=>18]
			])	;
			
    }

/**
	 * @inheritDoc
	*/ 
 public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault("data_class", Skills::class);
    }
}
