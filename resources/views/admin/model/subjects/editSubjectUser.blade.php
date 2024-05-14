<div class="relative z-10" aria-labelledby="modleCreateSubjectUser_{{ $subject->id }}_{{ $subjectUser->id }}" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
                    <div class="sm:flex sm:items-start w-full">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-center w-full">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Edit Subject User
                            </h3>
                                <div class="mt-2 ">
                                    <form
                                        action="{{ route('subjectUser_update', ['subjectId' => $subject->id, 'subjectUserId' => $subjectUser->id]) }}"
                                        id="formEditSubjectUser_{{ $subject->id }}_{{ $subjectUser->id }}"
                                        class="formEditSubjectUser{{ $subject->id }}_{{ $subjectUser->id }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label for="editNameSubject_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                class="block text-gray-700 text-sm font-bold mb-2">Subject
                                                Name</label>
                                            <input type="text" name="subject_id"
                                                id="editNameSubject_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                value="{{ $subject->name }}" disabled
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                required>
                                                <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                                            <span
                                                id="errurMessageInputSubjectNameEdit_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                class="sm:text-red-500 ">
                                            </span>
                                        </div>
                                        <div class="mb-4">
                                            <label
                                                for="editNameSubjectUserName_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                class="block text-gray-700 text-sm font-bold mb-2">user name
                                            </label>
                                            <input type="text" name="user_id" disabled
                                                id="editNameSubjectUserName_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                value="{{ $subjectUser->name }}" required>
                                                <input type="hidden" name="user_id" value="{{ $subjectUser->id }}">
                                            <span class="sm:text-red-500 "
                                                id="errurMessageInputSubjectUserEdit_{{ $subject->id }}_{{ $subjectUser->id }}">
                                            </span>
                                        </div>
                                        <div class="mb-4">
                                            <label
                                                for="editNameSubjectUserName_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                class="block text-gray-700 text-sm font-bold mb-2">Mark</label>
                                            <input type="text" name="mark"
                                                id="editNameSubjectUserName_{{ $subject->id }}_{{ $subjectUser->id }}"
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                value="{{ $subjectUser->pivot->mark }}" required>
                                            <span class="sm:text-red-500"
                                                id="errurMessageInputSubjectUserMarkEdit_{{ $subject->id }}_{{ $subjectUser->id }}">
                                            </span>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" id="editSubjectUser_{{$subject->id}}_{{$subjectUser->id}}"
                        data-subject_id="{{ $subject->id }}" data-user_id="{{ $subjectUser->id }}"
                        class="editSubjectUserButton inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Create</button>
                    </form>
                    <button type="button" onclick="closeModalEditSubjectUser('{{ $subject->id }}_{{ $subjectUser->id }}')"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
