<?php 

namespace App\Form;

use App\Entity\Media;

/** 
 * Class MediasType
 * @package App\Form
 */

Class MediasType extends AbstractType{
	/**
	 * @inheritDoc
	*/ 

	public function buildForm(FormBuilderInterface $builder, array $options)
	{

		
	}

/**
	 * @inheritDoc
	*/ 
public function configureOptions(OptionsResolver $resolver)
{
	$resolver->setDefault("data_class", Media::class);
}
}
