<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\BotoxFaceMapPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\Helper;

class BotoxFaceMapPointController extends Controller
{
    /**
     * Define the botox face map points configuration (45 points total)
     */
    private function getPointsConfig()
    {
        return [
            // Area 1: Forehead Lines (7 points)
            ['point_no' => 1, 'code' => 'fh1', 'label' => 'Forehead Lines 1', 'area' => 1],
            ['point_no' => 2, 'code' => 'fh2', 'label' => 'Forehead Lines 2', 'area' => 1],
            ['point_no' => 3, 'code' => 'fh3', 'label' => 'Forehead Lines 3', 'area' => 1],
            ['point_no' => 4, 'code' => 'fh4', 'label' => 'Forehead Lines 4', 'area' => 1],
            ['point_no' => 5, 'code' => 'fh5', 'label' => 'Forehead Lines 5', 'area' => 1],
            ['point_no' => 6, 'code' => 'fh6', 'label' => 'Forehead Lines 6', 'area' => 1],
            ['point_no' => 7, 'code' => 'fh7', 'label' => 'Forehead Lines 7', 'area' => 1],
            
            // Area 2: Frown Lines (5 points)
            ['point_no' => 8, 'code' => 'fr1', 'label' => 'Frown Lines 1', 'area' => 2],
            ['point_no' => 9, 'code' => 'fr2', 'label' => 'Frown Lines 2', 'area' => 2],
            ['point_no' => 10, 'code' => 'fr3', 'label' => 'Frown Lines 3', 'area' => 2],
            ['point_no' => 11, 'code' => 'fr4', 'label' => 'Frown Lines 4', 'area' => 2],
            ['point_no' => 12, 'code' => 'fr5', 'label' => 'Frown Lines 5', 'area' => 2],
            
            // Area 3: Crow's Feet Left (4 points)
            ['point_no' => 13, 'code' => 'cl1', 'label' => "Crow's Feet Left 1", 'area' => 3],
            ['point_no' => 14, 'code' => 'cl2', 'label' => "Crow's Feet Left 2", 'area' => 3],
            ['point_no' => 15, 'code' => 'cl3', 'label' => "Crow's Feet Left 3", 'area' => 3],
            ['point_no' => 16, 'code' => 'cl4', 'label' => "Crow's Feet Left 4", 'area' => 3],
            
            // Area 4: Crow's Feet Right (4 points)
            ['point_no' => 17, 'code' => 'cr1', 'label' => "Crow's Feet Right 1", 'area' => 4],
            ['point_no' => 18, 'code' => 'cr2', 'label' => "Crow's Feet Right 2", 'area' => 4],
            ['point_no' => 19, 'code' => 'cr3', 'label' => "Crow's Feet Right 3", 'area' => 4],
            ['point_no' => 20, 'code' => 'cr4', 'label' => "Crow's Feet Right 4", 'area' => 4],
            
            // Area 5: Bunny Lines (3 points)
            ['point_no' => 21, 'code' => 'b1', 'label' => 'Bunny Lines 1', 'area' => 5],
            ['point_no' => 22, 'code' => 'b2', 'label' => 'Bunny Lines 2', 'area' => 5],
            ['point_no' => 23, 'code' => 'b3', 'label' => 'Bunny Lines 3', 'area' => 5],
            
            // Area 6: Gummy Smile (2 points)
            ['point_no' => 24, 'code' => 'g1', 'label' => 'Gummy Smile Left', 'area' => 6],
            ['point_no' => 25, 'code' => 'g2', 'label' => 'Gummy Smile Right', 'area' => 6],
            
            // Area 7: Masseter Reduction Left (5 points)
            ['point_no' => 26, 'code' => 'ml1', 'label' => 'Masseter Left 1', 'area' => 7],
            ['point_no' => 27, 'code' => 'ml2', 'label' => 'Masseter Left 2', 'area' => 7],
            ['point_no' => 28, 'code' => 'ml3', 'label' => 'Masseter Left 3', 'area' => 7],
            ['point_no' => 29, 'code' => 'ml4', 'label' => 'Masseter Left 4', 'area' => 7],
            ['point_no' => 30, 'code' => 'ml5', 'label' => 'Masseter Left 5', 'area' => 7],
            
            // Area 8: Masseter Reduction Right (5 points)
            ['point_no' => 31, 'code' => 'mr1', 'label' => 'Masseter Right 1', 'area' => 8],
            ['point_no' => 32, 'code' => 'mr2', 'label' => 'Masseter Right 2', 'area' => 8],
            ['point_no' => 33, 'code' => 'mr3', 'label' => 'Masseter Right 3', 'area' => 8],
            ['point_no' => 34, 'code' => 'mr4', 'label' => 'Masseter Right 4', 'area' => 8],
            ['point_no' => 35, 'code' => 'mr5', 'label' => 'Masseter Right 5', 'area' => 8],
            
            // Area 9: Vertical Lip Lines (6 points)
            ['point_no' => 36, 'code' => 'vl1', 'label' => 'Vertical Lip Lines 1', 'area' => 9],
            ['point_no' => 37, 'code' => 'vl2', 'label' => 'Vertical Lip Lines 2', 'area' => 9],
            ['point_no' => 38, 'code' => 'vl3', 'label' => 'Vertical Lip Lines 3', 'area' => 9],
            ['point_no' => 39, 'code' => 'vl4', 'label' => 'Vertical Lip Lines 4', 'area' => 9],
            ['point_no' => 40, 'code' => 'vl5', 'label' => 'Vertical Lip Lines 5', 'area' => 9],
            ['point_no' => 41, 'code' => 'vl6', 'label' => 'Vertical Lip Lines 6', 'area' => 9],
            
            // Area 10: Smile Lift Left (1 point)
            ['point_no' => 42, 'code' => 'sl1', 'label' => 'Smile Lift/DAO Left', 'area' => 10],
            
            // Area 11: Smile Lift Right (1 point)
            ['point_no' => 43, 'code' => 'sr1', 'label' => 'Smile Lift/DAO Right', 'area' => 11],
            
            // Area 12: Dimpled Chin (2 points)
            ['point_no' => 44, 'code' => 'dc1', 'label' => 'Dimpled Chin 1', 'area' => 12],
            ['point_no' => 45, 'code' => 'dc2', 'label' => 'Dimpled Chin 2', 'area' => 12],
        ];
    }

    /**
     * Display list of botox face map point records
     */
    public function index(Request $request)
    {
        $title = 'Botox Face Map Points';

        if ($request->ajax()) {
            // Get unique patient IDs that have botox face map points
            $query = Patient::select([
                'patients.id',
                'patients.name as patient_name',
            ])
            ->whereIn('patients.id', function($subquery) {
                $subquery->select('patient_id')
                    ->from('botox_face_map_points')
                    ->distinct();
            });

            return app('datatables')->of($query)
                ->addColumn('points_count', function ($row) {
                    return BotoxFaceMapPoint::where('patient_id', $row->id)->count();
                })
                ->addColumn('created_at_formatted', function ($row) {
                    $firstPoint = BotoxFaceMapPoint::where('patient_id', $row->id)->first();
                    return $firstPoint && $firstPoint->created_at ? $firstPoint->created_at->format('d M Y') : 'N/A';
                })
                ->addColumn('actions', function ($row) {
                    $editUrl = route('botox-face-map-points.edit', ['patient_id' => $row->id]);
                    $html = '<a href="' . $editUrl . '" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Edit">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                        </a>';
                    return $html;
                })
                ->rawColumns(['actions'])
                ->make();
        }

        return view('botox-face-map-points.list', [
            'title' => $title,
        ]);
    }

    /**
     * Show the create form (same as edit but without patient)
     */
    public function create()
    {
        $title = 'Add Botox Face Map Points';
        $pointsConfig = $this->getPointsConfig();

        return view('botox-face-map-points.edit', [
            'title' => $title,
            'patient' => null,
            'patient_id' => 0,
            'pointsConfig' => $pointsConfig,
            'existingPoints' => [],
        ]);
    }

    /**
     * Show the botox face map points form for editing
     */
    public function edit($patient_id = 0)
    {
        $title = 'Edit Botox Face Map Points';
        $patient = null;
        $existingPoints = [];

        if ($patient_id > 0) {
            $patient = Patient::find($patient_id);
            if ($patient) {
                $existingPoints = BotoxFaceMapPoint::where('patient_id', $patient_id)
                    ->get()
                    ->keyBy('code')
                    ->toArray();
            }
        }

        $pointsConfig = $this->getPointsConfig();

        return view('botox-face-map-points.edit', [
            'title' => $title,
            'patient' => $patient,
            'patient_id' => $patient_id,
            'pointsConfig' => $pointsConfig,
            'existingPoints' => $existingPoints,
        ]);
    }

    /**
     * Store or update a botox face map point
     */
    public function store(Request $request)
    {
        $rules = [
            'patient_id' => ['required', 'numeric', 'exists:patients,id'],
            'point_no' => ['required', 'numeric'],
            'code' => ['required', 'string'],
        ];

        $request->validate($rules);

        $data = [
            'patient_id' => $request->patient_id,
            'patient_type_id' => $request->patient_type_id ?? null,
            'point_no' => $request->point_no,
            'code' => $request->code,
            'title' => $request->title ?? '',
            'description' => $request->description ?? '',
        ];

        // Check if point already exists for this patient
        $existingPoint = BotoxFaceMapPoint::where('patient_id', $request->patient_id)
            ->where('code', $request->code)
            ->first();

        if ($existingPoint) {
            $existingPoint->update($data);
            $point = $existingPoint;
        } else {
            $point = BotoxFaceMapPoint::create($data);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Point saved successfully',
                'point' => $point,
            ]);
        }

        return redirect()->route('botox-face-map-points.edit', ['patient_id' => $request->patient_id])
            ->with('success', 'Point saved successfully');
    }

    /**
     * Get all points for a patient (AJAX endpoint)
     */
    public function getPoints(Request $request)
    {
        $patient_id = $request->patient_id;

        if (!$patient_id) {
            return response()->json([
                'success' => false,
                'message' => 'Patient ID is required',
            ]);
        }

        $points = BotoxFaceMapPoint::where('patient_id', $patient_id)
            ->get()
            ->keyBy('code');

        return response()->json([
            'success' => true,
            'points' => $points,
        ]);
    }
}
