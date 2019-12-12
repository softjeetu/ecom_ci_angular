<?php


class CategorySeeder extends Seeder {

	private $table = 'category';

	public function run()
	{
		$this->db->truncate($this->table);

		$data = [
			'category_id' => 1,
			'name' => 'Games',
			'about' => 'Games'
		];
		$this->db->insert($this->table, $data);
		
		$data = [
			'category_id' => 2,
			'name' => 'Laptop',
			'about' => 'Laptop'
		];
		$this->db->insert($this->table, $data);
		
		$data = [
			'category_id' => 3,
			'name' => 'Mobile',
			'about' => 'Mobile'
		];
		$this->db->insert($this->table, $data);
	}

}
