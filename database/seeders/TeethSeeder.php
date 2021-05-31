<?php

namespace Database\Seeders;

use App\Models\Tooth;
use Illuminate\Database\Seeder;

class TeethSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // upper 

        // molars
        Tooth::create([
            'name'=>'Third molar',
            'type'=>'molars',
            'position'=>'upper left'
        ]);

        Tooth::create([
            'name'=>'Second molar',
            'type'=>'molars',
            'position'=>'upper left'
        ]);

        Tooth::create([
            'name'=>'First molar',
            'type'=>'molars',
            'position'=>'upper left'
        ]);

        // premolars
        Tooth::create([
            'name'=>'Second premolar',
            'type'=>'premolars',
            'position'=>'upper left'
        ]);
        Tooth::create([
            'name'=>'First premolar',
            'type'=>'premolars',
            'position'=>'upper left'
        ]);

        // canine
        Tooth::create([
            'name'=>'Canines',
            'type'=>'canines',
            'position'=>'upper left'
        ]);

        // incisors
        Tooth::create([
            'name'=>'Lateral Incisor',
            'type'=>'incisors',
            'position'=>'upper left'
        ]);

        Tooth::create([
            'name'=>'Central Incisor',
            'type'=>'incisors',
            'position'=>'upper left'
        ]);

        Tooth::create([
            'name'=>'Central Incisor',
            'type'=>'incisors',
            'position'=>'upper right'
        ]);

        Tooth::create([
            'name'=>'Lateral Incisor',
            'type'=>'incisors',
            'position'=>'upper right'
        ]);

        Tooth::create([
            'name'=>'Canines',
            'type'=>'canines',
            'position'=>'upper right'
        ]);
        
        // premolars

        Tooth::create([
            'name'=>'First premolar',
            'type'=>'premolars',
            'position'=>'upper right'
        ]);

        Tooth::create([
            'name'=>'Second premolar',
            'type'=>'premolars',
            'position'=>'upper right'
        ]);
        
        // molars

        Tooth::create([
            'name'=>'First molar',
            'type'=>'molars',
            'position'=>'upper right'
        ]);
        

        Tooth::create([
            'name'=>'Second molar',
            'type'=>'molars',
            'position'=>'upper right'
        ]);

        Tooth::create([
            'name'=>'Third molar',
            'type'=>'molars',
            'position'=>'upper right'
        ]);
        

        // lower
        // molars

        Tooth::create([
            'name'=>'Third molar',
            'type'=>'molars',
            'position'=>'lower left'
        ]);

        Tooth::create([
            'name'=>'Second molar',
            'type'=>'molars',
            'position'=>'lower left'
        ]);

        Tooth::create([
            'name'=>'First molar',
            'type'=>'molars',
            'position'=>'lower left'
        ]);

        // premolars
        Tooth::create([
            'name'=>'Second premolar',
            'type'=>'premolars',
            'position'=>'lower left'
        ]);
        Tooth::create([
            'name'=>'First premolar',
            'type'=>'premolars',
            'position'=>'lower left'
        ]);

        // canine
        Tooth::create([
            'name'=>'Canines',
            'type'=>'canines',
            'position'=>'lower left'
        ]);

        // incisors
        Tooth::create([
            'name'=>'Lateral Incisor',
            'type'=>'incisors',
            'position'=>'lower left'
        ]);

        Tooth::create([
            'name'=>'Central Incisor',
            'type'=>'incisors',
            'position'=>'lower left'
        ]);

        Tooth::create([
            'name'=>'Central Incisor',
            'type'=>'incisors',
            'position'=>'lower right'
        ]);

        Tooth::create([
            'name'=>'Lateral Incisor',
            'type'=>'incisors',
            'position'=>'lower right'
        ]);

        Tooth::create([
            'name'=>'Canines',
            'type'=>'canines',
            'position'=>'lower right'
        ]);
        
        // premolars
        
        Tooth::create([
            'name'=>'First premolar',
            'type'=>'premolars',
            'position'=>'lower right'
        ]);
        Tooth::create([
            'name'=>'Second premolar',
            'type'=>'premolars',
            'position'=>'lower right'
        ]);
        // molars
        
        Tooth::create([
            'name'=>'First molar',
            'type'=>'molars',
            'position'=>'lower right'
        ]);

        Tooth::create([
            'name'=>'Second molar',
            'type'=>'molars',
            'position'=>'lower right'
        ]);

        Tooth::create([
            'name'=>'Third molar',
            'type'=>'molars',
            'position'=>'lower right'
        ]);


    }
}
