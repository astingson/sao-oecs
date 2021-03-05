@extends('layouts.app')

@section('content')
<!-- component -->
<div class="flex justify-center">
    <div class="w-8/12 md:pb-12">

        <div class="pb-4 flex">
            <h1 class="text-2xl font-medium mb-1 uppercase">Activity Proposal Form</h1>
        </div>

        <div class="bg-white p-6 rounded-lg">
        <form action="{{ route('forms.store') }}" method="post">
            @csrf

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label for="has_rf" class="flex items-center cursor-pointer float-right">
                        <h2 class="px-2">With Requisition Form</h2>
                        <!-- toggle -->
                        <div class="relative">
                            <input name="has_rf" id="has_rf" value="false" type="checkbox" class="hidden" />
                            <!-- path -->
                            <div class="toggle-path bg-gray-200 w-11 h-6 rounded-full shadow-inner"></div>
                            <!-- crcle -->
                            <div class="toggle-circle absolute w-4 h-4 bg-white rounded-full shadow inset-y-0 left-0"></div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activity-title">
                        Activity Title <span class="text-red-700">*</span>
                    </label>
                    <input name="activity_title" id="activty_title" class="appearance-none block w-full bg-gray-100
                    text-grey-darker border border-red rounded py-3 px-4 mb-3 @error('activity_title') border-red-500 @enderror"
                    type="text" value="{{ old('activity_title') }}" placeholder="Event Title">

                    @error('activity_title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="venue">
                        Venue <span class="text-red-700">*</span>
                    </label>
                    <input name="venue" id="venue" class="appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter 
                    rounded py-3 px-4 @error('venue') border-red-500 @enderror" type="text" value="{{ old('venue') }}" placeholder="e.g. Room 212 / MPH 1 / MS Teams">
                    @error('venue')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="target-date">
                        Target Date <span class="text-red-700">*</span>
                    </label>
                    <input name="target_date" id="target_date" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 @error('target_date') border-red-500 @enderror"
                    type="date" value="{{ old('target_date') }}" placeholder="">
                    @error('target_date')
                    <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="start-date">
                        Start Date <span class="text-red-700">*</span>
                    </label>
                    <input name="start_date" id="start_date" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 @error('start_date') border-red-500 @enderror" type="date" value="{{ old('start_date') }}" placeholder="">
                    @error('start_date')
                    <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="end-date">
                        End Date <span class="text-red-700">*</span>
                    </label>
                    <input name="end_date" id="end_date" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 @error('end_date') border-red-500 @enderror" type="date" value="{{ old('end_date') }}" placeholder="">
                    @error('end_date')
                    <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="organization-name">
                    Name of Organization <span class="text-red-700">*</span>
                    </label>
                    <div class="relative mb-6 md:mb-0">
                        <select name="org_id" id="org_id" class="block appearance-none w-full bg-gray-100 
                        border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded @error('org_id') border-red-500 @enderror">
                            <option label="Select one" style="display:none" disabled selected value></option>
                            @foreach($orgIds as $orgId)
                                @foreach($orgs as $org)
                                    @if($org->id == $orgId)
                                    <option value="{{  $org->id  }}">{{ $org->org_name }}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="co-organization">
                        Co-organization <span class="text-red-700">*</span>
                    </label>
                    <div class="relative mb-6 md:mb-0">
                        <select name="coorganization" id="coorganization" class="block appearance-none w-full bg-gray-100 
                        border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded @error('coorganization') border-red-500 @enderror">
                            <option label="Select one" style="display:none" disabled selected value></option>
                            <option value="None" @if (old('coorganization') == 'None')selected @endif>None</option>
                            <option value="Internal" @if (old('coorganization') == 'Internal')selected @endif>Internal</option>
                            <option value="External" @if (old('coorganization') == 'External')selected @endif>External</option>
                        </select>
                    </div>
                </div>
            </div>

            
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name-of-organizer">
                        Name of Organizer <span class="text-red-700">*</span>
                    </label>
                    <input name="organizer_name" id="organizer_name" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 @error('organizer_name') border-red-500 @enderror" type="text" placeholder="First name Last name">
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="organizer-contact">
                        Contact Number <span class="text-red-700">*</span>
                    </label>
                    <input name="organizer_contact" id="organizer_contact" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 @error('organizer_contact') border-red-500 @enderror" type="text" placeholder="09123456789">
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="organizer-email">
                        Email <span class="text-red-700">*</span>
                    </label>
                    <input name="organizer_email" id="organizer_email" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 @error('organizer_email') border-red-500 @enderror" type="text" placeholder="abc@domain.com">
                </div>
            </div>

            <div id="coorganization_info" class="hidden">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="co-organizer-name">
                            Co-Organizer <span class="text-red-700">*</span>
                        </label>
                        <input name="coorganizer_name" id="coorganizer_name"  class="appearance-none block w-full bg-gray-100 
                        text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" placeholder="First name Last name">
                    </div>
                    <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="co-organizer-contact">
                            Contact Number (Co-Organizer) <span class="text-red-700">*</span>
                        </label>
                        <input name="coorganizer_contact" id="coorganizer_contact" class="appearance-none block w-full bg-gray-100 
                        text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" placeholder="09123456789">
                    </div>
                    <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="co-organizer-email">
                            Email (Co-Organizer) <span class="text-red-700">*</span>
                        </label>
                        <input name="coorganizer_email" id="coorganizer_email" class="appearance-none block w-full bg-gray-100 
                        text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" placeholder="abc@domain.com">
                    </div>
                </div>
            </div>
            
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activity-classification">
                        Activity Classification <span class="text-red-700">*</span>
                    </label>
                        <div class="relative mb-6 md:mb-0">
                            <select name="activity_classification" id="activity_classification" class="block appearance-none w-full bg-gray-100 
                            border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded @error('activity_classification') border-red-500 @enderror">
                                <option label="Select one" style="display:none" disabled selected value></option>
                                <option value="In-Campus">In-Campus</option>
                                <option value="Off-Campus">Off-Campus</option>
                            </select>
                        </div>
                    </div>
                <div class="md:w-8/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activity-classification2">
                        &nbsp;<!-- Activity Classisification --> <span class="text-red-700">*</span>
                    </label>
                    <div class="relative mb-6 md:mb-0">
                        <select name="activity_classification2" id="activity_classification2" class="block appearance-none w-full bg-gray-100 
                        border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded @error('activity_classification2') border-red-500 @enderror" id="activity-classification2">
                            <option label="Select one" style="display:none" disabled selected value></option>
                            <option value="Workshop">Workshop/Seminar/Training/Symposium/Forum/Team Building</option>
                            <option value="Games">Games/Competition</option>
                            <option value="Social">Social Event/Party/Celebration</option>
                            <option value="CSR">CSR/Community Service</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                        Description <span class="text-red-700">*</span>
                    </label>
                    <textarea name="description" id="description" class="h-40 appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y @error('description') border-red-500 @enderror"></textarea>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="rationale">
                        Rationale (Justification) <span class="text-red-700">*</span>
                    </label>
                    <textarea name="rationale" id="rationale" class="h-40 appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y @error('rationale') border-red-500 @enderror" ></textarea>
                </div>
            </div>

            <div class="-mx-3 md:flex">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="outcome">
                        Outcome <span class="text-red-700">*</span>
                    </label>
                    <textarea name="outcome" id="outcome" class="h-30 appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y @error('outcome') border-red-500 @enderror" ></textarea>
                </div>
            </div>
            <p class="text-red text-xs italic">*If it is classified as a Workshop/Training/Seminar/Symposium/
                Forum/Team Building, learning outcomes or objectives should be written here.
            </p>

            <div class="-mx-3 md:flex mb-6 mt-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="primary-beneficiary">
                        Primary Beneficiary <span class="text-red-700">*</span>
                    </label>
                    <input name="primary_beneficiary" id="primary_beneficiary" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 @error('primary_beneficiary') border-red-500 @enderror" type="text" placeholder="e.g. Students">
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="number-of-primary-beneficiary">
                        Number of Primary Beneficiary <span class="text-red-700">*</span>
                    </label>
                    <input name="num_primary_beneficiary" id="num_primary_beneficiary" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 @error('num_primary_beneficiary') border-red-500 @enderror" type="number" placeholder="">
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="secondary-beneficiary">
                        Secondary Beneficiary
                    </label>
                    <input name="secondary_beneficiary" id="secondary_beneficiary" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" placeholder="">
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="number-of-secondary-beneficiary">
                        Number of Secondary Beneficiary
                    </label>
                    <input name="num_secondary_beneficiary" id="num_secondary_beneficiary" class="appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number" placeholder="">
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activities">
                        Activities/Programme <span class="text-red-700">*</span>
                    </label>
                    <textarea name="activities" id="activities" class="h-30 appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y @error('activities') border-red-500 @enderror" ></textarea>
                    <!-- <input class="appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter rounded py-3 px-4" id="activities" type="text" placeholder=""> -->
                </div>
            </div>

            <div class="overflow-hidden relative w-64 mt-4 mb-4">
                <button class="bg-gray-300 hover:bg-gray-100 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center" disabled>
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/></svg>
                    <span>Upload a File</span>
                </button>
            </div>
            

            <div id="budgetForm" class="hidden">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="date_needed">
                            Date Needed <span class="text-red-700">*</span>
                        </label>
                        <input name="date_needed" id="date_needed" class="appearance-none block w-full bg-gray-100 
                        text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3 @error('date_needed') border-red-500 @enderror" type="date" value="{{ old('date_needed') }}" placeholder="">
                        @error('date_needed')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="requi_type">
                        Type <span class="text-red-700">*</span>
                        </label>
                        <div class="relative mb-6 md:mb-0">
                            <select name="requi_type" id="requi_type" class="block appearance-none w-full bg-gray-100 
                            border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded @error('requi_type') border-red-500 @enderror">
                                <option label="Select one" style="display:none" disabled selected value></option>
                                <option value="Payment" @if (old('requi_type') == 'Payment')selected @endif>Payment</option>
                                <option value="Purchase" @if (old('requi_type') == 'Purchase')selected @endif>Purchase</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="align-middle inline-block min-w-full shadow-sm overflow-hidden sm:rounded-lg border border-gray-200">
                        <table id="rfTable" class="min-w-full">
                            <thead>
                                <tr>
                                    <th 
                                        class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        &nbsp;
                                    </th>
                                    <th 
                                        class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th 
                                        class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Particulars/Purpose
                                    </th>
                                    <th 
                                        class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Cost (PHP)
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white rf_tbody">
                            </tbody>
                        </table>
                        
                        <div class="-mx-3 pl-2 float-right md:flex">
                            <div class="md:w-full m-2 mr-5 md:mb-0">
                                <input name="total_cost" id="total_cost" class="appearance-none block w-full bg-gray-100
                                text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                type="text" value="" placeholder="Total Cost (PHP)" readonly>
                            </div>
                        </div>

                        <div class="float-right px-1 py-2">
                            <button id="removeRow" type="button" class="inline-block px-6 py-3 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-500 rounded shadow ripple hover:shadow-lg hover:bg-red-600 focus:outline-none waves-effect">
                                REMOVE 
                            </button>
                        </div>
                        <div class="float-right px-1 py-2">
                            <button id="addRow" type="button" class="inline-block px-6 py-3 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none waves-effect">
                                ADD
                            </button>
                        </div>
                    </div>
                </div>

                <div class="-mx-3 md:flex m-6">
                    <div class="md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="remarks">
                            Remarks <span class="text-red-700">*</span>
                        </label>
                        <textarea name="remarks" id="remarks" class="h-30 appearance-none block w-full bg-gray-100 
                        text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y @error('remarks') border-red-500 @enderror" ></textarea>
                        <!-- <input class="appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter rounded py-3 px-4" id="remarks" type="text" placeholder=""> -->
                    </div>
                </div>

                <div class="-mx-3 md:flex m-6">
                    <div class="md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="charged">
                            Charged to <span class="text-red-700">*</span>
                        </label>
                        <textarea name="charged" id="charged" class="h-30 appearance-none block w-full bg-gray-100 
                        text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y @error('charged') border-red-500 @enderror" placeholder="Department/Unit"></textarea>
                        <!-- <input class="appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter rounded py-3 px-4" id="charged" type="text" placeholder=""> -->
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: lock-closed -->
                        </span>
                    Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
