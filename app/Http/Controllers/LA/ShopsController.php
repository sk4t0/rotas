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

use App\Models\Shop;

class ShopsController extends Controller
{
    public $show_action = true;
    public $view_col = 'name';
    public $listing_cols = ['id','name'];

    
    /**
     * Display a listing of the Shops.
     *
     * @return mixed
     */
    public function index()
    {
        $module = Module::get('Shops');
        
        if(Module::hasAccess($module->id)) {
            return View('la.shops.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for creating a new shop.
     *
     * @return mixed
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created shop in database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(Module::hasAccess("Shops", "create")) {
            
            $rules = Module::validateRules("Shops", $request);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $insert_id = Module::insert("Shops", $request);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.shops.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Display the specified shop.
     *
     * @param int $id shop ID
     * @return mixed
     */
    public function show($id)
    {
        if(Module::hasAccess("Shops", "view")) {
            
            $shop = Shop::findOrFail($id);
            if(isset($shop->id)) {
                $module = Module::get('Shops');
                $module->row = $shop;
                
                return view('la.shops.show', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('shop', $shop);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("shop"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for editing the specified shop.
     *
     * @param int $id shop ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if(Module::hasAccess("Shops", "edit")) {
            $shop = $this->api->get('api/shops/' . $id);
            if(isset($shop->id)) {
                $module = Module::get('Shops');
                
                $module->row = $shop;
                
                return view('la.shops.edit', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                ])->with('shop', $shop);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("shop"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Update the specified shop in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id shop ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if(Module::hasAccess("Shops", "edit")) {
            
            $rules = Module::validateRules("Shops", $request, true);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }
            
            $insert_id = Module::updateRow("Shops", $request, $id);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.shops.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Remove the specified shop from storage.
     *
     * @param int $id shop ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Module::hasAccess("Shops", "delete")) {
            $this->api->delete('api/shops/' . $id);
            
            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.shops.index');
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
        $module = Module::get('Shops');
        $listing_cols = $this->listing_cols;
        
        $values = DB::table('shops')->select($listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();
        
        $fields_popup = ModuleFields::getModuleFields('Shops');
        
        for($i = 0; $i < count($data->data); $i++) {
            for($j = 0; $j < count($listing_cols); $j++) {
                $col = $listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $module->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/shops/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            
            if($this->show_action) {
                $output = '';
                if(Module::hasAccess("Shops", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/shops/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }
                
                if(Module::hasAccess("Shops", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.shops.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
