<?php

namespace AppBundle\Admin\Form\Type;

use Sfs\AdminBundle\Form\AbstractAdminType;
use Sfs\AdminBundle\Form\Factory\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractAdminType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$this->createForm($builder, $options);
	}

	private function createForm(FormBuilder $builder, array $options) {
		$builder
			->addTab('Informations')
				->addBlock('General', array('column' => 'col-md-8'))
					->add('name')
					->add('content', null, array(
							'attr' => array('class' => 'wysihtml5', 'rows' => 6)
					))
					->add('themeColor', 'sfs_admin_field_color_picker', array(
							'attr' => array('data-color-format' => 'hex')
					))
					->add('products', 'sfs_admin_field_tag_entity', array(
							'class' => 'AppBundle\Entity\Product',
					))
				->endBlock()
			->endTab()
		;
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Category',
		));
	}

	public function getName()
	{
		return 'admin_category';
	}
}