$(document).ready(function() {
    @foreach ($subjects as $subject)

        $('#subjectActionEdit_{{ $subject->id }}').click(function() {
            showModal({{ $subject->id }});
        });

        $('#EditSubject{{ $subject->id }}').on('click', function(event) {
            if (event.target === this) {
                hideModal({{ $subject->id }});
            }
        });
    @endforeach
});

function showModal(subjectId) {
    $('#EditSubject' + subjectId).removeClass('hidden');
}

function hideModal(subjectId) {
    $('#EditSubject' + subjectId).addClass('hidden');
}
