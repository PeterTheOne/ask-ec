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
        DB::table('users')->delete();

        $question = Question::create(array(
            'title' => 'test1',
            'fulltext' => 'test2'
        ));

        $user = User::create(array(
            'username' => 'max',
            'password' => Hash::make('my_pass')
        ));
	}

}
