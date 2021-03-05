@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 md:pb-12">

        <div class="pb-4">
            <h1 class="text-2xl font-medium mb-1 uppercase">Activity Proposal Form</h1>
            <h1 class="text-xs font-small mb-1">Submitted by {{  $form->user->name  }}</h1>
            <h1 class="text-xs font-small mb-1">Submitted on {{  $form->created_at  }}</h1>
            <p class=""></p>
        </div>

        <div class="bg-white p-6 rounded-lg">
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activity-title">
                        Activity Title <span class="text-red-700">*</span>
                    </label>
                    <input name="activity_title" id="activty_title" class="appearance-none block w-full bg-grey-lighter
                    text-grey-darker border border-red rounded py-3 px-4 mb-3"
                    type="text" value="{{  $form->activity_title  }}" disabled>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="venue">
                        Venue <span class="text-red-700">*</span>
                    </label>
                    <input name="venue" id="venue" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter 
                    rounded py-3 px-4" type="text" value="{{ $form->venue }}" disabled>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="target-date">
                        Target Date <span class="text-red-700">*</span>
                    </label>
                    <input name="target_date" id="target_date" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="date" value="{{ $form->target_date }}" disabled>
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="start-date">
                        Start Date <span class="text-red-700">*</span>
                    </label>
                    <input name="start_date" id="start_date" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="date" value="{{ $form->start_date }}" disabled>
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="end-date">
                        End Date <span class="text-red-700">*</span>
                    </label>
                    <input name="end_date" id="end_date" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="date" value="{{ $form->end_date }}" disabled>
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
                    <input name="org_id" id="org_id" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" value="{{ $form->org->org_name }}" disabled>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="co-organization">
                        Co-organization <span class="text-red-700">*</span>
                    </label>
                    <input name="co-organization" id="co-organization" class="appearance-none block w-full bg-gray-100 
                    border border-gray-darker rounded py-3 px-4" type="text" value="{{ $form->coorganization }}" disabled>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name-of-organizer">
                        Name of Organizer <span class="text-red-700">*</span>
                    </label>
                    <input name="organizer_name" id="organizer_name" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" value="{{ $form->organizer_name }}" disabled>
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="organizer-contact">
                        Contact Number <span class="text-red-700">*</span>
                    </label>
                    <input name="organizer_contact" id="organizer_contact" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" id="org-contact" type="text" value="{{ $form->organizer_contact }}" disabled>
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="organizer-email">
                        Email <span class="text-red-700">*</span>
                    </label>
                    <input name="organizer_email" id="organizer_email" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" value="{{ $form->organizer_email }}" disabled>
                </div>
            </div>
            
            @if(!empty($form->coorganizer_name))
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="co-organizer-name">
                        Co-Organizer <span class="text-red-700">*</span>
                    </label>
                    <input name="coorganizer_name" id="coorganizer_name"  class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" value="{{ $form->coorganizer_name }}" disabled>
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="co-organizer-contact">
                        Contact Number (Co-Organizer) <span class="text-red-700">*</span>
                    </label>
                    <input name="coorganizer_contact" id="coorganizer_contact" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" value="{{ $form->coorganizer_contact }}" disabled>
                </div>
                <div class="md:w-4/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="co-organizer-email">
                        Email (Co-Organizer) <span class="text-red-700">*</span>
                    </label>
                    <input name="coorganizer_email" id="coorganizer_email" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" value="{{ $form->coorganizer_email }}" disabled>
                </div>
            </div>
            @endif
            
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activity-classification">
                        Activity Classification <span class="text-red-700">*</span>
                    </label>
                        <input name="activity_classification" id="activity_classification" class="appearance-none block w-full bg-gray-100 
                        border border-gray-darker rounded py-3 px-4" type="text" value="{{ $form->activity_classification }}" disabled>
                    </div>
                <div class="md:w-8/12 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activity-classification2">
                        &nbsp;<!-- Activity Classisification -->
                    </label>
                    <div class="relative mb-6 md:mb-0">
                        <input name="activity_classification2" id="activity_classification2" class="appearance-none block w-full bg-gray-100 
                        border border-gray-darker rounded py-3 px-4" type="text" value="{{ $form->activity_classification2 }}" disabled>
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                        Description <span class="text-red-700">*</span>
                    </label>
                    <textarea name="description" id="description" class="h-40 appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y" disabled>{{ $form->description }}</textarea>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="rationale">
                        Rationale (Justification) <span class="text-red-700">*</span>
                    </label>
                    <textarea name="rationale" id="rationale" class="h-40 appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y" disabled>{{ $form->rationale }}</textarea>
                </div>
            </div>

            <div class="-mx-3 md:flex">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="outcome">
                        Outcome <span class="text-red-700">*</span>
                    </label>
                    <textarea name="outcome" id="outcome" class="h-30 appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y" disabled>{{ $form->outcome }}</textarea>
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
                    <input name="primary_beneficiary" id="primary_beneficiary" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" value="{{ $form->primary_beneficiary }}" disabled>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="number-of-primary-beneficiary">
                        Number of Primary Beneficiary <span class="text-red-700">*</span>
                    </label>
                    <input name="num_primary_beneficiary" id="num_primary_beneficiary" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number" value="{{ $form->num_primary_beneficiary }}" disabled>
                </div>
            </div>

            @if(!empty($form->secondary_beneficiary))
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="secondary-beneficiary">
                        Secondary Beneficiary <span class="text-red-700">*</span>
                    </label>
                    <input name="secondary_beneficiary" id="secondary_beneficiary" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" value="{{ $form->secondary_beneficiary }}" disabled>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="number-of-secondary-beneficiary">
                        Number of Secondary Beneficiary <span class="text-red-700">*</span>
                    </label>
                    <input name="num_secondary_beneficiary" id="num_secondary_beneficiary" class="appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number" value="{{ $form->num_secondary_beneficiary }}" disabled>
                </div>
            </div>
            @endif

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activities">
                        Activities/Programme <span class="text-red-700">*</span>
                    </label>
                    <textarea name="activities" id="activities" class="h-30 appearance-none block w-full bg-grey-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y" disabled>{{  $form->activities  }}</textarea>
                    <!-- <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="activities" type="text" placeholder=""> -->
                </div>
            </div>

            @if($form->has_rf)
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="date_needed">
                        Date Needed <span class="text-red-700">*</span>
                    </label>
                    <input name="date_needed" id="date_needed" class="appearance-none block w-full bg-gray-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="date" value="{{ $form->date_needed }}" disabled>
                </div>

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="requi_type">
                    Type <span class="text-red-700">*</span>
                    </label>
                    <input name="requi_type" id="requi_type" class="appearance-none block w-full bg-gray-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" value="{{ $form->requi_type }}" disabled>
                </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="date_needed">
                        Date Needed <span class="text-red-700">*</span>
                    </label>
                    <input name="date_needed" id="date_needed" class="appearance-none block w-full bg-gray-lighter 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="date" value="{{ $form->date_needed }}" disabled>
                </div>
            </div>

            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 ">
                <div class="align-middle inline-block min-w-full shadow-sm overflow-hidden sm:rounded-lg border border-gray-200">
                    <table id="rfTable_info" class="min-w-full">
                        <thead>
                            <tr>
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
                        <tbody class="bg-white rf_tbody_info">
                        @foreach(json_decode($form->item_details) as $item_detail)
                        <tr>
                            <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <input class="item_quantity appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter 
                                    rounded py-3 px-4" value="{{  $item_detail->item_quantity  }}"type="number" disabled>
                                </div>
                            </td>

                            <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <input class="item_purpose appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter 
                                    rounded py-3 px-4" value="{{  $item_detail->item_purpose  }}" type="text" disabled>
                                </div>
                            </td>

                            <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <input class="item_cost appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter 
                                    rounded py-3 px-4" value="PHP {{  number_format($item_detail->item_cost, 2)  }}" type="text" disabled>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="-mx-3 pl-2 float-right md:flex">
                        <div class="md:w-full m-2 mr-5 md:mb-0">
                            <input name="total_cost" id="total_cost" class="appearance-none block w-full bg-gray-100
                            text-grey-darker border border-red rounded py-3 px-4 mb-3"
                            type="text" value="PHP {{ number_format($form->total_cost, 2) }}" placeholder="Total Cost (PHP)" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="-mx-3 md:flex m-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="remarks">
                        Remarks <span class="text-red-700">*</span>
                    </label>
                    <textarea name="remarks" id="remarks" class="h-30 appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y" >{{$form->remarks}}</textarea>
                    <!-- <input class="appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter rounded py-3 px-4" id="remarks" type="text" placeholder=""> -->
                </div>
            </div>

            <div class="-mx-3 md:flex m-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="charged">
                        Charged to <span class="text-red-700">*</span>
                    </label>
                    <textarea name="charged" id="charged" class="h-30 appearance-none block w-full bg-gray-100 
                    text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y">{{$form->charged}}</textarea>
                    <!-- <input class="appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter rounded py-3 px-4" id="charged" type="text" placeholder=""> -->
                </div>
            </div>
            @endif

            @if(Auth::user()->role == 2)
            <form action="{{ route('forms.update', $form->id) }}" method="post">
                <div class="-mx-3 md:flex m-6">
                    <div class="md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="charged">
                            Comment <span class="text-red-700"></span>
                        </label>
                        <textarea name="comment" id="comment" class="h-30 appearance-none block w-full bg-gray-100 
                        text-grey-darker border border-grey-lighter rounded py-3 px-4 resize-y" placeholder="Comment/s"></textarea>
                        <!-- <input class="appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter rounded py-3 px-4" id="charged" type="text" placeholder=""> -->
                    </div>
                </div>
                
                

            <div class="-mx-3 md:flex mb-6 flex">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <form action="{{ route('forms.update', $form->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="approval" value="Rejected" class="hidden">
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <!-- Heroicon name: lock-closed -->
                            </span>
                        Deny
                        </button>
                    </form>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <form action="{{ route('forms.update', $form->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="approval" value="SAO Approved" class="hidden">
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <!-- Heroicon name: lock-closed -->
                            </span>
                        Approve
                        </button>
                    </form>
                </div>

                
            </div>
            </form>
            @endif

        </div>
    </div>
</div>
@endsection