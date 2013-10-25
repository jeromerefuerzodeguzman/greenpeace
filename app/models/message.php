<?php

class Message extends Eloquent {

	public static function messages() {
		$results = DB::select('
			SELECT a.* FROM  (
				SELECT b.* FROM `gp_messages` b
				ORDER BY b.`created_at` DESC
			) a
			GROUP BY a.`phonenumber` 
			ORDER BY a.`id` DESC'
			);
		
		return $results;
		
	}

}