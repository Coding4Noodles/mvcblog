<?php
	require_once __DIR__."/../app/helpers/session_helper.php";
	require_once  __DIR__."/../app/config/config.php";
	require_once  __DIR__."/../app/libraries/Database.php";
	require_once  __DIR__."/../app/models/User.php";
	require_once  __DIR__."/../app/libraries/Controller.php";
	require_once  __DIR__."/../app/controllers/Pages.php";

	class PagesTest extends \PHPUnit\Framework\TestCase
	{
		//get correct pages content
		// get the actual content to verify whether it's correct
		public function testMethodAgainstView()
		{
			$dummy = new Pages();
			$this->assertSame($this->getActualOutput($dummy->index()), $this->getActualOutput(require_once __DIR__.'/../app/views/index.php'));
			$this->assertSame($this->getActualOutput($dummy->about()), $this->getActualOutput(require_once __DIR__.'/../app/views/about.php'));
			$this->assertSame($this->getActualOutput($dummy->contact()), $this->getActualOutput(require_once __DIR__.'/../app/views/contact.php'));
		}
	}