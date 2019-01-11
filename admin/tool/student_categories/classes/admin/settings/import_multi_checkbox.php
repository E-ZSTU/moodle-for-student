<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: novikor
 * Date: 11.01.19
 * Time: 23:43
 */

namespace tool_student_categories\admin\settings;

/**
 * Class import_multi_checkbox
 * @package tool_student_categories\admin\settings
 */
class import_multi_checkbox extends \admin_setting_configmulticheckbox
{
    const TOOL_STUDENT_CATEGORIES = 'tool_student_categories';
    const IMPORT = 'import';
    const BACKUP = 'backup';

    /** @var \tool_student_categories\Importer \tool_student_categories\Importer */
    private $importer;

    public function __construct(
        string $name,
        string $visiblename,
        string $description,
        array $defaultsetting,
        array $choices
    )
    {
        $this->importer = new \tool_student_categories\Importer();

        parent::__construct(
            $name,
            $visiblename,
            $description,
            $defaultsetting,
            $choices
        );
    }


    /**
     * Returns the current setting if it is set
     *
     * @return array
     */
    public function get_setting(): array
    {
        return parent::get_setting() + [self::IMPORT => 1];
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \coding_exception
     */
    public function write_setting($data)
    {
        if (isset($data[self::IMPORT]) && $data[self::IMPORT]) {
            $this->backup_db();
        }
        $this->run_import();

        $this->nosave = true;

        return parent::write_setting($data);
    }

    /**
     * @throws \coding_exception
     */
    private function run_import()
    {
        if ($this->importer->run()) {
            \core\notification::success(get_string('import_success', self::TOOL_STUDENT_CATEGORIES));
        } else {
            \core\notification::error(get_string('import_failed', self::TOOL_STUDENT_CATEGORIES));
        }
    }

    private function backup_db()
    {
        //TODO
    }
}
