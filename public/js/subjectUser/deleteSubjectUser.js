$(document).on("click", ".buttonDeleteSubjectUser", function () {
    var subjectId = $(this).data("subject_id");
    var userId = $(this).data("user_id");
    var userName = $(this).data("user_name");

    var form = $("#formDeleteSubjectUser_" + subjectId + "_" + userId);
    $.ajax({
        type: "Delete",
        url: form.attr("action"),
        data: {
            _token: form.find('input[name="_token"]').val(),
            _method: "DELETE",
        },
        success: function (data) {
            console.log(data);


            $("#trSubjectUser_" + subjectId + "_" + userId).remove();
            $("#InfoSubject" + subjectId).remove();
            $("#EditSubjectUser_" + subjectId + "_" + userId).remove();
            $("#DeleteSubjectUser_" + subjectId + "_" + userId).remove();


            var option_user = `
            <option id="optionUserNameInSubjectUser_${subjectId}_${userId}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            required value="${userId}"> ${userName}
        </option>
        `;
            $("#userNameSubjectUsers_" + subjectId).append(option_user);
            $('[id^="DeleteSubjectUser_"]').addClass("hidden");
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});
