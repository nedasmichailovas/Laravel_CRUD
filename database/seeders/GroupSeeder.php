<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            ['kodas' => 'PI-1', 'pavadinimas' => 'Programu inzinerija 1'],
            ['kodas' => 'PI-2', 'pavadinimas' => 'Programu inzinerija 2'],
            ['kodas' => 'IS-1', 'pavadinimas' => 'Informacines sistemos 1'],
            ['kodas' => 'IS-2', 'pavadinimas' => 'Informacines sistemos 2'],
            ['kodas' => 'KT-1', 'pavadinimas' => 'Kompiuterines technologijos 1'],
        ];
        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}