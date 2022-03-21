<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class FreelancerCurriculumVitae extends AbstractMigration
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
        $freelancer_curriculum_vitae = $this->table('freelancer_curriculum_vitae', ['id' => 'freelancer_curriculum_vitae_id']);
        $freelancer_curriculum_vitae->addColumn('freelancer_id', 'integer')
                       ->addColumn('freelancer_object', 'string', ['limit' => 255])
                       ->addColumn('freelancer_school_name', 'string', ['limit' => 255])
                       ->addColumn('freelancer_school_address', 'string', ['limit' => 255])
                       ->addColumn('freelancer_course', 'string', ['limit' => 255])
                       ->addColumn('freelancer_graduate', 'integer')
                       ->addColumn('freelancer_graduate_year', 'integer')
                       ->addColumn('freelancer_curriculum_vitae_status', 'string', ['limit' => 255])
                       ->addColumn('freelancer_address_zip_code', 'integer')
                       ->addColumn('freelancer_desired_position', 'string', ['limit' => 255])
                       ->create();
    }
}
