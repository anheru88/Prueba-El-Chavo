<script>
    $(document).ready(function () {
        $('.btn-delete').on('click', function () {
            identifier = $(this).data('id');
            url = "{{ route('chavo.delete', 0) }}";
            url = url.replace(0, identifier);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );

                    window.location.replace(url);
                }
            })
        })
    });
</script>