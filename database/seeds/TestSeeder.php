<?php

use App\Assignment;
use App\Component;
use App\Module;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fac1 = Factory(Module::class)->create();
        $fac1->components()->saveMany([
            Factory(Component::class)->create(),
            Factory(Component::class)->create(),
            Factory(Component::class)->create(),
        ]);
        Assignment::create([
            'module_id' => 1,
            'organisation_id' => 1,
            'department_id' => null,
        ]);

        $fac2 = Factory(Module::class)->create();
        $fac2->components()->saveMany([
            Factory(Component::class)->create(),
            Factory(Component::class)->create(),
            Factory(Component::class)->create(),
            Factory(Component::class)->create(),
            Factory(Component::class)->create(),
        ]);
        Assignment::create([
            'module_id' => 2,
            'organisation_id' => 1,
            'department_id' => 1,
        ]);

        $fac3 = Factory(Module::class)->create();
        $fac3->components()->saveMany([
            Factory(Component::class)->create(),
        ]);
        Assignment::create([
            'module_id' => 3,
            'organisation_id' => 1,
            'department_id' => 2,
        ]);
        Assignment::create([
            'module_id' => 3,
            'organisation_id' => 2,
            'department_id' => null,
        ]);
    }
}
