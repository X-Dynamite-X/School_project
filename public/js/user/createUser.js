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


$(document).ready(function () {
    var form = $("#formUser");
    $("#createUser").click(function () {
        var formData = form.serialize();
        console.log(formData);
        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: formData,
            success: function (data) {
                console.log(data);
                $("#password_confirmation").val("");
                $("#formUser").find("input").val("");
                $("#errurMessageInputUser").text("");
                $("#errurMessageInputEmailUser").text("");
                $("#errurMessageInputPassword").text("");
                $("#errurMessageInputPasswordConfirmation").text("");
                $('#CreatUser').addClass('hidden');
            },
            error: function (data) {
                var errur = data.responseJSON.message;
                console.log(errur);
                $("#errurMessageInputUser").text("");
                $("#errurMessageInputEmailUser").text("");
                $("#errurMessageInputPassword").text("");
                $("#errurMessageInputPasswordConfirmation").text("");
                $("#errurMessageInputUser").text(errur.name);
                $("#errurMessageInputEmailUser").text(errur.email);
                $("#errurMessageInputPassword").text(errur.password);
                $("#errurMessageInputPasswordConfirmation").text(errur.full_mark);
            },
        });
    });
});
