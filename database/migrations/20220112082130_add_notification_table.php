<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddNotificationTable extends AbstractMigration
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
        $notification = $this->table('notification', ['id' => 'notification_id']);
        $notification->addColumn('notification_type', 'string', ['limit' => 255])
                     ->addColumn('notification_type_id', 'integer')
                     ->addColumn('notification_details', 'string', ['limit' => 1000])
                     ->addColumn('notification_date', 'date')
                     ->addColumn('notification_status', 'string', ['limit' => 255])
                     ->create();
    }
}
