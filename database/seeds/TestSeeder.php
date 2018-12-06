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
        Factory(Module::class)->create();
        Factory(Component::class)->create([ 'module_id' => 1 ]);
        Factory(Component::class)->create([ 'module_id' => 1 ]);
        Factory(Component::class)->create([ 'module_id' => 1 ]);
        Assignment::create([
            'module_id' => 1,
            'organisation_id' => 1,
            'department_id' => null,
        ]);

        Factory(Module::class)->create();
        Factory(Component::class)->create([ 'module_id' => 2 ]);
        Factory(Component::class)->create([ 'module_id' => 2 ]);
        Factory(Component::class)->create([ 'module_id' => 2 ]);
        Factory(Component::class)->create([ 'module_id' => 2 ]);
        Factory(Component::class)->create([ 'module_id' => 2 ]);
        Assignment::create([
            'module_id' => 2,
            'organisation_id' => 1,
            'department_id' => 1,
        ]);

        Factory(Module::class)->create();
        Factory(Component::class)->create([ 'module_id' => 3 ]);
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
