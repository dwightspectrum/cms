<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FreelancerSkill extends AbstractMigration
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
        $freelancer_skill = $this->table('freelancer_skill', ['id' => 'freelancer_skill_id']);
        $freelancer_skill->addColumn('freelancer_id', 'integer')
                       ->addColumn('freelancer_skill_name', 'string', ['limit' => 255])
                       ->addColumn('freelancer_skill_status', 'string', ['limit' => 255])
                       ->create();
    }
}
