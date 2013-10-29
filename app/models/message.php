<?php

class Message extends Eloquent {

	public static function messages() {
		$results = DB::select('
			SELECT 
			     IF(`from` < `to`, 
			         CONCAT(`from`, \'-\', `to`),
			         CONCAT(`to`, \'-\', `from`)
			     ) as conversation_ids, MAX(`created_at`) as `created_at`, COUNT(*) as `total`, MAX(`new`) as `new`
			FROM `gp_messages`
			GROUP BY conversation_ids
			ORDER BY `created_at` DESC'
			);
		
		return $results;
	}

	public function mark_as_read() {
		$this->new = 0;
		$this->save();

		return $this;
	}

}