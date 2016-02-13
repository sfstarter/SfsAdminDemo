<?php

namespace AppBundle\Admin\Form\Type;

use Sfs\AdminBundle\Form\AbstractAdminType;
use Sfs\AdminBundle\Form\Factory\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractAdminType
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
					->add('code')
					->add('price', 'sfs_admin_field_slider', array(
							'attr' => array(
								'data-min' => 0,
								'data-max' => 1000,
								'data-postfix' => '€'
							)
					))
					->add('content', null, array(
							'attr' => array('class' => 'wysihtml5', 'rows' => 6)
					))
					->add('categories', 'sfs_admin_field_select_list_entity', array(
							'required' => false,
							'class' => 'AppBundle\Entity\Category',
					))
					->add('enabled', 'sfs_admin_field_switch', array(
							'required' => false
					))
				->endBlock()
				->addBlock('Dates', array('column' => 'col-md-4'))
					->add('createdAt', 'sfs_admin_field_datetime_picker', array(
							'label' => 'Created at',
							'read_only' => true
					))
					->add('updatedAt', 'sfs_admin_field_datetime_picker', array(
							'label' => 'Updated at',
							'read_only' => true
					))
				->endBlock()
			->endTab()
		;
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Product',
		));
	}

	public function getName()
	{
		return 'admin_product';
	}
}