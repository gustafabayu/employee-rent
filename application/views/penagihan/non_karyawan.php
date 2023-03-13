
<div class="v-scroll">
    <table id="tbl_karyawan" class="table table-condensed table-hover">
        <thead>
            <tr>
                <th >#</th>                
                <th >Nama</th>
                <th>NIK</th>
                <th >Dept</th>
                <th >CV</th>
                <th>Keterangan</th>                
            </tr>
        </thead>
        <tbody>
            <?php
            $y = 0;
            foreach ($non as $k) {
                $y++;
                echo '<tr>';
                echo '<td class="text-center">';
                echo '<button bariske = ' . $y . ' type="button" class="btn btn-xs blue btnselect">Pilih</button>';
                echo '</td>';               
                echo '<td class="id hide">' . $k->TKID . '</td>';
                echo '<td class="mess hide">' . $k->IDMess . '</td>';
                echo '<td class="nama">' . $k->Nama . '</td>';
                echo '<td class="nik">' . $k->NIK . '</td>';
                echo '<td class="dept">' . $k->NamaDept . '</td>';
                echo '<td class="cv">' . $k->NamaCV . '</td>';
                echo '<td class="ket">' . $k->Ket . '</td>'; 
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>	
</div>

<!--<script type="text/javascript">
    $('.btnselect').click(function () {
        var $tr = $(this).closest("tr");
        var id = $tr.find('.id').text();
        var nama = $tr.find('.nama').text();
        var ket = $tr.find('.ket').text();
        var dept = $tr.find('.dept').text();
        var cv = $tr.find('.cv').text();
        var nik = $tr.find('.nik').text();
                
        $('#tbl_penagihan > tbody:last-child').append(
                '<tr>\n\
                    <td class="text-center">\n\
                            <input type="button" class="btn default btn-sm red-stripe " onclick="removeRow(this)" value="Hapus"> \n\
                            <input type="hidden" name="rows[]" >\n\
                    </td>\n\
                    <td ><input name="txtNama[]" type="text" class="form-control " readonly="readonly" value="' + nama + '" ><input type="hidden" class="form-control " name="txtTKID[]" value="'+id+'"></td>\n\
                    <td ><input name="txtNIK[]" type="text" class="form-control " readonly="readonly" value="' + nik + '" ></td>\n\
                    <td ><input name="txtDept[]" type="text" class="form-control " readonly="readonly" value="' + dept + '" ></td>\n\
                    <td ><input name="txtCV[]" type="text" class="form-control " readonly="readonly" value="' + cv + '" ></td>\n\
                    <td><input name="txtKet[]" type="text"  class="form-control " readonly value="' + ket + '"/></td>\n\
                    <td><input name="txtTagihan[]" type="text"  class="form-control "/></td>\n\
                    <td><input name="txtTunggakan[]" type="text"  class="form-control "/></td>\n\
                    <td><input name="txtTotal[]" type="text"  class="form-control "/></td>\n\
                </tr>'
                );
        $('#modal_karyawan').modal('hide');
    });
</script>-->

<script type="text/javascript">
    //$(document).ready(function () {
        
        $(".btnselect").click(function () {
            var $tr = $(this).closest("tr");
            var id = $tr.find('.id').text();
            var mess = $tr.find('.mess').text();
            var nama = $tr.find('.nama').text();
            var ket = $tr.find('.ket').text();
            var dept = $tr.find('.dept').text();
            var cv = $tr.find('.cv').text();
            var nik = $tr.find('.nik').text();
            
            $('#tbl_penagihan > tbody:last-child').append(
                '<tr class="records">'
                + '<td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"><input name="rows[]" type="hidden"></td>'
                + '<td><input name="txtNama[]" type="text" readonly="readonly" class="form-control" value="'+ nama +'"/><input type="hidden" class="form-control " name="txtIDMess[]" value="'+mess+'"></td>'
                + '<td><input name="txtNIK[]" type="text" readonly="readonly" class="form-control" value="'+ nik +'"/><input type="hidden" class="form-control " name="txtTKID[]" value="'+id+'"></td>'
                + '<td><input name="txtDept[]" type="text" readonly="readonly" class="form-control" value="'+ dept +'"/></td>'
                + '<td><input name="txtCV[]" type="text" class="form-control" readonly="readonly" value="' + cv + '" ></td>'
                + '<td><input name="txtKet[]" type="text"  class="form-control" readonly value="'+ ket +'"/></td>'
                + '<td><input name="txtTagihan[]" type="text"  class="form-control" onKeyUp="getValues()"/></td>'
                + '<td><input name="txtTunggakan[]" type="text"  class="form-control" onKeyUp="getValues()"/></td>'
                + '<td><input name="txtTotal[]" type="text"  class="form-control"/></td>'
                + '</tr>'
                );
            $('#modal_karyawan').modal('hide');
        });

        $(".remove_item").live('click', function (ev) {
            if (ev.type === 'click') {
                $(this).parents(".records").fadeOut();
                $(this).parents(".records").remove();
            }
        });
    //});
</script>