
function showEditModal(subjectId) {
    hideAllModals(); // يخفي جميع الـ Modals أولا
    $('#editUser_' + subjectId).removeClass('hidden');
}

function closeModalEditUser(subjectId) {
    var modal = document.querySelector("#editUser_" + subjectId);
    modal.classList.add('hidden');
}

function hideAllModals() {
    // يجعل كل الـ Modals مخفية
    $('[id^="editUser_"]').addClass('hidden');
}

$(document).on('click', '.editUserButton', function() {
    var id = $(this).data("id");
    var form = $("#formEditUser_" + id);
    var formData = form.serialize();
    $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: formData,
        success: function (data) {
            console.log(data);
            $("#errurMessageInputUserNameEdit_"+ data.id).text("");
            $("#errurMessageInputUserEmailEdit_"+ data.id).text("");

            $("#userNameId_" + data.id).text(data.name);
            $("#userEmailId_" + data.id).text(data.email);

            $("#userNameEdit_" + data.id).text(data.name);
            $("#userEmailEdit_" + data.id).text(data.email);

            $('[id^="EditSubject"]').addClass('hidden');

        },
        error: function (data) {
            var errur = data.responseJSON.message;
            console.log(errur);
            $("#errurMessageInputUserNameEdit_"+ id).text("");
            $("#errurMessageInputUserEmailEdit_"+ id).text("");


            $("#errurMessageInputUserNameEdit_"+ id).text(errur.name);
            $("#errurMessageInputUserEmailEdit_"+ id).text(errur.email);

        },
    });
});
