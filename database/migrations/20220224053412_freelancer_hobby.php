<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FreelancerHobby extends AbstractMigration
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
        $freelancer_hobby = $this->table('freelancer_hobby', ['id' => 'freelancer_hobby_id']);
        $freelancer_hobby->addColumn('freelancer_id', 'integer')
                       ->addColumn('freelancer_hobby_name', 'string', ['limit' => 255])
                       ->addColumn('freelancer_hobby_status', 'string', ['limit' => 255])
                       ->create();
    }
}
