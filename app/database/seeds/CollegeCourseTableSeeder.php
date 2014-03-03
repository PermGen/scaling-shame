<?php

class CollegeCourseTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('college_course')->truncate();

        DB::table('college_course')->insert(array(
            array(
                'course'     => 'BS. INFO. TECH SERVICE MGMT',                
                'created_at'=>new Datetime,
                'updated_at'=>new Datetime
            ),
              array(
                'course'     => 'BS. APP. DEVELOPMENT',                
                'created_at'=>new Datetime,
                'updated_at'=>new Datetime
            ),
              array(
                'course'     => 'BS. MULTIMEDIA ',                
                'created_at'=>new Datetime,
                'updated_at'=>new Datetime
            ),
              array(
                'course'     => 'BS. NETWORKING ',                
                'created_at'=>new Datetime,
                'updated_at'=>new Datetime
            )
            
        ));
    }
}
