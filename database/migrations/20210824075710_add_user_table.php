<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddUserTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $user = $this->table('user', ['id' => 'user_id']);
        $user->addColumn('role_id', 'integer')
            ->addColumn('user_email_address', 'string', ['limit' => 255])
            ->addColumn('user_password', 'text')
            ->addColumn('user_firstname', 'string', ['limit' => 255])
            ->addColumn('user_lastname', 'string', ['limit' => 255])
            ->addColumn('country_id', 'integer')
            ->addColumn('user_telephone', 'string', ['limit' => 255])
            ->addColumn('user_mobile', 'string', ['limit' => 255])
            ->addColumn('user_address', 'text')
            ->addColumn('user_status', 'string', ['limit' => 255])
            ->create();
    }
}
