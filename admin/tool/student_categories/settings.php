<?php

defined('MOODLE_INTERNAL') || die;

$ADMIN->add('development', new admin_category('student_categories',
    get_string('plugin_name', 'tool_student_categories')));

// Create settings block.
$settings = new admin_settingpage('student_categories_page', get_string('import', 'tool_student_categories'));

$options = [
    'import' => get_string('import_checkbox_description', 'tool_student_categories'),
    'backup' => get_string('import_checkbox_backup_description', 'tool_student_categories'),
];
$settings->add(new \tool_student_categories\admin\settings\import_multi_checkbox('student_categories_import',
        get_string('import', 'tool_student_categories'),
        get_string('import_checkbox', 'tool_student_categories'),
        $options,
        $options
    )
);
// This adds the settings link to the folder/submenu.
$ADMIN->add('student_categories', $settings);
// Prevent Moodle from adding settings block in standard location.
$settings = null;