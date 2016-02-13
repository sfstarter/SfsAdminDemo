<?php

namespace AppBundle\Admin;

use Sfs\AdminBundle\Controller\AdminController;

class CartAdmin extends AdminController
{
	protected $resourceName = "Cart";

	public function setListFields() {
		return array(
				'id'			=> array('name' => 'ID'),
		);
	}

	protected function setUpdateForm($object) {
		$updateForm = $this->createAdminForm(new \AppBundle\Admin\Form\Type\CartType(), $object);

		return $updateForm;
	}

	public function setFilterForm() {
	}
}
