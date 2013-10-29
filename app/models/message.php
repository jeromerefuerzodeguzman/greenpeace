<?php

class Message extends Eloquent {

	public static function messages() {
		$results = DB::select('
			SELECT 
			     IF(`from` < `to`, 
			         CONCAT(`from`, \'-\', `to`),
			         CONCAT(`to`, \'-\', `from`)
			     ) as conversation_ids, MAX(`created_at`) as `created_at`, COUNT(*) as `total`
			FROM `gp_messages`
			GROUP BY conversation_ids'
			);
		
		return $results;
		
	}

}