function showInfoModal(id) {
    $.ajax({
        url: '/admin/getUserData/' + id,
        type: 'GET',
        success: function(response) {
            console.log(response);
            var user = response[0];
            var roles = response[1];
            console.log(user);
            console.log(roles);
            $.get("/templates/user/infoUserModle.html", function (template) {
                var infoSubject = template
                    .replace(/\${id}/g, user.id)
                    .replace(/\${name}/g, user.name)
                    .replace(/\${email}/g, user.email);
                $(`.infoModle`).append(infoSubject);
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
function closeModalInfoUser(userId) {
    var modal = document.querySelector("#infoUser_" + userId);
    modal.classList.add("hidden");
    modal.remove("#infoUser_" + userId);
}

function hideAllModals() {
    // يجعل كل الـ Modals مخفية
    $('[id^="infoUser_"]').addClass("hidden");
}
