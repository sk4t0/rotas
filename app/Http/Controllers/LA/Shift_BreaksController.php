<?php
/**
 * Controller generated using LaraAdmin
 * Help: http://laraadmin.com
 * LaraAdmin is open-sourced software licensed under the MIT license.
 * Developed by: Dwij IT Solutions
 * Developer Website: http://dwijitsolutions.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Shift_Break;

class Shift_BreaksController extends Controller
{
    public $show_action = true;
    public $view_col = 'shift_id';
    public $listing_cols = ['id','shift_id', 'start_time', 'end_time'];

    
    /**
     * Display a listing of the Shift_Breaks.
     *
     * @return mixed
     */
    public function index()
    {
        $module = Module::get('Shift_Breaks');
        
        if(Module::hasAccess($module->id)) {
            return View('la.shift_breaks.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for creating a new shift_break.
     *
     * @return mixed
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created shift_break in database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(Module::hasAccess("Shift_Breaks", "create")) {
            
            $rules = Module::validateRules("Shift_Breaks", $request);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $insert_id = Module::insert("Shift_Breaks", $request);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.shift_breaks.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Display the specified shift_break.
     *
     * @param int $id shift_break ID
     * @return mixed
     */
    public function show($id)
    {
        if(Module::hasAccess("Shift_Breaks", "view")) {
            
            $shift_break = $this->api->get('api/shift_breaks/' . $id);
            if(isset($shift_break->id)) {
                $module = Module::get('Shift_Breaks');
                $module->row = $shift_break;
                
                return view('la.shift_breaks.show', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('shift_break', $shift_break);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("shift_break"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for editing the specified shift_break.
     *
     * @param int $id shift_break ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if(Module::hasAccess("Shift_Breaks", "edit")) {
            $shift_break = $this->api->get('api/shift_breaks/' . $id);
            if(isset($shift_break->id)) {
                $module = Module::get('Shift_Breaks');
                
                $module->row = $shift_break;
                
                return view('la.shift_breaks.edit', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                ])->with('shift_break', $shift_break);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("shift_break"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Update the specified shift_break in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id shift_break ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if(Module::hasAccess("Shift_Breaks", "edit")) {
            
            $rules = Module::validateRules("Shift_Breaks", $request, true);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }
            
            $insert_id = Module::updateRow("Shift_Breaks", $request, $id);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.shift_breaks.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Remove the specified shift_break from storage.
     *
     * @param int $id shift_break ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Module::hasAccess("Shift_Breaks", "delete")) {
            $this->api->delete('api/shift_breaks/' . $id);
            
            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.shift_breaks.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Server side Datatable fetch via Ajax
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function dtajax(Request $request)
    {
        $module = Module::get('Shift_Breaks');
        $listing_cols = $this->listing_cols;
        
        $values = DB::table('shift_breaks')->select($listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();
        
        $fields_popup = ModuleFields::getModuleFields('Shift_Breaks');
        
        for($i = 0; $i < count($data->data); $i++) {
            for($j = 0; $j < count($listing_cols); $j++) {
                $col = $listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $module->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/shift_breaks/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            
            if($this->show_action) {
                $output = '';
                if(Module::hasAccess("Shift_Breaks", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/shift_breaks/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }
                
                if(Module::hasAccess("Shift_Breaks", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.shift_breaks.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }
}
