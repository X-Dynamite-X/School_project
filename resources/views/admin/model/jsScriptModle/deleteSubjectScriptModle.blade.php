<script>
    function showDeleteModal(subjectId) {
        hideAllModals();
        $('#DeleteSubject' + subjectId).removeClass('hidden');
    }

    function closeModalDeleteSubject(subjectId) {
        var modal = document.querySelector("#DeleteSubject" + subjectId);
        modal.classList.add('hidden');
    }

    function hideAllModals() {
        $('[id^="DeleteSubject"]').addClass('hidden');
    }
</script>
