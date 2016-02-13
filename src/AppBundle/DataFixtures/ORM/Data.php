<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\Cart;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use UserBundle\Entity\User;

class Data implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$this->generateUsers($manager);
		$this->generateContent($manager);

		$manager->flush();
	}

	private function generateContent(ObjectManager $manager) {
		$products = array(
			array(
				'name' => 'Phone A8181',
				'code' => 'A8181',
				'price' => '180.0',
				'content' => 'Nihil morati post haec militares avidi saepe turbarum adorti sunt Montium primum, qui divertebat in proximo, levi corpore senem atque morbosum, et hirsutis resticulis cruribus eius innexis divaricaturn sine spiramento ullo ad usque praetorium traxere praefecti.',
				'enabled' => true
			),
			array(
					'name' => 'Phone B8',
					'code' => 'PB8',
					'price' => '365.0',
					'content' => 'Et olim licet otiosae sint tribus pacataeque centuriae et nulla suffragiorum certamina set Pompiliani redierit securitas temporis, per omnes tamen quotquot sunt partes terrarum, ut domina suscipitur et regina et ubique patrum reverenda cum auctoritate canities populique Romani nomen circumspectum et verecundum.',
					'enabled' => true
			),
			array(
					'name' => 'Tab Smart 18',
					'code' => 'TAB-S18',
					'price' => '320.0',
					'content' => 'Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac Constantinus iunxerat pater, Megaera quaedam mortalis.',
					'enabled' => true
			)
		);

		foreach($products as $key => $product) {
			$entry = new Product();
			$entry->setName($product['name']);
			$entry->setCode($product['code']);
			$entry->setPrice($product['price']);
			$entry->setContent($product['content']);
			$entry->setEnabled($product['enabled']);
		
			$manager->persist($entry);
		}
	}

	private function generateUsers(ObjectManager $manager) {
		$users = array(
				array(
						'userName' => 'admin',
						'firstName' => 'John',
						'lastName' => 'DOE',
						'email' => 'admin@example.com',
						'password' => 'admin',
						'roles' => array('ROLE_ADMIN'),
						'enabled' => true,
				),
				array(
						'userName' => 'adacosta',
						'firstName' => 'Alfonse',
						'lastName' => 'DA COSTA',
						'email' => 'adacosta@example.com',
						'password' => 'adacosta',
						'enabled' => true,
				),
				array(
						'userName' => 'jessy',
						'firstName' => 'Jessy',
						'lastName' => 'JAMES',
						'email' => 'jj@example.com',
						'password' => 'jessy',
						'enabled' => true,
				),
				array(
						'userName' => 'alice',
						'firstName' => 'Alice',
						'lastName' => 'Flint',
						'email' => 'aflint@example.com',
						'password' => 'alice',
						'enabled' => false,
				)
		);
		
		foreach($users as $key => $user) {
			$entry = new User();
			$entry->setUserName($user['userName']);
			$entry->setFirstName($user['firstName']);
			$entry->setLastName($user['lastName']);
			$entry->setEmail($user['email']);
			$entry->setPlainPassword($user['password']);
			$entry->setEnabled($user['enabled']);
		
			if(isset($user['roles'])) {
				foreach($user['roles'] as $role) {
					$entry->addRole($role);
				}
			}
		
			$manager->persist($entry);
		}
	}
}
