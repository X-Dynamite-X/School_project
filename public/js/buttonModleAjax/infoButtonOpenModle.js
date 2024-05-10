$(document).ready(function() {
    @foreach ($subjects as $subject)
    
        $('#subjectActionInfo_{{ $subject->id }}').click(function() {
            showModal({{ $subject->id }});
        });

        $('#InfoSubject{{ $subject->id }}').on('click', function(event) {
            if (event.target === this) {
                hideModal({{ $subject->id }});
            }
        });
    @endforeach
});

function showModal(subjectId) {
    $('#InfoSubject' + subjectId).removeClass('hidden');
}

function hideModal(subjectId) {
    $('#InfoSubject' + subjectId).addClass('hidden');
}
