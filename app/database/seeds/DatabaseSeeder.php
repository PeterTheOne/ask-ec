<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call('QuestionTableSeeder');

        DB::table('questions')->delete();

        $question = Question::create(array(
            'title' => 'test1',
            'fulltext' => 'test2'
        ));
	}

}
