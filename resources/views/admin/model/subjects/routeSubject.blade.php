<script>
    var routCreateSubjectUser= "{{ route('subjectUser_store','') }}";
    var routSubjectDelete ="{{ route('subject_destroy','') }}";
    var routSubjectUserDelete ="{{ route('subjectUser_destroy', ['', '']) }}";
    var routSubjectEdit ="{{ route('subject_update', ['']) }}";
    var routSubjectUserEdit ="{{ route('subjectUser_update', ['', '']) }}";
    var csrf_token = "{{ csrf_token() }}";

    console.log(routCreateSubjectUser);
    console.log(routSubjectDelete);
    console.log(routSubjectUserDelete);
    console.log(routSubjectEdit);
    console.log(routSubjectUserEdit);

</script>
