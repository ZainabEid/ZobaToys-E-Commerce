<?php

use App\Models\Wrap;
use Illuminate\Database\Seeder;

class WrapsTableSeeder extends Seeder
{
   
    public function run()
    {
        $wraps = [
            1=>[
                'ar' => [ 'name'=>'المرحلة العمرية',
                          'description' => 'رضع, مرحلة الحضانةو أطفال',
                        ],
               
                'en' => [ 'name'=>'age',
                          'description' => 'infant,toddler,KG,adult,..',
                        ],
               
                'tr' => [ 'name'=>'yaş',
                          'description' => 'bebek, çocuk, ana okul,..',
                        ],
                        
                ],
            2=>[
                'ar' => [ 'name'=>'النوع',
                          'description' => 'أولاد,بنات,الجنسين',
                        ],
               
                'en' => [ 'name'=>'gender',
                          'description' => 'boys,girls,no gender',
                        ],
               
                'tr' => [ 'name'=>'ginsiyet',
                          'description' => 'oğlanlar, kızlar, ikisi',
                        ],
                        
                ],
            3=>[
                'ar' => [ 'name'=>'المواد التعلمية',
                          'description' => 'عربي, انجليزي,رياضايت,علوم,..',
                        ],
               
                'en' => [ 'name'=>'subject',
                          'description' => 'arabic,math,english,sciense-...',
                        ],
               
                'tr' => [ 'name'=>'madalar',
                          'description' => 'arapca, matimatik, bilmegi, ingizce',
                        ],
                        
                    ],
            4=>[
                'ar' => [ 'name'=>'الخامات',
                          'description' => 'قماش, خشب, مطبوعات',
                        ],
               
                'en' => [ 'name'=>'material',
                          'description' => 'felt,wood,paper-...',
                        ],
               
                'tr' => [ 'name'=>'malzeme',
                          'description' => 'kumaş, Ahşap, evrak , ...',
                        ],
                        
                    ],
        ];

        foreach ($wraps as  $wrap) {
            Wrap::create($wrap);
        }
    }
}
