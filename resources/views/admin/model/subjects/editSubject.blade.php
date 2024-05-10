<div class="relative z-10" aria-labelledby="modleEditSubject_{{$subject->id}}" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 ">
                    <div class="sm:flex sm:items-start w-full">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-center w-full">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Edit Subject
                            </h3>
                            <div class="mt-2 ">
                                <form action="{{ route('subject_update', ['id' => $subject->id]) }}" id="formEditSubject{{$subject->id}}" class="formEditSubject{{$subject->id}}"
                                    method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="mb-4">
                                        <label for="edit_name_subject_{{$subject->id}}"  class="block text-gray-700 text-sm font-bold mb-2">Subject
                                            Name</label>
                                        <input type="text" name="name" id="edit_name_subject_{{$subject->id}}" value="{{$subject->name}}"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            required>
                                        <span id="errurMessageInputSubjectEdit{{$subject->id}}" class="sm:text-red-500 "> </span>
                                    </div>
                                    <div class="mb-4">
                                        <label for="edit_subject_code_{{$subject->id}}"
                                            class="block text-gray-700 text-sm font-bold mb-2">Subject Code </label>
                                        <input type="text" name="subject_code" id="edit_subject_code_{{$subject->id}}" value="{{$subject->subject_code}}"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            required>
                                        <span class="sm:text-red-500 " id="errurMessageInputCodeSubjectEdit{{$subject->id}}"> </span>
                                    </div>
                                    <div class="mb-4">
                                        <label for="edit_success_mark_{{$subject->id}}"
                                            class="block text-gray-700 text-sm font-bold mb-2">Success Mark</label>
                                        <input type="text" name="success_mark" id="edit_success_mark_{{$subject->id}}" value="{{$subject->success_mark}}"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            required>
                                        <span class="sm:text-red-500" id="errurMessageInputSuccessMarkEdit{{$subject->id}}"> </span>
                                    </div>
                                    <div class="mb-4">
                                        <label for="edit_full_mark_{{$subject->id}}" class="block text-gray-700 text-sm font-bold mb-2">Full
                                            Mark</label>
                                        <input type="text" name="full_mark" id="edit_full_mark_{{$subject->id}}" value="{{$subject->full_mark}}"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"required>
                                        <span class="sm:text-red-500" id="errurMessageInputFullMarkEdit{{$subject->id}}"> </span>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" id="editSubject" data-id="{{$subject->id}}"
                        class="editSubjectButton inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Create</button>
                    </form>
                    <button type="button" onclick="closeModalEditSubject({{ $subject->id }})"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
