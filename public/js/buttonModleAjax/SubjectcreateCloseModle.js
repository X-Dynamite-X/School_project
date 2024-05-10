$(document).ready(function() {
    $('#openCreatSubject').click(function() {
        $('#CreatSubject').removeClass('hidden');
    });

    $('#CreatSubject').on('click', function(event) {
        if (event.target === this) {
            $(this).addClass('hidden');
        }
    });
});

function closeModalCreateSubject() {
    var modal = document.querySelector('#CreatSubject');
    modal.classList.add('hidden');
}
