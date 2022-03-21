<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FreelancerProfessionalExp extends AbstractMigration
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
        $freelancer_professional_exp = $this->table('freelancer_professional_exp', ['id' => 'freelancer_professional_exp_id']);
        $freelancer_professional_exp->addColumn('freelancer_id', 'integer')
                       ->addColumn('freelancer_name', 'string', ['limit' => 255])
                       ->addColumn('freelancer_address', 'string', ['limit' => 255])
                       ->addColumn('freelancer_position', 'string', ['limit' => 255])
                       ->addColumn('freelancer_year', 'string', ['limit' => 255])
                       ->addColumn('freelancer_professional_exp_status', 'string', ['limit' => 255])
                       ->create();
    }
}
