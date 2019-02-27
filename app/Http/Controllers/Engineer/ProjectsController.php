<?php

namespace App\Http\Controllers\Engineer;

use App\Models\Engineer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RuntimeException;
use App\Src\HierarchyData\HierarchyFactory;


class ProjectsController extends Controller
{
    private $time_lines_colors = [
        'color' => '#2ecc71',
        'child' => [
            'color' => '#16a085',
            'child' => [
                'color' => '#f39c12',
                'child' => [
                    'color' => '#e74c3c',
                    'child' => [
                        'color' => '#8e44ad',
                    ]
                ]
            ]
        ]
    ];

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('engineer')->user();
        $projects = $this->getallProjects($user);
        return view('Engineer.projectsIndex', ['projects' => $projects]);

    }

    /**
     * @param Engineer $user
     * @return \Illuminate\Support\Collection
     */

    private function getallProjects(Engineer $user)
    {
        $inContractorCrew = $user->contractorCrew;
        $inOwnerCrew = $user->ownerCrew;
        $inConsultantCrew = $user->consultantCrew;
        $projects = $this->collectAllProjects([$inContractorCrew, $inConsultantCrew, $inOwnerCrew]);
        return $projects;
    }

    /**
     * @param array $allIn
     * @return \Illuminate\Support\Collection
     */

    private function collectAllProjects(array $allIn)
    {
        $projects = [];
        foreach ($allIn as $in) {

            foreach ($in as $crew) {
                $projects[$crew->project->id] = $crew->project;
            }

        }
        return collect($projects);
    }

    /**
     * @param $id
     * @return mixed
     */

    private function returnProject($id)
    {
        $user = auth()->guard('engineer')->user();
        $projects = $this->getallProjects($user);
        if (array_key_exists($id, $projects->all())) {
            return $projects->get($id);
        }
        throw new RuntimeException("You don't have access to view this project");
    }

    /**
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $project = $this->returnProject($id);
            $timeLinesCollection = [];
            if (!empty($project->timeLines->all())) {
                $timeLinesCollection = HierarchyFactory::factory($project->timeLines)->renderArray()->all();
            }
            return view('Engineer.projectsShow', ['project' => $project, 'timeLines' => $timeLinesCollection, 'colors' => $this->time_lines_colors]);
        } catch (RuntimeException $e) {
            return $e->getMessage();
        }

    }

}