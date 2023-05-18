<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>CATEGORIA</th>
            <th>TITULO</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id_estudio }}</td>
            <td>{{ $rows->nombre }}</td>
            <td>{{ $rows->titulo }}</td>
            <td>{{ $rows->descripcion }}</td>
            <td><div class="attachment-block"><img class="attachment-img" src="{{ $rows->url_image }}" alt="Attachment Image"></div></td>
            <td  style="width: 7rem;">
                <div class="row" style="display: flex;justify-content: space-around;">
                    <a href="javascript:void(0)" style="width: 40px;"
                        onclick="openModalTraining({{ $rows->id_estudio }},'ACTUALIZAR' )"
                        class="btn btn-success"><i class="far fa-edit"></i> </a>
                    <a href="javascript:void(0)" style="width: 40px;" 
                        onclick="openModalTraining({{ $rows->id_estudio }},'ELIMINAR' )"
                        class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>
                    <a href="javascript:void(0)" style="width: 40px;"
                        onclick="openModalTraining({{ $rows->id_estudio }},'TEXTO' )"
                        class="btn btn-primary"><i class="fab fa-adversal"></i> </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
        <th>ID</th>
        <th>CATEGORIA</th>
            <th>TITULO</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>
            <th>ACCIONES</th>
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