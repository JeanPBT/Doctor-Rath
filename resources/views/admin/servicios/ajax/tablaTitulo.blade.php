<table id="example2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id Titulo</th>
            <th>Servicio</th>
            <th>Titulo Principal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id_titulo }}</td>
            <td>{{ $rows->superior_titulo1 }}</td>
            <td>{{ $rows->titulo_principal }}</td>
            <td>
                <a href="javascript:void(0)" onclick="openModalTitulo({{ $rows->id_titulo }},'ACTUALIZAR' )"
                    class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="openModalTitulo({{ $rows->id_titulo }},'ELIMINAR' )"
                    class="btn btn-block bg-gradient-danger"><i class="fas fa-trash-alt"></i></a>
            </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Id Titulo</th>
            <th>Servicio</th>
            <th>Titulo Principal</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>

<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$(function() {
    $("#example2").DataTable({
        "order": [[ 0, "desc" ]],
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


});
</script>