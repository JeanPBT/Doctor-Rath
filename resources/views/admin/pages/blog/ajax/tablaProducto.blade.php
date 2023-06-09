<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>

            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id }}</td>
            <td>{{ $rows->name_color }}</td>
            <td><?php echo mb_strimwidth($rows->description, 0, 210, "...");?> </td>

            <td><div class="attachment-block"><img style="width:100px;height: 120px;object-fit: cover;" src="{{ $rows->url_image }}" alt="Attachment Image"></div></td>
            <td>
                <a href="javascript:void(0)" onclick="openModalCrud({{ $rows->id }},'ACTUALIZAR' )" 
                    class="btn bg-gradient-success"><i class="far fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="openModalCrud({{ $rows->id }},'ELIMINAR' )"
                    class="btn bg-gradient-danger"><i class="fas fa-trash-alt"></i> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
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