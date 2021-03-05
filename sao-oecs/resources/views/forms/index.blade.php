@extends('layouts.app')

@section('content')
    <div class="container mx-auto justify-center px-6 py-1">

    @if(Auth::user()->role == 1)

        @if($message = Session::get('success'))
        <div class="success bg-green-100 border border-green-400 text-green-700 px-4 py-6 rounded relative alert alert-dismissable alert-success" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{  $message  }}</span>
        </div>
        @endif

        <div class="text-gray-700 text-3xl font-medium my-4">Submitted Forms
            <div class="-mx-3 md:flex px-3 mb-4 float-right">
                <div class="md:w-full px-3 mb-4 md:mb-0">
                    <a href="{{ route('forms.create') }}" class="">
                    <div class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        </span>
                        New Activity Proposal Form
                    </div>
                    </a>
                </div>
            </div>
        </div>

            <div class="flex flex-col mt-8">
                <div class="-my-2 py-2 overflow-x-auto">
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Event Title</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Date Submitted</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Organization</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Budget Form</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            @if($forms->count())
                                @foreach($forms as $form)
                                    
                                <!-- lagyan ko dito ng comment heheie -->

                                <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50">
                                    </div>
                                
                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                                        You are about to delete this form
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">
                                                            Are you sure you want to delete this form? All of its data will be permanently removed. This action cannot be undone.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <form action="{{  route('forms.destroy', $form->id)  }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                    Delete
                                                </button>
                                            </form>
                                            <button type="deny" class="modal-close mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <tbody class="bg-white hover:bg-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                                        {{ $form->activity_title }}
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">{{ $form->user->name }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{$form->created_at->isoFormat('LLL') }} </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                            <div class="text-sm leading-5 text-gray-900"> {{ $form->org->org_name }} </div>
                                        </td>
                                        @if(empty($form->total_cost))
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                            No budget.
                                        </td>
                                        @else
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                            <div class="text-sm leading-5 text-gray-900"> PHP {{ number_format($form->total_cost, 2) }} </div>
                                        </td>
                                        @endif
                                        @if($form->status == 'Approved')
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                        </td>
                                        @elseif($form->status == 'Rejected')
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                        </td>
                                        @else
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $form->status }}</span>
                                        </td>
                                        @endif

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        @if($form->status == 'Pending' || $form->status == 'Rejected')
                                        <div class="flex flex-row">
                                            <div>
                                                <a href="{{ route('forms.show', $form->id) }}" class="text-blue-600 pr-3 hover:text-blue-900">View</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('forms.edit', $form->id) }}" class="text-indigo-600 pr-3 hover:text-indigo-900">Edit</a>
                                            </div>
                                            <div>
                                                <button class="text-red-600 pr-3 hover:text-red-900 modal-open">Delete</button>
                                            </div>
                                        </div>
                                        @else
                                        <p>No actions.</p>
                                        <!-- kapag success, dapat may view pa din -->
                                        @endif
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                
                                @else
                                <tr>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            There are no event proposals.
                                        </div>
                                    </td>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                </tr>                                
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="pt-4 px-2">
            {{ $forms->links() }}
            </div>
        </div>
    @elseif(Auth::user()->role == 2)
    
    <div class="text-gray-700 text-3xl font-medium my-4">Submitted Forms</div>

            <div class="flex flex-col mt-8">
                <div class="-my-2 py-2 overflow-x-auto">
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Event Title</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Date Submitted</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Organization</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Budget Form</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            @if($all_forms->count())
                                @foreach($all_forms as $form)
                                <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50">
                                    </div>
                                
                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                            <div class="sm:flex sm:items-start">
                                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                                        You are about to delete this form
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">
                                                            Are you sure you want to delete this form? All of its data will be permanently removed. This action cannot be undone.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <form action="{{  route('forms.destroy', $form->id)  }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                    Delete
                                                </button>
                                            </form>
                                            <button type="deny" class="modal-close mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <tbody class="bg-white hover:bg-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                                        {{ $form->activity_title }}
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">{{ $form->user->name }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{$form->created_at->isoFormat('LLL') }} </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                            <div class="text-sm leading-5 text-gray-900"> {{ $form->org->org_name }} </div>
                                        </td>
                                        @if(empty($form->total_cost))
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                            No budget.
                                        </td>
                                        @else
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                            <div class="text-sm leading-5 text-gray-900"> PHP {{ number_format($form->total_cost, 2) }} </div>
                                        </td>
                                        @endif
                                        @if($form->status == 'Approved')
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                        </td>
                                        @elseif($form->status == 'Rejected')
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                        </td>
                                        @else
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $form->status }}</span>
                                        </td>
                                        @endif

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        @if($form->status == 'Pending' || $form->status == 'Rejected')
                                        <div class="flex flex-row">
                                            <div>
                                                <a href="{{ route('forms.show', $form->id) }}" class="text-blue-600 pr-3 hover:text-blue-900">View</a>
                                            </div>
                                        </div>
                                        @else
                                        <p>No actions.</p>
                                        <!-- kapag success, dapat may view pa din -->
                                        @endif
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                
                                @else
                                <tr>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            There are no event proposals.
                                        </div>
                                    </td>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                    <td class="bg-white px-6 py-4 whitespace-no-wrap border-b border-gray-200"></td>
                                </tr>                                
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="pt-4 px-2">
            {{ $all_forms->links() }}
            </div>
        </div>

    @endif
    </div> 
@endsection