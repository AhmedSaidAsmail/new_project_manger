<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Quantity;
use App\Models\QuantityItem;

class QuantityItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $project_id
     * @param int $quantity_id
     * @return \Illuminate\Http\Response
     */
    public function create($project_id, $quantity_id)
    {
        $project = Project::findOrFail($project_id);
        $quantity = Quantity::findOrFail($quantity_id);
        return view('Admin.quantities.items.create', compact('project', 'quantity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $project_id
     * @param int $quantity_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project_id, $quantity_id)
    {
        $attributes = $request->all();
        $this->calculateTotal($attributes);
        try {
            QuantityItem::create($attributes);
            return redirect()->route('quantity.show', ['project_id' => $project_id, 'id' => $quantity_id]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    private function calculateTotal(array &$attributes)
    {
        $attributes['total'] = $attributes['contractual_quantity'] * $attributes['price'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
