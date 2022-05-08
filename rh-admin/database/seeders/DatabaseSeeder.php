<?php

namespace Database\Seeders;

use App\Models\AttentionCall;
use App\Models\Bank;
use App\Models\BankAccountType;
use App\Models\Blood;
use App\Models\Capacitation;
use App\Models\CapacitationType;
use App\Models\CivilStatus;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Genders;
use App\Models\IgssAfilliation;
use App\Models\Insurance;
use App\Models\Job;
use App\Models\Kin;
use App\Models\KinType;
use App\Models\License;
use App\Models\Municipality;
use App\Models\Permission;
use App\Models\Poligraph;
use App\Models\PoligraphType;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Role;
use App\Models\Section;
use App\Models\Suspension;
use App\Models\UpdatableDocument;
use App\Models\User;
use App\Models\Vacation;
use App\Models\Vaccine;
use App\Models\VaccineDosis;
use App\Models\VaccineVaccineDose;
use App\Models\Verification;
use App\Models\VerificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CivilStatusSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(BankAccountTypeSeeder::class);
        // User::factory(10)->create();
        
        // BankAccountType::factory(10)->create();
        Bank::factory(10)->create();
        Blood::factory(10)->create();
        // CivilStatus::factory(5)->create();
        // Company::factory(3)->create();
        $this->call(DepartmentSeeder::class);
        // Department::factory(22)->create();
        // Genders::factory(10)->create();
        KinType::factory(10)->create();
        Permission::factory(10)->create();
        ProjectType::factory(5)->create();
        Role::factory(15)->create();
        Section::factory(20)->create();
        
        // $this->call(VaccineDoseSeeder::class);
        // VaccineDosis::factory(15)->create();

        // $this->call(VaccineSeeder::class);

        PoligraphType::factory(5)->create();
        VerificationType::factory(5)->create();
        $this->call(CapacitationTypeSeeder::class);
        // CapacitationType::factory(4)->create();



        //Necesita el company_id
        IgssAfilliation::factory(10)->create();
        Insurance::factory(10)->create();

        //Necesita el section_id
        Job::factory(10)->create();

        //Necesita el project_type_id
        Project::factory(10)->create();

        $this->call(MunicipalitySeeder::class);
        // Municipality::factory(100)->create();

        //Employee
        Employee::factory(50)->create();


        //Necesitan el employee_id
        AttentionCall::factory(10)->create();
        Capacitation::factory(10)->create();
        Comment::factory(10)->create();
        License::factory(10)->create();
        Vaccine::factory(15)->create();

        
        
        
        Poligraph::factory(10)->create();
        Suspension::factory(15)->create();
        UpdatableDocument::factory(15)->create();
        Vacation::factory(15)->create();
        Verification::factory(20)->create();



        


        //Necesita el kin_type_id
        Kin::factory(10)->create();

        

        //Muchos a muchos
        //employee_kin, employee_vaccine, permission_role, role_user, vaccine_vaccine_doses

        
        
        
        



        
    }
}
