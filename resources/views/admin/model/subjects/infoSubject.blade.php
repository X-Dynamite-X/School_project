<div class="relative z-10" aria-labelledby="modleInfoSubject_{{ $subject->id }}" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative  transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-8/12	 ">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
                    <div class="sm:flex sm:items-start w-full">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-center w-full">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Info Subject
                            </h3>
                            <table id="subjectUserTable_{{$subject->id}}" style="width: 100%" class="w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">ID</th>
                                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Name Subject</th>
                                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Name user</th>
                                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Mark</th>
                                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodySubjectUser{{$subject->id}}" class="bg-white divide-y divide-gray-200 full-width">
                                    @foreach ($subject->users as $subjectUser)
                                        <tr id="trSubject_{{ $subject->id }}">
                                            <td id="subjectID_{{ $subject->id }}"    class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">
                                                {{ $subjectUser->id }}</td>
                                            <td id="subjectName_{{ $subject->id }}"  class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">
                                                {{ $subject->name }}</td>
                                            <td id="subjectUserName_{{ $subjectUser->id }}" class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">
                                                {{ $subjectUser->name }}</td>
                                            <td id="subjecUserMark_{{ $subjectUser->id }}"
                                                class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">{{ $subjectUser->pivot->mark }}</td>
                                            <td id="subjectAction_{{ $subject->id }}"
                                                class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap text-center w-10">
                                                <div class="flex-row">
                                                    <div class="bg-gray-100">
                                                        <button id="subjectUserActionEdit_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                            onclick="showEditSubjectUserModal('{{ $subject->id }}_{{ $subjectUser->id }}')"
                                                            class="px-2 py-2 text-yellow-400 hover:text-yellow-600 ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                            </svg>
                                                        </button>
                                                        <button id="subjectUserActionDelete_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                            onclick="showDeleteSubjectUserModal('{{ $subject->id }}_{{ $subjectUser->id }}')"
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
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" onclick="closeModalInfoSubject({{ $subject->id }})"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
