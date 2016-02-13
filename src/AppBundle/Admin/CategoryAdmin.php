<?php

namespace AppBundle\Admin;

use Sfs\AdminBundle\Controller\AdminController;

class CategoryAdmin extends AdminController
{
	protected $resourceName = "Category";

	public function setListFields() {
		return array(
				'id'			=> array('name' => 'ID'),
				'name'			=> array('name' => 'Name'),
		);
	}

	protected function setUpdateForm($object) {
		$updateForm = $this->createAdminForm(new \AppBundle\Admin\Form\Type\CategoryType(), $object);

		return $updateForm;
	}

	public function setFilterForm() {
	}
}
