<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class Addresses extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
	    $this->table('addresses')
	  	->addColumn('name', 'string')
	  	->addColumn('address', 'string')
	  	->addColumn('phone', 'string')
  		->create();

    }
}
