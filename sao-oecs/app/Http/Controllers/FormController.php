<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\Org;
use App\Models\OrgUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$userDetails = Auth::user()->org->id; 
        $orgs = Org::all();
        $org_ids = DB::table('org_user')->where('user_id', Auth::user()->id)->pluck('org_id');

        $forms = Form::latest()->whereIn('org_id', $org_ids->all())->paginate(5);
        $all_forms = Form::latest()->paginate(5);
        //dd($all_forms);
        return view('forms.index', compact('forms', 'orgs', 'all_forms'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orgs = Org::all();
        $orgIds = DB::table('org_user')->where('user_id', Auth::user()->id)->pluck('org_id');
        //dd(compact('org_ids'));
        return view('forms.create', compact('orgs', 'orgIds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd(isset($request->has_rf));
        $request->validate([
            'activity_title'                => 'required',
            'venue'                         => 'required',
            'target_date'                   => 'required|date',
            'start_date'                    => 'required|date|after:yesterday',
            'end_date'                      => 'required|date',
            'org_id'                        => 'required',
            'coorganization'                => 'required',
            'organizer_name'                => 'required',
            'organizer_contact'             => 'required|max:11',
            'organizer_email'               => 'required|email',
            'coorganizer_name'              => 'nullable',
            'coorganizer_contact'           => 'nullable|max:11',
            'coorganizer_email'             => 'nullable|email',
            'activity_classification'       => 'required',
            'activity_classification2'      => 'required',
            'description'                   => 'required',
            'rationale'                     => 'required',
            'outcome'                       => 'required',
            'primary_beneficiary'           => 'required',
            'num_primary_beneficiary'       => 'required',
            'secondary_beneficiary'         => 'nullable',
            'num_secondary_beneficiary'     => 'nullable',
            'activities'                    => 'required',
            'date_needed'                   => 'nullable', //for now, these following columns are nullable i don't know why
            'requi_type'                    => 'nullable',
            'total_cost'                    => 'nullable',
            'remarks'                       => 'nullable',
            'charged'                       => 'nullable',
            'has_rf'                        => 'nullable'
        ]);

        $apf_stat = "Pending";
        $item_details = json_encode($request->moreFields);

        if(isset($request->has_rf)) {
            $has_rf = true;
        }
        else {
            $has_rf = false;
        }

        // dd($request->all());

        // dd($has_rf);

        $request->user()->forms()->create([
            'activity_title'                => $request->activity_title,
            'venue'                         => $request->venue,
            'target_date'                   => $request->target_date,
            'start_date'                    => $request->start_date,
            'end_date'                      => $request->end_date,
            'org_id'                        => $request->org_id,
            'coorganization'                => $request->coorganization,
            'organizer_name'                => $request->organizer_name,
            'organizer_contact'             => $request->organizer_contact,
            'organizer_email'               => $request->organizer_email,
            'coorganizer_name'              => $request->coorganizer_name,
            'coorganizer_contact'           => $request->coorganizer_contact,
            'coorganizer_email'             => $request->coorganizer_email,
            'activity_classification'       => $request->activity_classification,
            'activity_classification2'      => $request->activity_classification2,
            'description'                   => $request->description,
            'rationale'                     => $request->rationale,
            'outcome'                       => $request->outcome,
            'primary_beneficiary'           => $request->primary_beneficiary,
            'num_primary_beneficiary'       => $request->num_primary_beneficiary,
            'secondary_beneficiary'         => $request->secondary_beneficiary,
            'num_secondary_beneficiary'     => $request->num_secondary_beneficiary,
            'activities'                    => $request->activities,
            'date_needed'                   => $request->date_needed, //for now, these following columns are nullable but should not be. for testing purposes only
            'requi_type'                    => $request->requi_type,
            'item_details'                  => $item_details,
            'total_cost'                    => $request->total_cost,
            'remarks'                       => $request->remarks,
            'charged'                       => $request->charged,
            'status'                        => $apf_stat,
            'has_rf'                        => $has_rf
        ]);
        
        return redirect()->route('forms.index')->with('success', 'Event form created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        return view('forms.show', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        $orgs = Org::all();
        $orgIds = DB::table('org_user')->where('user_id', Auth::user()->id)->pluck('org_id');

        return view('forms.edit',compact('orgs', 'orgIds', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        // dd($request->comment);
        $item_details = json_encode($request->moreFields);
        $status = 'Pending';
        if(Auth::user()->role == 2) {
            //dd($request->comment);
            $form->update(['status' => $request->approval, 'comments' => $request->comment]);
        }
        elseif(Auth::user()->role == 1) {
            $request->validate([
                'activity_title'                => 'required',
                'venue'                         => 'required',
                'target_date'                   => 'required|date',
                'start_date'                    => 'required|date|after:yesterday',
                'end_date'                      => 'required|date',
                'org_id'                        => 'required',
                'coorganization'                => 'required',
                'organizer_name'                => 'required',
                'organizer_contact'             => 'required|max:11',
                'organizer_email'               => 'required|email',
                'coorganizer_name'              => 'nullable',
                'coorganizer_contact'           => 'nullable|max:11',
                'coorganizer_email'             => 'nullable|email',
                'activity_classification'       => 'required',
                'activity_classification2'      => 'required',
                'description'                   => 'required',
                'rationale'                     => 'required',
                'outcome'                       => 'required',
                'primary_beneficiary'           => 'required',
                'num_primary_beneficiary'       => 'required',
                'secondary_beneficiary'         => 'nullable',
                'num_secondary_beneficiary'     => 'nullable',
                'activities'                    => 'required',
                'date_needed'                   => 'nullable', //for now, these following columns are nullable but should not be. for testing purposes only
                'requi_type'                    => 'nullable',
                'total_cost'                    => 'nullable',
                'remarks'                       => 'nullable',
                'charged'                       => 'nullable',
                'comments'                      => 'nullable'
            ]);

            $form->update([
                'activity_title'                => $request->activity_title,
                'venue'                         => $request->venue,
                'target_date'                   => $request->target_date,
                'start_date'                    => $request->start_date,
                'end_date'                      => $request->end_date,
                'org_id'                        => $request->org_id,
                'coorganization'                => $request->coorganization,
                'organizer_name'                => $request->organizer_name,
                'organizer_contact'             => $request->organizer_contact,
                'organizer_email'               => $request->organizer_email,
                'coorganizer_name'              => $request->coorganizer_name,
                'coorganizer_contact'           => $request->coorganizer_contact,
                'coorganizer_email'             => $request->coorganizer_email,
                'activity_classification'       => $request->activity_classification,
                'activity_classification2'      => $request->activity_classification2,
                'description'                   => $request->description,
                'rationale'                     => $request->rationale,
                'outcome'                       => $request->outcome,
                'primary_beneficiary'           => $request->primary_beneficiary,
                'num_primary_beneficiary'       => $request->num_primary_beneficiary,
                'secondary_beneficiary'         => $request->secondary_beneficiary,
                'num_secondary_beneficiary'     => $request->num_secondary_beneficiary,
                'activities'                    => $request->activities,
                'date_needed'                   => $request->date_needed, //for now, these following columns are nullable but should not be. for testing purposes only
                'requi_type'                    => $request->requi_type,
                'item_details'                  => $item_details,
                'total_cost'                    => $request->total_cost,
                'remarks'                       => $request->remarks,
                'charged'                       => $request->charged,
            ]);
        }
        //dd($request->all());

        return redirect()->route('forms.index')
            ->with('success','Form updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return redirect()->route('forms.index')->with('success', 'Event form deleted successfully');
    }
}
