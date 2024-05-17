<div id="CreatUser" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    @include('admin.model.user.createUser')
</div>

<div class="editModle">
    @foreach ($users as $user)
        <div id="editUser_{{ $user->id }}" class=" hidden fixed z-10 inset-0 overflow-y-auto "
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            @include('admin.model.user.editUser')
        </div>
    @endforeach
</div>
<div class="infoModle">
    @foreach ($users as $user)
        <div id="infoUser_{{ $user->id }}" class=" hidden fixed z-10 inset-0 overflow-y-auto "
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            @include('admin.model.user.infoUser')
        </div>
    @endforeach
</div>
