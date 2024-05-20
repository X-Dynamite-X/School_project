function showEditModal(id) {
    $.ajax({
        url: '/admin/getUserData/' + id,
        type: 'GET',
        success: function(response) {
            var user = response[0];
            var roles = response[1];

            $.get("/templates/user/editUserModle.html", function (template) {
                var infoSubject = template
                    .replace(/\${id}/g, user.id)
                    .replace(/\${name}/g, user.name)
                    .replace(/\${email}/g, user.email)
                    .replace(/\${routUserEdit}/g, routUserEdit)
                    .replace(/\${csrf_token}/g, csrf_token);
                $(`.editModle`).append(infoSubject);
                roles.forEach(function (role) {
                    var span = document.createElement("span");
                    span.setAttribute(
                        "id",
                        `userRole_${role}_${user.id}`
                    );
                    span.setAttribute(
                        "class",
                        "bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded"
                    );
                    span.textContent = role;
                    var parentElement = document.getElementById(`userRoles_${user.id}`);
                    if (parentElement) {
                        parentElement.appendChild(span);
                    }
                });
            });
            hideAllModals();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
function closeModalEditUser(userId) {
    var modal = document.querySelector("#editUser_" + userId);
    modal.classList.add("hidden");
    modal.remove();
}

function hideAllModals() {
    $('[id^="editUser_"]').addClass('hidden');
    $('[id^="editUser_"]').remove();

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
            $("#errurMessageInputUserNameEdit_"+ data.id).text("");
            $("#errurMessageInputUserEmailEdit_"+ data.id).text("");
            $("#userNameId_" + data.id).text(data.name);
            $("#userEmailId_" + data.id).text(data.email);
            // $("#userNameEdit_" + data.id).text(data.name);
            // $("#userEmailEdit_" + data.id).text(data.email);

            $('[id^="editUser_"]').addClass('hidden');
            $('[id^="editUser_"]').remove();


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
