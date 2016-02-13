<?php

namespace UserBundle\Admin;

use Sfs\AdminBundle\Controller\AdminController;
use UserBundle\Admin\Form\Filter\UserFilterType;

class UserAdmin extends AdminController
{
	protected $resourceName = "User";

	public function setListFields() {
		return array(
				'id' 				=> array('name' => 'ID'),
				'username'			=> array('name' => 'Pseudo'),
				'email'				=> array('name' => 'Email'),
				'firstname'			=> array('name' => 'Prénom'),
				'lastname'			=> array('name' => 'Nom'),
				'enabled'		=> array('name' => 'Enabled')
		);
	}

	protected function setUpdateForm($object) {
		$updateForm = $this->createAdminForm(new \UserBundle\Admin\Form\Type\UserType(), $object);

		return $updateForm;
	}

	public function persistUpdate($em, $object) {
		$userManager = $this->container->get('fos_user.user_manager');
		$userManager->updateUser($object);
	}

	public function setFilterForm() {
		$this->filterForm = $this->createForm(new UserFilterType());
	}
}
