@extends('admin.layouts.admin')
@section('css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/table_ajax.css') }}">
@endsection
@section('content_admin')
    <div class="flex-grow p-4  container mt-4">
        <button id="openCreatUser" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Create
        </button>
        <div class="container ">


            <table id="user_table" class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="">
                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">id</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Name</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Email</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Role</th>
                        <th class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-100">Action</th>
                    </tr>
                </thead>
                <tbody id = "tbodyUser" class="bg-white divide-y divide-gray-200">
                    {{-- @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">
                            <img src="{{ asset('img/-5818810161089854385_120.jpg') }}" alt="User 1"
                                class="inline-block h-8 w-8 rounded-full">
                            {{ $user->name }}
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                @foreach ($user->getRoleNames() as $role)
                                    {{ $role }}
                                @endforeach
                            </span>
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-900 whitespace-nowrap">Active</td>
                    </tr>
                @endforeach --}}
                </tbody>
            </table>
        </div>
        <div id="CreatUser" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            @include('admin.model.user.createUser')
        </div>

    </div>
@endsection
@section('js')
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script src="{{ asset('js/DataTables/userDataTable.js') }}"></script>
    <script src="{{ asset('js/user/createUser.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#openCreatUser').click(function() {
                $('#CreatUser').removeClass('hidden');
            });

            $('#CreatUser').on('click', function(event) {
                if (event.target === this) {
                    $(this).addClass('hidden');
                }
            });
        });

        function closeModal() {
            var modal = document.querySelector('#CreatUser');
            modal.classList.add('hidden');
        }
    </script>
@endsection
