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
                @foreach ($subjects as $subject)
                    <tr id="trSubject_{{ $subject->id }}">
                        <td id="subjectID_{{ $subject->id }}" class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">
                            {{ $subject->id }}</td>
                        <td id="subjectName_{{ $subject->id }}" class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">
                            {{ $subject->name }}</td>
                        <td id="subjectCode_{{ $subject->id }}" class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">
                            {{ $subject->subject_code }}</td>
                        <td id="subjectSuccessMark_{{ $subject->id }}"
                            class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">{{ $subject->success_mark }}</td>
                        <td id="subjectFullMark_{{ $subject->id }}"
                            class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">{{ $subject->full_mark }}</td>
                        <td id="subjectAction_{{ $subject->id }}"
                            class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap text-center w-10">
                            <div class="flex-row">
                                <div class="bg-gray-100">
                                    <button id="subjectActionInfo_{{ $subject->id }}"
                                        onclick="showInfoModal('{{ $subject->id }}')"
                                        class="px-2 py-2 text-blue-400 hover:text-blue-600 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path
                                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                        </svg>
                                    </button>
                                    <button id="subjectActionEdit_{{ $subject->id }}"
                                        onclick="showEditModal('{{ $subject->id }}')"
                                        class="px-2 py-2 text-yellow-400 hover:text-yellow-600 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </button>
                                    <button id="subjectActionDelete_{{ $subject->id }}"
                                        onclick="showDeleteModal('{{ $subject->id }}')"
                                        class="px-2 py-2 text-red-400 hover:text-red-600 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
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
        <script>
            $(document).ready(function() {
                $('#subject_table').DataTable({
                    "paging": true,
                    "pageLength": 10
                });
            });
        </script>
        @foreach ($subjects as $subject)
            <script>
                $(document).ready(function() {
                    $('#subjectUserTable_{{ $subject->id }}').DataTable({
                        "paging": true,
                        "pageLength": 10
                    });
                });
            </script>
        @endforeach
        <script src="{{ asset('js/buttonModleAjax/SubjectcreateCloseModle.js') }}"></script>
        <script src="{{ asset('js/subject/CreateSubject.js') }}"></script>
        <script src="{{ asset('js/subject/EditSubject.js') }}"></script>
        <script src="{{ asset('js/subject/DeleteSubject.js') }}"></script>
        <script src="{{ asset('js/subject/createSubjectUser.js') }}"></script>
        <script src="{{ asset('js/subject/editSubjectUser.js') }}"></script>
        <script src="{{ asset('js/subject/deleteSubjectUser.js') }}"></script>



        @include('admin.model.jsScriptModle.infoSubjecScriptModle')
        @include('admin.model.jsScriptModle.editSubjectScriptModle')
        @include('admin.model.jsScriptModle.deleteSubjectScriptModle')
        @include('admin.model.jsScriptModle.editSubjectUserScriptModle')
        @include('admin.model.jsScriptModle.createSubjectUserModle')
        @include('admin.model.jsScriptModle.deleteSubjectUserModle')
        @include('admin.model.subjects.routeSubject')
    @endsection
