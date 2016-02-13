<?php

namespace UserBundle\Admin\Form\Type;

use Sfs\AdminBundle\Form\AbstractAdminType;
use Sfs\AdminBundle\Form\Factory\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractAdminType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$this->createForm($builder, $options);
	}

	private function createForm(FormBuilder $builder, array $options) {
		$builder
			->addTab('Informations générales')
				->addBlock('Généralités', array('column' => 'col-md-6'))
					->add('firstname')
					->add('lastname')
					->add('email')
					->add('gender', 'choice', array(
							'choices' => array(
									'm' => 'Male',
									'f' => 'Female'
							),
							'expanded' => true,
							'widget_type'  => 'inline'
					))
				->endBlock()

				->addBlock('Sécurité', array('column' => 'col-md-6'))
					->add('username')
					->add('plain_password')
					->add('roles')
					->add('enabled')
				->endBlock()
		;
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'UserBundle\Entity\User',
		));
	}

	public function getName()
	{
		return 'admin_user';
	}
}