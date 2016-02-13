<?php

namespace AppBundle\Admin;

use Sfs\AdminBundle\Controller\AdminController;
use AppBundle\Admin\Form\Filter\ProductFilterType;

class ProductAdmin extends AdminController
{
	protected $resourceName = "Product";

	public function setListFields() {
		return array(
				'id'			=> array('name' => 'ID'),
				'name'			=> array('name' => 'Name'),
				'code'			=> array('name' => 'Unique Code'),
				'price'			=> array('name' => 'Price'),
				'enabled'		=> array('name' => 'Enabled')
		);
	}

	protected function setUpdateForm($object) {
		$updateForm = $this->createAdminForm(new \AppBundle\Admin\Form\Type\ProductType(), $object);

		return $updateForm;
	}

	public function setFilterForm() {
		$this->filterForm = $this->createForm(new ProductFilterType());
	}
}
