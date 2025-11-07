<?php
// database/seeders/PermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Dashboard
            [
                'name' => 'View Dashboard',
                'groupby' => 'Dashboard'
            ],

            // Permission
            [
                'name' => 'View Permission',
                'groupby' => 'Permission'
            ],
            [
                'name' => 'Create Permission',
                'groupby' => 'Permission'
            ],
            [
                'name' => 'Edit Permission',
                'groupby' => 'Permission'
            ],
            [
                'name' => 'Delete Permission',
                'groupby' => 'Permission'
            ],

            // Role
            [
                'name' => 'View Role',
                'groupby' => 'Role'
            ],
            [
                'name' => 'Create Role',
                'groupby' => 'Role'
            ],
            [
                'name' => 'Edit Role',
                'groupby' => 'Role'
            ],
            [
                'name' => 'Delete Role',
                'groupby' => 'Role'
            ],

            // AssignRole
            [
                'name' => 'View AssignRole',
                'groupby' => 'AssignRole'
            ],
            [
                'name' => 'Create AssignRole',
                'groupby' => 'AssignRole'
            ],
            [
                'name' => 'Edit AssignRole',
                'groupby' => 'AssignRole'
            ],
            [
                'name' => 'Delete AssignRole',
                'groupby' => 'AssignRole'
            ],

            // Hero Section
            [
                'name' => 'Hero Section',
                'groupby' => 'Hero Section'
            ],

            // Opportunity Section
            [
                'name' => 'View Opportunity Section',
                'groupby' => 'Opportunity Section'
            ],
            [
                'name' => 'Create Opportunity Section',
                'groupby' => 'Opportunity Section'
            ],
            [
                'name' => 'Edit Opportunity Section',
                'groupby' => 'Opportunity Section'
            ],
            [
                'name' => 'Delete Opportunity Section',
                'groupby' => 'Opportunity Section'
            ],

            // Pricing Section
            [
                'name' => 'View Pricing Section',
                'groupby' => 'Pricing Section'
            ],
            [
                'name' => 'Create Pricing Section',
                'groupby' => 'Pricing Section'
            ],
            [
                'name' => 'Edit Pricing Section',
                'groupby' => 'Pricing Section'
            ],
            [
                'name' => 'Delete Pricing Section',
                'groupby' => 'Pricing Section'
            ],

            // Testimonial Section
            [
                'name' => 'View Testimonial Section',
                'groupby' => 'Testimonial Section'
            ],
            [
                'name' => 'Create Testimonial Section',
                'groupby' => 'Testimonial Section'
            ],
            [
                'name' => 'Edit Testimonial Section',
                'groupby' => 'Testimonial Section'
            ],
            [
                'name' => 'Delete Testimonial Section',
                'groupby' => 'Testimonial Section'
            ],

            // SocialMedia Section
            [
                'name' => 'View SocialMedia Section',
                'groupby' => 'SocialMedia Section'
            ],
            [
                'name' => 'Create SocialMedia Section',
                'groupby' => 'SocialMedia Section'
            ],
            [
                'name' => 'Edit SocialMedia Section',
                'groupby' => 'SocialMedia Section'
            ],
            [
                'name' => 'Delete SocialMedia Section',
                'groupby' => 'SocialMedia Section'
            ],

            // Projects Section
            [
                'name' => 'View Projects Section',
                'groupby' => 'Projects Section'
            ],
            [
                'name' => 'Create Projects Section',
                'groupby' => 'Projects Section'
            ],
            [
                'name' => 'Edit Projects Section',
                'groupby' => 'Projects Section'
            ],
            [
                'name' => 'Delete Projects Section',
                'groupby' => 'Projects Section'
            ],

            // Contact Section
            [
                'name' => 'Contact Section',
                'groupby' => 'Contact Section'
            ],

            // Booking
            [
                'name' => 'View Booking',
                'groupby' => 'Booking'
            ],
            [
                'name' => 'Edit Booking',
                'groupby' => 'Booking'
            ],
            [
                'name' => 'Delete Booking',
                'groupby' => 'Booking'
            ],

            // Plot
            [
                'name' => 'View Plot',
                'groupby' => 'Plot'
            ],
            [
                'name' => 'Create Plot',
                'groupby' => 'Plot'
            ],
            [
                'name' => 'Edit Plot',
                'groupby' => 'Plot'
            ],
            [
                'name' => 'Delete Plot',
                'groupby' => 'Plot'
            ],

            // Setting
            [
                'name' => 'Setting',
                'groupby' => 'Setting'
            ],


            // About Hero
            [
                'name' => 'View About Hero',
                'groupby' => 'About Hero'
            ],

            // About History
            [
                'name' => 'View About History',
                'groupby' => 'About History'
            ],

            // About Mission & Vision
            [
                'name' => 'View About Mission & Vision',
                'groupby' => 'About Mission & Vision'
            ],

            // About Founder
            [
                'name' => 'View About Founder',
                'groupby' => 'About Founder'
            ],

            // About Chairman
            [
                'name' => 'View About Chairman',
                'groupby' => 'About Chairman'
            ],

        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                ['groupby' => $permission['groupby']]
            );
        }

        $this->command->info('Permissions seeded successfully!');
    }
}
