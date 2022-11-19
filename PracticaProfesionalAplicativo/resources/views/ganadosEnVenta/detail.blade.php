<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // No se puede restornar una vista
    function getDetails() {
        var id = document.getElementById("animal").value;

        var url = '{{route("registrosAnimales.show", ":id")}}';
        url = url.replace(':id', id);

        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                document.getElementById("peso").value = data.peso;
                document.getElementById("raza").value = data.raza;
                document.getElementById("genero").value = data.genero;


                console.log(data);

            }
        });

    }
</script>