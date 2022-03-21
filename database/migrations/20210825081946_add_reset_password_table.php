<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddResetPasswordTable extends AbstractMigration
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
        $user_password_reset = $this->table('user_password_reset', ['id' => false, 'primary_key' => ['user_id']]);
        $user_password_reset->addColumn('user_id', 'integer')
                            ->addColumn('reset_hash', 'string', ['limit' => 64])
                            ->addColumn('reset_time', 'datetime')
                            ->addColumn('reset_expiry', 'datetime')
                            ->create();
    }
}
