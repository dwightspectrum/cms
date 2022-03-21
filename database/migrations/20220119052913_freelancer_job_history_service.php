<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FreelancerJobHistoryService extends AbstractMigration
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
        $freelancer_job_history_service = $this->table('freelancer_job_history_service', ['id' => 'freelancer_job_history_service_id']);
        $freelancer_job_history_service->addColumn('freelancer_job_history_id', 'integer')
                                       ->addColumn('service_scope_list_id', 'integer')
                                       ->addColumn('freelancer_job_history_service_status', 'string', ['limit' => 1000])  
                                       ->create();
    }
}
