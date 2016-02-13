<?php

namespace AppBundle\Admin\Form\Filter;

use Symfony\Component\Form\FormBuilderInterface;
use Sfs\AdminBundle\Form\AbstractFilterType;

class ProductFilterType extends AbstractFilterType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('id', 'filter_number');
		$builder->add('name', 'filter_text');
		$builder->add('enabled', 'sfs_admin_filter_boolean');
		$builder->add('updatedAt', 'sfs_admin_filter_datetime_range', array(
			'left_datetime_options' => array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy',
					'label' => 'From',
					'attr' => array(
							'data-date-locale' => 'fr',
							'data-date-format' => 'DD/MM/YYYY'
					)
			),
			'right_datetime_options' => array(
					'widget' => 'single_text',
					'format' => 'dd/MM/yyyy',
					'label' => 'To',
					'attr' => array(
							'data-date-locale' => 'fr',
							'data-date-format' => 'DD/MM/YYYY'
					)
			),
			'required'               => false,
			'data_extraction_method' => 'default',
		));
	}

	public function getName() {
		return 'product_filter';
	}
}
