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
    /**
     *
     */
    const IMPORT = 'import';
    /**
     *
     */
    const BACKUP = 'backup';

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
     */
    public function write_setting($data)
    {
        $this->nosave = true;

        return parent::write_setting($data);
    }
}
