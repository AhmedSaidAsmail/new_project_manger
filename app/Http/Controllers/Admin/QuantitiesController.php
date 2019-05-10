<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quantity;
use App\Models\Project;
use App\Models\Contractor;
use App\Models\Owner;
use Illuminate\Http\UploadedFile;

class QuantitiesController extends Controller
{
    private $_path = "/documents/projects/quantities/";

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
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        $project = Project::findOrFail($project_id);
        $contractors = Contractor::all();
        $owners = Owner::all();
        return view('Admin.quantities.create', compact('project', 'owners', 'contractors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param integer $project_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project_id)
    {
        $attributes = $request->all();
        try {
            $quantity = Quantity::create($attributes);
            $quantity->detail()->create($attributes['details']);
            if ($attachments = $this->attachments($attributes)) {
                $quantity->attachment()->create($attachments);
            }
            return redirect()
                ->route('quantity.show', ['project_id' => $project_id, 'id' => $quantity->id])
                ->with('success', 'Data successfully stored');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    private function attributesHasAttachments(array $attributes)
    {
        if (array_key_exists('attachment', $attributes)) {
            return $attributes['attachment'];
        }
        return false;
    }

    private function attachments(array $attributes)
    {
        if ($attachments = $this->attributesHasAttachments($attributes)) {
            return array_map(function ($file) {
                if ($file instanceof UploadedFile) {
                    return uploadFile(['file' => $file, 'path' => $this->_path]);
                }
            }, $attachments);
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param int $project_id
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($project_id, $id)
    {
        $project = Project::findOrFail($project_id);
        $quantity = Quantity::findOrFail($id);
        return view('Admin.quantities.show', compact('project', 'quantity'));
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
