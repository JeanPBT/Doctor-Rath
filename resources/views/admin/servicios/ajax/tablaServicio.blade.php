<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Servicio</th>
            <th>Titulo Principal</th>
            <th>Sub titulo</th>
            <th>Descripcion</th>
            <th>Info+</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id_descripcion }}</td>
            <td>{{ $rows->superior_titulo1 }}</td>
            <td>{{ $rows->titulo_principal }}</td>
            <td>{{ $rows->title }}</td>
            <td>{{ $rows->descripcion }}</td>
            <td>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id_descripcion }},'INFORMACION' )"
                    class="btn btn-block bg-gradient-success"><i class="fas fa-table"></i> </a>
            </td>
            <td>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id_descripcion }},'ACTUALIZAR' )"
                    class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id_descripcion }},'ELIMINAR' )"
                    class="btn btn-block bg-gradient-danger"><i class="fas fa-trash-alt"></i> </a>
            </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Servicio</th>
            <th>Titulo Principal</th>
            <th>Sub titulo</th>
            <th>Descripcion)</th>
            <th>Info+</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>

<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$(function() {
    $("#example1").DataTable({
        "order": [
            [0, "desc"]
        ],
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


});
</script>