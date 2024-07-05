<?php
/*
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Language;
use App\Models\Promotion;
use App\Models\Province;
use App\Models\Region;
use App\Models\School;
use App\Models\Stack;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   /* public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

       $stacks = [
            ['name' => 'PHP'], // id: 1
            ['name' => 'JAVA'], // id: 2
            ['name' => 'JAVASCRIPT'], // id: 3
            ['name' => 'REACT'] // id: 4
            
            
        ];
        foreach ($stacks as $stack) {
            Stack::create($stack);
        }

        $languages = [
            ['name' => 'Inglés/Alto'], // id: 1
            ['name' => 'Inglés/Medio'] // id: 2
          
            
        ];
        foreach ($languages as $language) {
            Language::create($language);
        }

        $regions = [
            ['name' => 'Barcelona', 'lat' => 43.36662, 'long' => -5.86112,'iso' => 'BCN'], // id: 1
            ['name' => 'Madrid','lat' => 42.5750554, 'long' => -8.1338558,'iso' => 'MAD'], // id: 2
            ['name' => 'Asturias', 'lat' => 43.36662, 'long' => -5.86112,'iso' => 'AST'], // id: 3
            ['name' => 'Sevilla', 'lat' => 43.36662, 'long' => -5.86112,'iso' => 'SEV'], // id: 4
            ['name' => 'Málaga', 'lat' => 43.36662, 'long' => -5.86112,'iso' => 'MLG'], // id: 5
            ['name' => 'Cantabria', 'lat' => 43.36662, 'long' => -5.86112,'iso' => 'CA'], // id: 6
            ['name' => 'Galicia','lat' => 42.5750554, 'long' => -8.1338558,'iso' => 'GAL'], // id: 7
            ['name' => 'Castilla y Leon', 'lat' => 43.36662, 'long' => -5.86112,'iso' => 'CL'], // id: 8
            ['name' => 'Bilbao', 'lat' => 43.36662, 'long' => -5.86112,'iso' => 'BIL'] // id: 9
            
        ];
        foreach ($regions as $region) {
            Region::create($region);
        }

        $provinces = [
            ['region_id' => 3, 'name' => 'Oviedo', 'lat' => 43.3579649, 'long' => -5.8733862,'iso' => 'OVD'], // id: 1
            ['region_id' => 7, 'name' => 'La Coruña','lat' => 43.37135, 'long' => -8.396,'iso' => 'LCG'], // id: 2
            ['region_id' => 3, 'name' => 'Gijon','lat' => 43.5453, 'long' => -5.66193,'iso' => 'GJN'], // id: 3
            ['region_id' => 1, 'name' => 'Barcelona','lat' => 43.5453, 'long' => -5.66193,'iso' => 'BCN'], // id: 4
            ['region_id' => 2, 'name' => 'Madrid','lat' => 43.5453, 'long' => -5.66193,'iso' => 'MAD'], // id: 5
            ['region_id' => 3, 'name' => 'Asturias','lat' => 43.5453, 'long' => -5.66193,'iso' => 'AST'], // id:6
            ['region_id' => 4, 'name' => 'Sevilla','lat' => 43.5453, 'long' => -5.66193,'iso' => 'SEV'], // id: 7
            ['region_id' => 5, 'name' => 'Málaga','lat' => 43.5453, 'long' => -5.66193,'iso' => 'MLG'], // id: 8
            ['region_id' => 6, 'name' => 'Cantabria','lat' => 43.5453, 'long' => -5.66193,'iso' => 'CA'], // id: 9
            ['region_id' => 7, 'name' => 'Galicia','lat' => 43.5453, 'long' => -5.66193,'iso' => 'GAL'], // id: 10
            ['region_id' => 8, 'name' => 'Castilla y Leon','lat' => 43.5453, 'long' => -5.66193,'iso' => 'CL'], // id: 11
            ['region_id' => 9, 'name' => 'Bilbao','lat' => 43.5453, 'long' => -5.66193,'iso' => 'BIL'], // id: 12
            
            
        ];
        foreach ($provinces as $province) {
            Province::create($province);
        }
        
        $schools = [
            ['province_id' => 4, 'name' => 'Escuela Bar, Barcelona', 'lat' => 43.5453, 'long' => -5.66193], // id: 1
            ['province_id' => 5, 'name' => 'Escuela Mad, Madrid', 'lat' => 43.5453, 'long' => -5.66193], // id: 2
            ['province_id' => 5, 'name' => 'Escuela Mad-S', 'lat' => 43.5453, 'long' => -5.66193], // id: 3
            ['province_id' => 6, 'name' => 'Escuela Ast', 'lat' => 43.5453, 'long' => -5.66193], // id: 4
            ['province_id' => 7, 'name' => 'Escuela Sev', 'lat' => 43.5453, 'long' => -5.66193], // id: 5
            ['province_id' => 8, 'name' => 'Escuela Malg', 'lat' => 43.5453, 'long' => -5.66193], // id: 6
            ['province_id' => 12, 'name' => 'Escuela Bilb, Bilbao', 'lat' => 43.5453, 'long' => -5.66193] // id: 7
            
            
        ];
        foreach ($schools as $school) {
            School::create($school);
        }

        $promotions = [
            ['school_id' => 4, 'name' => 'P1_CODERS', 'nick' => 'P1_CODERS', 'quantity' => 19],
            ['school_id' => 4, 'name' => 'P2_CODERS', 'nick' => 'P2_CODERS', 'quantity' => 18],
            ['school_id' => 4, 'name' => 'P1_CODERS_RU', 'nick' => 'P1_CODERS_RU', 'quantity' => 16],
            ['school_id' => 1, 'name' => 'P5_CODERS', 'nick' => 'P5_CODERS', 'quantity' => 37],
            ['school_id' => 1, 'name' => 'P1_CODERS_AC', 'nick' => 'P1_CODERS_AC', 'quantity' => 7],
            ['school_id' => 1, 'name' => 'P2_CODERS_BAR', 'nick' => 'P2_CODERS_BAR', 'quantity' => 17],
            ['school_id' => 2, 'name' => 'P2_CODERS_MAD', 'nick' => 'P2_CODERS_MAD', 'quantity' => 18],
            ['school_id' => 6, 'name' => 'P1_CODERS_MALG', 'nick' => 'P1_CODERS_MALG', 'quantity' => 24],
            ['school_id' => 5, 'name' => 'P1_CODERS_SEV', 'nick' => 'P1_CODERS_SEV', 'quantity' => 22],
            ['school_id' => 1, 'name' => 'P3_CODERS_BAR', 'nick' => 'P3_CODERS_BAR', 'quantity' => 1]
        ];
        foreach ($promotions as $promo) {
            Promotion::create($promo);
        }

        //\App\Models\Company::factory(10)->create();

        \App\Models\Event::factory(1)->create();

         \App\Models\Coder::factory(59)
            ->create()
            ->each(function($coder){
                
                $numStacks=random_int(1,2);
                $stacks=Stack::select('id')
                    ->inRandomOrder()
                    ->limit($numStacks)
                   ->distinct()
                    ->get();
                    foreach($stacks as $stack){
                     DB::table('coders_stacks')->insert([
                     [
                         'coder_id'=> $coder->id,
                             'stack_id'=> $stack->id,
                             'created_at'=> now(),
                             'updated_at'=> now()
                         ]
                     ]);
                 }

                 $numLanguages=random_int(1,2);
                  $languages=Language::select('id')
                     ->inRandomOrder()
                     ->limit($numLanguages)
                     ->distinct()
                     ->get(); 
                foreach($languages as $language){
                     DB::table('coders_languages')->insert([
                        [
                             'coder_id'=> $coder->id,
                         //'language_id'=> $language->id,
                         'language_id'=>$numLanguages,
                             'created_at'=> now(),
                             'updated_at'=> now()
                         ]
                     ]);
                 }

                 $numlocations=random_int(1,12);
                 $locations=Province::select('id')
                    ->inRandomOrder()
                     ->limit($numlocations)
                     ->distinct()
                     ->get();
                 foreach($locations as $location){
                   DB::table('coders_locations')->insert([
                         [
                             'coder_id'=> $coder->id,
                            'province_id'=> $location->id,
                            'created_at'=> now(),
                         'updated_at'=> now()
                        ]
                     ]);
                }

             });

         \App\Models\Recruiter::factory(20)
             ->create()
             ->each(function($recruiter){
                
                 $numStacks=random_int(1,2);
                $stacks=Stack::select('id')
                    ->inRandomOrder()
                     ->limit($numStacks)
                     ->distinct()
                     ->get();
                 foreach($stacks as $stack){
                     DB::table('recruiters_stacks')->insert([
                        [
                            'recruiter_id'=> $recruiter->id,
                             'stack_id'=> $stack->id,
                             'created_at'=> now(),
                            'updated_at'=> now()
                         ]
                     ]);
                 }

                 $numLanguages=random_int(1,2);
                 $languages=Language::select('id')
                     ->inRandomOrder()
                     ->limit($numLanguages)
                     ->distinct()
                     ->get();
                 foreach($languages as $language){
                     DB::table('recruiters_languages')->insert([
                         [
                             'recruiter_id'=> $recruiter->id,
                         'language_id'=> $language->id,
                             'created_at'=> now(),
                            'updated_at'=> now()
                         ]
                     ]);
                 }

                 $numlocations=random_int(1,12);
                 $locations=Province::select('id')
                     ->inRandomOrder()
                    ->limit($numlocations)
                     ->distinct()
                     ->get();
                 foreach($locations as $location){
                     DB::table('recruiters_locations')->insert([
                         [
                             'recruiter_id'=> $recruiter->id,
                             'province_id'=> $location->id,
                            'created_at'=> now(),
                             'updated_at'=> now()
                         ]
                     ]);
                 }

             });
    }
}




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Stack;
use App\Models\Language;
use App\Models\Region;
use App\Models\Province;
use App\Models\School;
use App\Models\Promotion;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *//*
    public function run(): void
    {
        // Insertar datos en la tabla stacks
        $stacks = [
            ['name' => 'PHP'], // id: 1
            ['name' => 'JAVA'], // id: 2
            ['name' => 'JAVASCRIPT'], // id: 3
            ['name' => 'REACT'] // id: 4
        ];
        foreach ($stacks as $stack) {
            Stack::create($stack);
        }

        // Insertar datos en la tabla languages
        $languages = [
            ['name' => 'Inglés/Alto'], // id: 1
            ['name' => 'Inglés/Medio'] // id: 2
        ];
        foreach ($languages as $language) {
            Language::create($language);
        }

        // Insertar datos en la tabla regions
        $regions = [
            ['name' => 'Barcelona', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'BCN'], // id: 1
            ['name' => 'Madrid', 'lat' => 42.5750554, 'long' => -8.1338558, 'iso' => 'MAD'], // id: 2
            ['name' => 'Asturias', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'AST'], // id: 3
            ['name' => 'Sevilla', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'SEV'], // id: 4
            ['name' => 'Málaga', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'MLG'], // id: 5
            ['name' => 'Cantabria', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'CA'], // id: 6
            ['name' => 'Galicia', 'lat' => 42.5750554, 'long' => -8.1338558, 'iso' => 'GAL'], // id: 7
            ['name' => 'Castilla y Leon', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'CL'], // id: 8
            ['name' => 'Bilbao', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'BIL'] // id: 9
        ];
        foreach ($regions as $region) {
            Region::create($region);
        }

        // Insertar datos en la tabla provinces
        $provinces = [
            ['region_id' => 3, 'name' => 'Oviedo', 'lat' => 43.3579649, 'long' => -5.8733862, 'iso' => 'OVD'], // id: 1
            ['region_id' => 7, 'name' => 'La Coruña', 'lat' => 43.37135, 'long' => -8.396, 'iso' => 'LCG'], // id: 2
            ['region_id' => 3, 'name' => 'Gijon', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'GJN'], // id: 3
            ['region_id' => 1, 'name' => 'Barcelona', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'BCN'], // id: 4
            ['region_id' => 2, 'name' => 'Madrid', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'MAD'], // id: 5
            ['region_id' => 3, 'name' => 'Asturias', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'AST'], // id: 6
            ['region_id' => 4, 'name' => 'Sevilla', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'SEV'], // id: 7
            ['region_id' => 5, 'name' => 'Málaga', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'MLG'], // id: 8
            ['region_id' => 6, 'name' => 'Cantabria', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'CA'], // id: 9
            ['region_id' => 7, 'name' => 'Galicia', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'GAL'], // id: 10
            ['region_id' => 8, 'name' => 'Castilla y Leon', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'CL'], // id: 11
            ['region_id' => 9, 'name' => 'Bilbao', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'BIL'] // id: 12
        ];
        foreach ($provinces as $province) {
            Province::create($province);
        }

        // Insertar datos en la tabla schools
        $schools = [
            ['province_id' => 4, 'name' => 'Escuela Bar, Barcelona', 'lat' => 43.5453, 'long' => -5.66193], // id: 1
            ['province_id' => 5, 'name' => 'Escuela Mad, Madrid', 'lat' => 43.5453, 'long' => -5.66193], // id: 2
            ['province_id' => 5, 'name' => 'Escuela Mad-S', 'lat' => 43.5453, 'long' => -5.66193], // id: 3
            ['province_id' => 6, 'name' => 'Escuela Ast', 'lat' => 43.5453, 'long' => -5.66193], // id: 4
            ['province_id' => 7, 'name' => 'Escuela Sev', 'lat' => 43.5453, 'long' => -5.66193], // id: 5
            ['province_id' => 8, 'name' => 'Escuela Malg', 'lat' => 43.5453, 'long' => -5.66193], // id: 6
            ['province_id' => 12, 'name' => 'Escuela Bilb, Bilbao', 'lat' => 43.5453, 'long' => -5.66193] // id: 7
        ];
        foreach ($schools as $school) {
            School::create($school);
        }

        // Insertar datos en la tabla promotions
        $promotions = [
            ['school_id' => 4, 'name' => 'P1_CODERS', 'nick' => 'P1_CODERS', 'quantity' => 19],
            ['school_id' => 4, 'name' => 'P2_CODERS', 'nick' => 'P2_CODERS', 'quantity' => 18],
            ['school_id' => 4, 'name' => 'P1_CODERS_RU', 'nick' => 'P1_CODERS_RU', 'quantity' => 16],
            ['school_id' => 1, 'name' => 'P5_CODERS', 'nick' => 'P5_CODERS', 'quantity' => 37],
            ['school_id' => 1, 'name' => 'P1_CODERS_AC', 'nick' => 'P1_CODERS_AC', 'quantity' => 7],
            ['school_id' => 1, 'name' => 'P2_CODERS_BAR', 'nick' => 'P2_CODERS_BAR', 'quantity' => 17],
            ['school_id' => 2, 'name' => 'P2_CODERS_MAD', 'nick' => 'P2_CODERS_MAD', 'quantity' => 18],
            ['school_id' => 6, 'name' => 'P1_CODERS_MALG', 'nick' => 'P1_CODERS_MALG', 'quantity' => 24],
            ['school_id' => 5, 'name' => 'P1_CODERS_SEV', 'nick' => 'P1_CODERS_SEV', 'quantity' => 22],
            ['school_id' => 1, 'name' => 'P3_CODERS_BAR', 'nick' => 'P3_CODERS_BAR', 'quantity' => 1]
        ];
        foreach ($promotions as $promo) {
            Promotion::create($promo);
        }

        // Insertar datos en la tabla companies
        $companies = [
            ['name' => 'Company A'], // id: 1
            ['name' => 'Company B'], // id: 2
            ['name' => 'Company C'], // id: 3
            ['name' => 'Company D'], // id: 4
            ['name' => 'Company E'], // id: 5
            ['name' => 'Company F'], // id: 6
            ['name' => 'Company G'], // id: 7
            ['name' => 'Company H'], // id: 8
            ['name' => 'Company I'], // id: 9
            ['name' => 'Company J']  // id: 10
        ];
        foreach ($companies as $company) {
            Company::create($company);
        }

        // Crear eventos y datos asociados a coders y recruiters
        \App\Models\Event::factory(1)->create();

        \App\Models\Coder::factory(59)->create()->each(function($coder){
            $numStacks = random_int(1, 2);
            $stacks = Stack::select('id')->inRandomOrder()->limit($numStacks)->distinct()->get();
            foreach ($stacks as $stack) {
                DB::table('coders_stacks')->insert([
                    [
                        'coder_id' => $coder->id,
                        'stack_id' => $stack->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

            $numLanguages = random_int(1, 2);
            $languages = Language::select('id')->inRandomOrder()->limit($numLanguages)->distinct()->get();
            foreach ($languages as $language) {
                DB::table('coders_languages')->insert([
                    [
                        'coder_id' => $coder->id,
                        'language_id' => $language->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

            $numLocations = random_int(1, 12);
            $locations = Province::select('id')->inRandomOrder()->limit($numLocations)->distinct()->get();
            foreach ($locations as $location) {
                DB::table('coders_locations')->insert([
                    [
                        'coder_id' => $coder->id,
                        'province_id' => $location->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }
        });

        \App\Models\Recruiter::factory(20)->create()->each(function($recruiter){
            $numStacks = random_int(1, 2);
            $stacks = Stack::select('id')->inRandomOrder()->limit($numStacks)->distinct()->get();
            foreach ($stacks as $stack) {
                DB::table('recruiters_stacks')->insert([
                    [
                        'recruiter_id' => $recruiter->id,
                        'stack_id' => $stack->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

            $numLanguages = random_int(1, 2);
            $languages = Language::select('id')->inRandomOrder()->limit($numLanguages)->distinct()->get();
            foreach ($languages as $language) {
                DB::table('recruiters_languages')->insert([
                    [
                        'recruiter_id' => $recruiter->id,
                        'language_id' => $language->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

            $numLocations = random_int(1, 12);
            $locations = Province::select('id')->inRandomOrder()->limit($numLocations)->distinct()->get();
            foreach ($locations as $location) {
                DB::table('recruiters_locations')->insert([
                    [
                        'recruiter_id' => $recruiter->id,
                        'province_id' => $location->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }
        });
    }
}

*/


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Stack;
use App\Models\Language;
use App\Models\Region;
use App\Models\Province;
use App\Models\School;
use App\Models\Promotion;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insertar datos en la tabla stacks
        $stacks = [
            ['name' => 'PHP'], // id: 1
            ['name' => 'JAVA'], // id: 2
            ['name' => 'JAVASCRIPT'], // id: 3
            ['name' => 'REACT'] // id: 4
        ];
        foreach ($stacks as $stack) {
            Stack::create($stack);
        }

        // Insertar datos en la tabla languages
        $languages = [
            ['name' => 'Inglés/Alto'], // id: 1
            ['name' => 'Inglés/Medio'] // id: 2
        ];
        foreach ($languages as $language) {
            Language::create($language);
        }

        // Insertar datos en la tabla regions
        $regions = [
            ['name' => 'Barcelona', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'BCN'], // id: 1
            ['name' => 'Madrid', 'lat' => 42.5750554, 'long' => -8.1338558, 'iso' => 'MAD'], // id: 2
            ['name' => 'Asturias', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'AST'], // id: 3
            ['name' => 'Sevilla', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'SEV'], // id: 4
            ['name' => 'Málaga', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'MLG'], // id: 5
            ['name' => 'Cantabria', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'CA'], // id: 6
            ['name' => 'Galicia', 'lat' => 42.5750554, 'long' => -8.1338558, 'iso' => 'GAL'], // id: 7
            ['name' => 'Castilla y Leon', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'CL'], // id: 8
            ['name' => 'Bilbao', 'lat' => 43.36662, 'long' => -5.86112, 'iso' => 'BIL'] // id: 9
        ];
        foreach ($regions as $region) {
            Region::create($region);
        }

        // Insertar datos en la tabla provinces
        $provinces = [
            ['region_id' => 3, 'name' => 'Oviedo', 'lat' => 43.3579649, 'long' => -5.8733862, 'iso' => 'OVD'], // id: 1
            ['region_id' => 7, 'name' => 'La Coruña', 'lat' => 43.37135, 'long' => -8.396, 'iso' => 'LCG'], // id: 2
            ['region_id' => 3, 'name' => 'Gijon', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'GJN'], // id: 3
            ['region_id' => 1, 'name' => 'Barcelona', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'BCN'], // id: 4
            ['region_id' => 2, 'name' => 'Madrid', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'MAD'], // id: 5
            ['region_id' => 3, 'name' => 'Asturias', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'AST'], // id: 6
            ['region_id' => 4, 'name' => 'Sevilla', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'SEV'], // id: 7
            ['region_id' => 5, 'name' => 'Málaga', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'MLG'], // id: 8
            ['region_id' => 6, 'name' => 'Cantabria', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'CA'], // id: 9
            ['region_id' => 7, 'name' => 'Galicia', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'GAL'], // id: 10
            ['region_id' => 8, 'name' => 'Castilla y Leon', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'CL'], // id: 11
            ['region_id' => 9, 'name' => 'Bilbao', 'lat' => 43.5453, 'long' => -5.66193, 'iso' => 'BIL'] // id: 12
        ];
        foreach ($provinces as $province) {
            Province::create($province);
        }

        // Insertar datos en la tabla schools
        $schools = [
            ['province_id' => 4, 'name' => 'Escuela Bar, Barcelona', 'lat' => 43.5453, 'long' => -5.66193], // id: 1
            ['province_id' => 5, 'name' => 'Escuela Mad, Madrid', 'lat' => 43.5453, 'long' => -5.66193], // id: 2
            ['province_id' => 5, 'name' => 'Escuela Mad-S', 'lat' => 43.5453, 'long' => -5.66193], // id: 3
            ['province_id' => 6, 'name' => 'Escuela Ast', 'lat' => 43.5453, 'long' => -5.66193], // id: 4
            ['province_id' => 7, 'name' => 'Escuela Sev', 'lat' => 43.5453, 'long' => -5.66193], // id: 5
            ['province_id' => 8, 'name' => 'Escuela Malg', 'lat' => 43.5453, 'long' => -5.66193], // id: 6
            ['province_id' => 12, 'name' => 'Escuela Bilb, Bilbao', 'lat' => 43.5453, 'long' => -5.66193] // id: 7
        ];
        foreach ($schools as $school) {
            School::create($school);
        }

        // Insertar datos en la tabla promotions
        $promotions = [
            ['school_id' => 4, 'name' => 'P1_CODERS', 'nick' => 'P1_CODERS', 'quantity' => 19],
            ['school_id' => 4, 'name' => 'P2_CODERS', 'nick' => 'P2_CODERS', 'quantity' => 18],
            ['school_id' => 4, 'name' => 'P1_CODERS_RU', 'nick' => 'P1_CODERS_RU', 'quantity' => 16],
            ['school_id' => 1, 'name' => 'P5_CODERS', 'nick' => 'P5_CODERS', 'quantity' => 37],
            ['school_id' => 1, 'name' => 'P1_CODERS_AC', 'nick' => 'P1_CODERS_AC', 'quantity' => 7],
            ['school_id' => 1, 'name' => 'P2_CODERS_BAR', 'nick' => 'P2_CODERS_BAR', 'quantity' => 17],
            ['school_id' => 2, 'name' => 'P2_CODERS_MAD', 'nick' => 'P2_CODERS_MAD', 'quantity' => 18],
            ['school_id' => 6, 'name' => 'P1_CODERS_MALG', 'nick' => 'P1_CODERS_MALG', 'quantity' => 24],
            ['school_id' => 5, 'name' => 'P1_CODERS_SEV', 'nick' => 'P1_CODERS_SEV', 'quantity' => 22],
            ['school_id' => 1, 'name' => 'P3_CODERS_BAR', 'nick' => 'P3_CODERS_BAR', 'quantity' => 1]
        ];
        foreach ($promotions as $promo) {
            Promotion::create($promo);
        }

        // Insertar datos en la tabla companies
        $companies = [
            ['name' => 'Company A'], // id: 1
            ['name' => 'Company B'], // id: 2
            ['name' => 'Company C'], // id: 3
            ['name' => 'Company D'], // id: 4
            ['name' => 'Company E'], // id: 5
            ['name' => 'Company F'], // id: 6
            ['name' => 'Company G'], // id: 7
            ['name' => 'Company H'], // id: 8
            ['name' => 'Company I'], // id: 9
            ['name' => 'Company J']  // id: 10
        ];
        foreach ($companies as $company) {
            Company::create($company);
        }

        // Crear eventos y datos asociados a coders y recruiters
        \App\Models\Event::factory(1)->create();

        \App\Models\Coder::factory(59)->create()->each(function($coder){
            $numStacks = random_int(1, 2);
            $stacks = Stack::select('id')->inRandomOrder()->limit($numStacks)->distinct()->get();
            foreach ($stacks as $stack) {
                DB::table('coders_stacks')->insert([
                    [
                        'coder_id' => $coder->id,
                        'stack_id' => $stack->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

            $numLanguages = random_int(1, 2);
            $languages = Language::select('id')->inRandomOrder()->limit($numLanguages)->distinct()->get();
            foreach ($languages as $language) {
                DB::table('coders_languages')->insert([
                    [
                        'coder_id' => $coder->id,
                        'language_id' => $language->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

            $numLocations = random_int(1, 12);
            $locations = Province::select('id')->inRandomOrder()->limit($numLocations)->distinct()->get();
            foreach ($locations as $location) {
                DB::table('coders_locations')->insert([
                    [
                        'coder_id' => $coder->id,
                        'province_id' => $location->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }
        });

        \App\Models\Recruiter::factory(20)->create()->each(function($recruiter){
            $numStacks = random_int(1, 2);
            $stacks = Stack::select('id')->inRandomOrder()->limit($numStacks)->distinct()->get();
            foreach ($stacks as $stack) {
                DB::table('recruiters_stacks')->insert([
                    [
                        'recruiter_id' => $recruiter->id,
                        'stack_id' => $stack->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

            $numLanguages = random_int(1, 2);
            $languages = Language::select('id')->inRandomOrder()->limit($numLanguages)->distinct()->get();
            foreach ($languages as $language) {
                DB::table('recruiters_languages')->insert([
                    [
                        'recruiter_id' => $recruiter->id,
                        'language_id' => $language->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }

            $numLocations = random_int(1, 12);
            $locations = Province::select('id')->inRandomOrder()->limit($numLocations)->distinct()->get();
            foreach ($locations as $location) {
                DB::table('recruiters_locations')->insert([
                    [
                        'recruiter_id' => $recruiter->id,
                        'province_id' => $location->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]);
            }
        });
    }
}
