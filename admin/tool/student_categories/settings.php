<?php

defined('MOODLE_INTERNAL') || die;

// Create folder / submenu in block menu, modsettings for activity modules, localplugins for Local plugins.
// The default folders are defined in admin/settings/plugins.php.
$ADMIN->add('development', new admin_category('student_categories',
    get_string('plugin_name', 'tool_student_categories')));

// Create settings block.
$settings = new admin_settingpage('student_categories_page', get_string('import', 'tool_student_categories'));

//$settings->add(new admin_setting_configcheckbox('student_categories_import', get_string('import_checkbox', 'tool_student_categories'),
//    get_string('import_checkbox_description', 'tool_student_categories'), 1));
//$settings->add(new admin_setting_configcheckbox('student_categories_import_backup', get_string('backup_checkbox', 'tool_student_categories'),
//    get_string('import_checkbox_backup_description', 'tool_student_categories'), 1));
$settings->add(new admin_setting_configmulticheckbox('student_categories_import',
        get_string('import', 'tool_student_categories'),
        get_string('import_checkbox', 'tool_student_categories'),
        null,
        [
            'import' => get_string('import_checkbox_description', 'tool_student_categories'),
            'backup' => get_string('import_checkbox_backup_description', 'tool_student_categories'),
        ]
    )
);
// This adds the settings link to the folder/submenu.
$ADMIN->add('student_categories', $settings);
// Prevent Moodle from adding settings block in standard location.
$settings = null;