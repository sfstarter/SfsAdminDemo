<?php

namespace UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class UserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
