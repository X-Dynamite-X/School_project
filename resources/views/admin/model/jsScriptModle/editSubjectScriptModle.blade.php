<script>
    function showEditModal(subjectId) {
        hideAllModals(); // يخفي جميع الـ Modals أولا
        $('#EditSubject' + subjectId).removeClass('hidden');
    }

    function closeModalEditSubject(subjectId) {
        var modal = document.querySelector("#EditSubject" + subjectId);
        modal.classList.add('hidden');
    }

    function hideAllModals() {
        // يجعل كل الـ Modals مخفية
        $('[id^="EditSubject"]').addClass('hidden');
    }
</script>

