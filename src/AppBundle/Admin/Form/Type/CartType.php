<?php

namespace AppBundle\Admin\Form\Type;

use Sfs\AdminBundle\Form\AbstractAdminType;
use Sfs\AdminBundle\Form\Factory\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CartType extends AbstractAdminType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$this->createForm($builder, $options);
	}

	private function createForm(FormBuilder $builder, array $options) {
		$builder
			->addTab('Informations')
				->addBlock('General', array('column' => 'col-md-8'))
					->add('user', 'sfs_admin_field_select_entity', array(
							'class' => 'UserBundle\Entity\User',
					))
					->add('date', 'sfs_admin_field_datetime_picker')
					->add('products', 'sfs_admin_field_tag_entity', array(
							'class' => 'AppBundle\Entity\Product',
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
			'data_class' => 'AppBundle\Entity\Cart',
		));
	}

	public function getName()
	{
		return 'admin_cart';
	}
}