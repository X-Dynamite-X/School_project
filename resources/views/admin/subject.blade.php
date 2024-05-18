@extends('admin.layouts.admin')
@section('css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/table_ajax.css') }}">
@endsection
@section('content_admin')
    <div class="flex-grow p-4 container mt-4">

        <table id="subject_table" class="w-full border-collapse border border-gray-300">
            <button id="openCreatSubject" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Create
            </button>
            <thead>
                <tr>
                    <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">ID</th>
                    <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Name Subject</th>
                    <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Code Subject</th>
                    <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Success Mark</th>
                    <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Full Mark</th>
                    <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100 text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tbodySubject" class="bg-white divide-y divide-gray-200">
            </tbody>
        </table>
        <div id="CreatSubject" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">
            @include('admin.model.subjects.createSubject')
        </div>
        <div class="modl">
            @include('admin.model.subjects.allModle')
        </div>
    @endsection
    @section('js')
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
        <script src="{{ asset('js/DataTables/subjectDataTable.js') }}"></script>
        {{-- @foreach ($subjects as $subject)
            <script>
                $(document).ready(function() {
                    $('#subjectUserTable_{{ $subject->id }}').DataTable({
                        "paging": true,
                        "pageLength": 10
                    });
                });
            </script>
        @endforeach --}}
        <script src="{{ asset('js/buttonModleAjax/SubjectcreateCloseModle.js') }}"></script>
        <script src="{{ asset('js/subject/CreateSubject.js') }}"></script>
        <script src="{{ asset('js/subject/EditSubject.js') }}"></script>
        <script src="{{ asset('js/subject/DeleteSubject.js') }}"></script>
        <script src="{{ asset('js/subject/createSubjectUser.js') }}"></script>
        <script src="{{ asset('js/subject/editSubjectUser.js') }}"></script>
        <script src="{{ asset('js/subject/deleteSubjectUser.js') }}"></script>
        <script src="{{ asset('js/subject/infoSubject.js') }}"></script>

        @include('admin.model.subjects.routeSubject')
    @endsection
