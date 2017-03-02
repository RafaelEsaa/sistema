@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" placeholder="Buscar Representante" class="form-control" id="search_text">
            </div>
        </div>
    </div>
    <input type="hidden" name="representante_id" id="buscado">
    <script>
        $(document).ready(function() {
            src = "{{ route('searchajax') }}";
            $('#search_text').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            console.log(data)
                            response(data);

                        }
                    });
                },
                min_length: 3,
                select: function(event, ui) {
                    console.log(ui)
                    $('#buscado').val(ui.item.id);
                }

            });
        });
    </script>
@endsection