<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateBrands extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('brands');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addIndex([
            'name',
        
            ], [
            'name' => 'UNIQUE_NAME',
            'unique' => true,
        ]);
        $table->create();
    }
}