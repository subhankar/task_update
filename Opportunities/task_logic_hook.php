<?php
Class TaskClass{
	function updateTask($bean, $event, $params){
		require_once('modules/Tasks/Task.php');
		global $db;
		if ($params['related_module'] == 'Tasks') {
			//Get Contact info
			$sql = "SELECT contact_id FROM opportunities_contacts WHERE opportunity_id = '".$bean->id."' AND deleted = 0";
			$recRS = $bean->db->query($sql, true);
			$row = $bean->db->fetchByAssoc($recRS);

			$contBean = BeanFactory::getBean('Contacts', $row['contact_id']);
			$contPhone = $contBean->phone_mobile;
			$contEmail = $contBean->email1;
			$contOfficePhone = $contBean->phone_work;
			//Update Task record
			$taskBean = BeanFactory::getBean('Tasks', $params['related_id']);
			$taskBean->phone_info_c = $contPhone;
			$taskBean->email_info_c = $contEmail;
			$taskBean->office_phone_info_c = $contOfficePhone;
			$taskBean->save();
		}//End If			
	}//End Func
}//End Class


?>