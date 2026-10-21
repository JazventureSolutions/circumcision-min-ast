<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\FaceMapPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\Helper;

class FaceMapPointController extends Controller
{
    /**
     * Define the face map points configuration (each point has unique point_no)
     */
    private function getPointsConfig()
    {
        return [
            // 1. Temples
            ['point_no' => 1, 'code' => 'temples_left', 'label' => 'Temples (Left)', 'area' => 1],
            ['point_no' => 2, 'code' => 'temples_right', 'label' => 'Temples (Right)', 'area' => 1],
            // 2. Nose Job
            ['point_no' => 3, 'code' => 'nose_job', 'label' => 'Nose Job', 'area' => 2],
            // 3. Tear Trough
            ['point_no' => 4, 'code' => 'tear_trough_left', 'label' => 'Tear Trough (Left)', 'area' => 3],
            ['point_no' => 5, 'code' => 'tear_trough_right', 'label' => 'Tear Trough (Right)', 'area' => 3],
            // 4. Cheek Augmentation
            ['point_no' => 6, 'code' => 'cheek_left', 'label' => 'Cheek Augmentation (Left)', 'area' => 4],
            ['point_no' => 7, 'code' => 'cheek_right', 'label' => 'Cheek Augmentation (Right)', 'area' => 4],
            // 5. Nasolabial Fold
            ['point_no' => 8, 'code' => 'nasolabial_left', 'label' => 'Nasolabial Fold (Left)', 'area' => 5],
            ['point_no' => 9, 'code' => 'nasolabial_right', 'label' => 'Nasolabial Fold (Right)', 'area' => 5],
            // 6. Lip Augmentation
            ['point_no' => 10, 'code' => 'lip_augmentation', 'label' => 'Lip Augmentation', 'area' => 6],
            // 7. Marionettes Lines
            ['point_no' => 11, 'code' => 'marionettes_left', 'label' => 'Marionettes Lines (Left)', 'area' => 7],
            ['point_no' => 12, 'code' => 'marionettes_right', 'label' => 'Marionettes Lines (Right)', 'area' => 7],
            // 8. Jawline Chiseling
            ['point_no' => 13, 'code' => 'jawline_left', 'label' => 'Jawline Chiseling (Left)', 'area' => 8],
            ['point_no' => 14, 'code' => 'jawline_right', 'label' => 'Jawline Chiseling (Right)', 'area' => 8],
            // 9. Hand Rejuvenation
            ['point_no' => 15, 'code' => 'hand_rejuvenation', 'label' => 'Hand Rejuvenation', 'area' => 9],
        ];
    }

    /**
     * Display list of face map point records
     */
    public function index(Request $request)
    {
        $title = 'Face Map Points';

        if ($request->ajax()) {

            // Get unique patient IDs that have face map points
            $query = Patient::select([
                'patients.id',
                'patients.name as patient_name',
            ])
            ->whereIn('patients.id', function($subquery) {
                $subquery->select('patient_id')
                ->from('face_map_points')
                ->distinct();
            })->where('patients.role_id', auth()->user()->currentRoleId());
                
            return app('datatables')->of($query)
            ->addColumn('points_count', function ($row) {
                return FaceMapPoint::where('patient_id', $row->id)->count();
            })
            ->addColumn('created_at_formatted', function ($row) {
                $firstPoint = FaceMapPoint::where('patient_id', $row->id)->first();
                return $firstPoint && $firstPoint->created_at ? $firstPoint->created_at->format('d M Y') : 'N/A';
            })
            ->addColumn('actions', function ($row) {
                $editUrl = route('face-map-points.edit', ['patient_id' => $row->id]);
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

        return view('face-map-points.list', [
            'title' => $title,
        ]);
    }

    /**
     * Show the create form (same as edit but without patient)
     */
    public function create()
    {
        $title = 'Add Face Map Points';
        $pointsConfig = $this->getPointsConfig();

        return view('face-map-points.edit', [
            'title' => $title,
            'patient' => null,
            'patient_id' => 0,
            'pointsConfig' => $pointsConfig,
            'existingPoints' => [],
        ]);
    }

    /**
     * Show the face map points form for editing
     */
    public function edit($patient_id = 0)
    {
        $title = 'Edit Face Map Points';
        $patient = null;
        $existingPoints = [];

        if ($patient_id > 0) {
            $patient = Patient::find($patient_id);
            if ($patient) {
                $existingPoints = FaceMapPoint::where('patient_id', $patient_id)
                    ->get()
                    ->keyBy('code')
                    ->toArray();
            }
        }

        $pointsConfig = $this->getPointsConfig();

        return view('face-map-points.edit', [
            'title' => $title,
            'patient' => $patient,
            'patient_id' => $patient_id,
            'pointsConfig' => $pointsConfig,
            'existingPoints' => $existingPoints,
        ]);
    }

    /**
     * Store or update a face map point
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
        $existingPoint = FaceMapPoint::where('patient_id', $request->patient_id)
            ->where('code', $request->code)
            ->first();

        if ($existingPoint) {
            $existingPoint->update($data);
            $point = $existingPoint;
        } else {
            $point = FaceMapPoint::create($data);
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Point saved successfully',
                'point' => $point,
            ]);
        }

        return redirect()->route('face-map-points.edit', ['patient_id' => $request->patient_id])
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

        $points = FaceMapPoint::where('patient_id', $patient_id)
            ->get()
            ->keyBy('code');

        return response()->json([
            'success' => true,
            'points' => $points,
        ]);
    }
}
