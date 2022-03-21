<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class EmployeeSurvey extends AbstractMigration
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
        $freelancer_survey = $this->table('freelancer_survey', ['id' => 'survey_id']);
        $freelancer_survey->addColumn('freelancer_id', 'integer')
                       ->addColumn('employee_id', 'integer')
                       ->addColumn('freelancer_job_history_id', 'integer')
                       ->addColumn('survey_email', 'string', ['limit' => 255])
                       ->addColumn('survey_category', 'string', ['limit' => 255])
                       ->addColumn('survey_status', 'string', ['limit' => 255])
                       ->create();
    }
}
