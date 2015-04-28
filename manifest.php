<?php

$manifest = array (
	0 =>
	array (
		'acceptable_sugar_versions' =>
		array (
			"exact_matches" => array(),
        	"regex_matches" => array(0 => "7\\.*\\.*"),
		),
	),
	1 =>
	array (
		'acceptable_sugar_flavors' =>
		array (
			0 => 'PRO',
		    1 => 'CORP',
		    2 => 'ENT',
		    3 => 'ULT',
		),
	),
	'readme' => 'Update Task with Lead & Opportunity info',
	'author' => 'Deb Arnab',
	'description' => 'Update Task with Lead & Opportunity info',
	'icon' => '',
	'is_uninstallable' => true,
	'name' => 'task_update_package',
	'published_date' => '2015-04-27',
	'type' => 'module',
	'version' => 1.0,
);


$installdefs = array(
	'id' => 'task_Hook',
	'copy' => array (
		array (
			'from' => '<basepath>/Leads/task_logic_hook.php',
			'to' => 'custom/modules/Leads/task_logic_hook.php',
		),
		array (
			'from' => '<basepath>/Opportunities/task_logic_hook.php',
			'to' => 'custom/modules/Opportunities/task_logic_hook.php',
		),
	),
	'logic_hooks' => array(
		array(
			'module' => 'Leads',
			'hook' => 'after_relationship_add',
			'order' => 121,
			'description' => 'Update Task Info',
			'file' => 'custom/modules/Leads/task_logic_hook.php',
			'class' => 'TaskClass',
			'function' => 'updateTask',
		),
		array(
			'module' => 'Opportunities',
			'hook' => 'after_relationship_add',
			'order' => 121,
			'description' => 'Update Task Info',
			'file' => 'custom/modules/Opportunities/task_logic_hook.php',
			'class' => 'TaskClass',
			'function' => 'updateTask',
		),
	),
);
?>