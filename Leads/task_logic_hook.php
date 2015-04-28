<?php
Class TaskClass{
	function updateTask($bean, $event, $params){
		require_once('modules/Tasks/Task.php');
		global $db;				
		if ($params['related_module'] == 'Tasks') {
			$taskBean = BeanFactory::getBean('Tasks', $params['related_id']);
			$taskBean->phone_info_c = $bean->phone_mobile;
			$taskBean->email_info_c = $bean->email1;
			$taskBean->office_phone_info_c = $bean->phone_work;
			$taskBean->save();
		}//End If			
	}//End Func
}//End Class


?>