
<div class="v-scroll">
    <table id="tbl_karyawan" class="table table-condensed table-hover">
        <thead>
            <tr>
                <th >#</th>                
                <th >Nama</th>
                <th>NIK</th>
                <th >Departemen</th>
                <th >CV</th>                
            </tr>
        </thead>
        <tbody>
            <?php
            $y = 0;
            foreach ($kar as $k) {
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
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>	
</div>

<script type="text/javascript">
    $('.btnselect').click(function () {
        var $tr = $(this).closest("tr");
        var id = $tr.find('.id').text();
        var mess = $tr.find('.mess').text();
        var nama = $tr.find('.nama').text();
        var nik = $tr.find('.nik').text();
        var dept = $tr.find('.dept').text();
        var cv = $tr.find('.cv').text();
//        var jab = $tr.find('.jab').text();
        
        $('#tbl_penagihan > tbody:last-child').append(
                '<tr>\n\
                    <td class="text-center">\n\
                            <input type="button" class="btn default btn-sm red-stripe " onclick="removeRow(this)" value="Hapus"> \n\
                            <input type="hidden" name="rows[]" >\n\
                    </td>\n\
                    <td ><input name="txtNama[]" type="text" class="form-control" readonly="readonly" value="' + nama + '" ><input type="hidden" class="form-control " name="txtIDMess[]" value="'+mess+'"></td>\n\
                    <td ><input name="txtNIK[]" type="text" class="form-control" readonly="readonly" value="' + nik + '" ><input type="hidden" class="form-control " name="txtTKID[]" value="'+id+'"></td>\n\
                    <td ><input name="txtDept[]" type="text" class="form-control" readonly="readonly" value="' + dept + '" ></td>\n\
                    <td ><input name="txtCV[]" type="text" class="form-control" readonly="readonly" value="' + cv + '" ></td>\n\
                    <td><input name="txtKet[]" type="text"  class="form-control" readonly/></td>\n\
                    <td><input name="txtTagihan[]" type="text"  class="form-control" onKeyUp="getValues()"/></td>\n\
                    <td><input type="text" class="form-control" name="txtTunggakan[]" onKeyUp="getValues()"></td>\n\
                    <td><input type="text" class="form-control" name="txtTotal[]" ></td>\n\
                </tr>'
                );
        $('#modal_karyawan').modal('hide');
    });
</script>

<!--<script type="text/javascript">
    $(document).ready(function () {
        
        $(".btnselect").click(function () {
            var $tr = $(this).closest("tr");
            //var id = $tr.find('.id').text();
            var nama = $tr.find('.nama').text();
            var nik = $tr.find('.nik').text();
            var dept = $tr.find('.dept').text();
            var bag = $tr.find('.bag').text();
            var jab = $tr.find('.jab').text();
            
            $('#tbl_keluarga > tbody:last-child').append(
                '<tr class="records">'
                + '<td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"><input name="rows[]" type="hidden"></td>'
                + '<td><input name="txtNo[]" type="text" placeholder="No. Kamar" class="form-control "/></td>'
                + '<td><input name="txtNama[]" type="text" readonly="readonly" class="form-control " value="'+ nama +'"/></td>'
                + '<td><input name="txtNIK[]" type="text" readonly="readonly" class="form-control " value="'+ nik +'"/></td>'
                + '<td><input name="txtDept[]" type="text" readonly="readonly" class="form-control " value="'+ dept +'"/></td>'
                + '<td><input name="txtBag[]" type="text" readonly="readonly" class="form-control " value="'+ bag +'"/></td>'
                + '<td><input name="txtJab[]" type="text" readonly="readonly" class="form-control " value="'+ jab +'"/></td>'
                + '<td><input name="txtHub[]" type="text" placeholder="ex: Suami/Istri/Anak" class="form-control "/></td>'                   
                + '</tr>'
                );
            $('#modal_keluarga').modal('hide');
        });

//        $(".remove_item").live('click', function (ev) {
//            if (ev.type === 'click') {
//                $(this).parents(".records").fadeOut();
//                $(this).parents(".records").remove();
//            }
//        });
    });
</script>-->