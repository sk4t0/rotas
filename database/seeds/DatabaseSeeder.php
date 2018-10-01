<?php

use Illuminate\Database\Seeder;

use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Dwij\Laraadmin\Models\ModuleFieldTypes;
use Dwij\Laraadmin\Models\Menu;
use Dwij\Laraadmin\Models\LAConfigs;

use App\Role;
use App\Permission;
use App\Models\Department;
use App\Models\Shop;
use App\Models\Staff;
use App\Models\Rota;
use App\Models\Shift;
use App\Models\Shift_Break;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		/* ================ LaraAdmin Seeder Code ================ */
		
		// Generating Module Menus
		$modules = Module::all();
        $teamMenu = Menu::firstOrCreate([
            "name" => "File Manager",
            "url" => "file-manager",
            "icon" => "fa-folder-open",
            "type" => 'custom',
            "parent" => 0,
            "hierarchy" => 0
        ]);
		$teamMenu = Menu::firstOrCreate([
			"name" => "Team",
			"url" => "#",
			"icon" => "fa-group",
			"type" => 'custom',
			"parent" => 0,
			"hierarchy" => 1
		]);
		foreach ($modules as $module) {
			$parent = 0;
			if($module->name != "Backups" && $module->name != "Uploads") {
				if(in_array($module->name, ["Users", "Departments", "Employees", "Roles", "Permissions"])) {
					$parent = $teamMenu->id;
				}
				Menu::firstOrCreate([
					"name" => $module->name,
					"url" => $module->name_db,
					"icon" => $module->fa_icon,
					"type" => 'module',
					"parent" => $parent
				]);
			}
		}
		
		// Create Administration Department
	   	$dept = Department::firstOrNew(["name" => "Administration"]);
		$dept->tags = "[]";
		$dept->color = "#000";
        if ($dept->id == null) {
            $dept->save();
        }
		// Create Super Admin Role
		$role = Role::firstOrNew(["name" => "SUPER_ADMIN"]);
		$role->display_name = "Super Admin";
		$role->description = "Full Access Role";
		$role->parent = 1;
		$role->dept = $dept->id;
        if ($role->id == null) {
            $role->save();
        }
		
		// Set Full Access For Super Admin Role
		foreach ($modules as $module) {
			Module::setDefaultRoleAccess($module->id, $role->id, "full");
		}
		
		// Create Admin Panel Permission
		$perm = Permission::firstOrNew(["name" => "ADMIN_PANEL"]);
		$perm->display_name = "Admin Panel";
		$perm->description = "Admin Panel Permission";
        if ($perm->id == null) {
            $perm->save();
        }
        if (! $role->perms->contains($perm->id)) {
            $role->attachPermission($perm);
        }


        $shop = Shop::firstOrNew(["name" => "FunHouse"]);
        if ($shop->id == null) {
            $shop->save();
        }

        $staffBlack = Staff::firstOrNew(["first_name" => "Black Widow", 'surname' => "Xman", "shop_id" => $shop->id]);
        if ($staffBlack->id == null) {
            $staffBlack->save();
        }

        $staffThor = Staff::firstOrNew(["first_name" => "Thor", 'surname' => "Xman", "shop_id" => $shop->id]);
        if ($staffThor->id == null) {
            $staffThor->save();
        }

        $staffWolverine = Staff::firstOrNew(["first_name" => "Wolverine", 'surname' => "Xman", "shop_id" => $shop->id]);
        if ($staffWolverine->id == null) {
            $staffWolverine->save();
        }

        $staffGamora = Staff::firstOrNew(["first_name" => "Gamora", 'surname' => "Xman", "shop_id" => $shop->id]);
        if ($staffGamora->id == null) {
            $staffGamora->save();
        }

        $rota = Rota::firstOrNew(["shop_id" => $shop->id, "week_commence_date" => '2018-10-01']);
        if ($rota->id == null) {
            $rota->save();
        }

        $shiftBlackMon = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffBlack->id,
            "start_time" => "2018-10-01 08:00:00",
            "end_time" => "2018-10-01 18:00:00"
        ]);
        if ($shiftBlackMon->id == null) {
            $shiftBlackMon->save();
        }

        $shiftBlackTue = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffBlack->id,
            "start_time" => "2018-10-02 08:00:00",
            "end_time" => "2018-10-02 14:00:00"
        ]);
        if ($shiftBlackTue->id == null) {
            $shiftBlackTue->save();
        }

        $shiftThorTue = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffThor->id,
            "start_time" => "2018-10-02 14:00:00",
            "end_time" => "2018-10-02 18:00:00"
        ]);
        if ($shiftThorTue->id == null) {
            $shiftThorTue->save();
        }

        $shiftWolveWed = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffWolverine->id,
            "start_time" => "2018-10-03 08:00:00",
            "end_time" => "2018-10-03 13:00:00"
        ]);
        if ($shiftWolveWed->id == null) {
            $shiftWolveWed->save();
        }

        $shiftGamoraWed = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffGamora->id,
            "start_time" => "2018-10-03 09:00:00",
            "end_time" => "2018-10-03 18:00:00"
        ]);
        if ($shiftGamoraWed->id == null) {
            $shiftGamoraWed->save();
        }

        $shiftWolveThur = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffWolverine->id,
            "start_time" => "2018-10-04 08:00:00",
            "end_time" => "2018-10-04 18:00:00"
        ]);
        if ($shiftWolveThur->id == null) {
            $shiftWolveThur->save();
        }

        $shiftGamoraThur = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffGamora->id,
            "start_time" => "2018-10-04 08:00:00",
            "end_time" => "2018-10-04 18:00:00"
        ]);
        if ($shiftGamoraThur->id == null) {
            $shiftGamoraThur->save();
        }

        $shiftBlackFri = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffBlack->id,
            "start_time" => "2018-10-05 08:00:00",
            "end_time" => "2018-10-05 13:00:00"
        ]);
        if ($shiftBlackFri->id == null) {
            $shiftBlackFri->save();
        }

        $shiftThorFri = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffThor->id,
            "start_time" => "2018-10-05 09:00:00",
            "end_time" => "2018-10-05 16:00:00"
        ]);
        if ($shiftThorFri->id == null) {
            $shiftThorFri->save();
        }

        $shiftWolveFri = Shift::firstOrNew([
            "rota_id" => $rota->id,
            "staff_id" => $staffWolverine->id,
            "start_time" => "2018-10-05 15:00:00",
            "end_time" => "2018-10-05 18:00:00"
        ]);
        if ($shiftWolveFri->id == null) {
            $shiftWolveFri->save();
        }



        $shiftBreakWolveThur = Shift_Break::firstOrNew([
            "shift_id" => $shiftWolveThur->id,
            "start_time" => "2018-10-04 12:00:00",
            "end_time" => "2018-10-04 13:00:00"
        ]);
        if ($shiftBreakWolveThur->id == null) {
            $shiftBreakWolveThur->save();
        }

        $shiftBreakGamoraThur = Shift_Break::firstOrNew([
            "shift_id" => $shiftGamoraThur->id,
            "start_time" => "2018-10-04 13:00:00",
            "end_time" => "2018-10-04 14:00:00"
        ]);
        if ($shiftBreakGamoraThur->id == null) {
            $shiftBreakGamoraThur->save();
        }


        // Generate LaraAdmin Default Configurations
		
		$laconfig = LAConfigs::firstOrNew(["key" => "sitename"]);
		$laconfig->value = "SW 1.0";
		if ($laconfig->id == null) {
            $laconfig->save();
        }

		$laconfig = LAConfigs::firstOrNew(["key" => "sitename_part1"]);
		$laconfig->value = "SW";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "sitename_part2"]);
		$laconfig->value = "ShopWorks 1.0";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "sitename_short"]);
		$laconfig->value = "SW";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "site_description"]);
		$laconfig->value = "SW (Shopworks) is a software to help staff management";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		// Display Configurations
		
		$laconfig = LAConfigs::firstOrNew(["key" => "sidebar_search"]);
		$laconfig->value = "1";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "show_messages"]);
		$laconfig->value = "1";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "show_notifications"]);
		$laconfig->value = "1";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "show_tasks"]);
		$laconfig->value = "1";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "show_rightsidebar"]);
		$laconfig->value = "1";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "skin"]);
		$laconfig->value = "skin-white";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$laconfig = LAConfigs::firstOrNew(["key" => "layout"]);
		$laconfig->value = "fixed";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		// Admin Configurations

		$laconfig = LAConfigs::firstOrNew(["key" => "default_email"]);
		$laconfig->value = "test@example.com";
        if ($laconfig->id == null) {
            $laconfig->save();
        }
		$modules = Module::all();
		foreach ($modules as $module) {
			$module->is_gen=true;
			$module->save();	
		}
	}
}
