<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class EvaluationReport extends AbstractMigration
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
        $employee_evaluation_report = $this->table('employee_evaluation_report', ['id' => 'employee_evaluation_report_id']);
        $employee_evaluation_report->addColumn('employee_id', 'integer')
                                    ->addColumn('evaluation_report_data', 'json')
                                    ->addColumn('evaluation_report_status', 'string')
                                    ->create();
    }
}
