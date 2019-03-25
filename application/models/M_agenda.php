<?php 
	/**
	 * 
	 */
	class M_agenda extends CI_Model
	{
		
		function getAllAgenda(){
			$hsl = $this->db->query("SELECT agenda.*,DATE_FORMAT(agenda_tanggal,'%d/%m/%Y %h:%m') AS tanggal FROM agenda");
     		return $hsl;
		}

		function saveAgenda($tanggal,$pembahasan){
			$hsl = $this->db->query("INSERT INTO agenda(agenda_tanggal,agenda_pembahasan) VALUES ('$tanggal','$pembahasan')");
        	return $hsl;
		}

		function updateAgenda($agenda_id,$tanggal,$pembahasan){
			$hsl = $this->db->query("UPDATE agenda SET agenda_tanggal='$tanggal', agenda_pembahasan='$pembahasan' WHERE agenda_id='$agenda_id'");
        	return $hsl;
		}

		function hapusAgenda($agenda_id){
			$hsl = $this->db->query("DELETE FROM agenda WHERE agenda_id='$agenda_id'");
        	return $hsl;
		}
	}
?>