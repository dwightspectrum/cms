<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FreelancerJobHistory extends AbstractMigration
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
        $freelancer_job_history = $this->table('freelancer_job_history', ['id' => 'freelancer_job_history_id']);
        $freelancer_job_history->addColumn('freelancer_id', 'integer', ['limit' => 1000])
                    ->addColumn('service_scope_list_id', 'integer', ['limit' => 1000])
                    ->addColumn('freelancer_job_history_client', 'string', ['limit' => 1000])
                    ->addColumn('freelancer_job_history_scope', 'string', ['limit' => 1000])
                    ->addColumn('freelancer_job_history_end_user', 'string', ['limit' => 1000])
                    ->addColumn('freelancer_job_location', 'string', ['limit' => 1000])
                    ->addColumn('freelancer_job_history_status', 'string', ['limit' => 1000])
                    ->addColumn('freelancer_job_address', 'string', ['limit' => 1000])
                    ->addColumn('freelancer_job_country', 'string', ['limit' => 1000])
                    ->addColumn('freelancer_job_departure_date', 'datetime')
                    ->addColumn('freelancer_job_return_date', 'datetime')
                    ->addColumn('freelancer_job_entry_date', 'datetime')
                    ->addColumn('freelancer_job_exit_date', 'datetime')
                    ->create();
    }
}
