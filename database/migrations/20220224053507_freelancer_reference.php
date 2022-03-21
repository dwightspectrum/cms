<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FreelancerReference extends AbstractMigration
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
        $freelancer_reference = $this->table('freelancer_reference', ['id' => 'freelancer_reference_id']);
        $freelancer_reference->addColumn('freelancer_id', 'integer')
                       ->addColumn('freelancer_reference_name', 'string', ['limit' => 255])
                       ->addColumn('freelancer_reference_company', 'string', ['limit' => 255])
                       ->addColumn('freelancer_reference_position', 'string', ['limit' => 255])
                       ->addColumn('freelancer_reference_contact_no', 'string', ['limit' => 255])
                       ->addColumn('freelancer_reference_status', 'string', ['limit' => 255])
                       ->create();
    }
}
