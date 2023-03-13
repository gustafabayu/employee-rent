<div class="v-scroll">
    <table id="tbl_karyawan" class="table table-condensed table-hover">
        <thead>
            <tr>
                <th >#</th>                
                <th >Nama</th>
                <th>NIK</th>
                <th >Departemen</th>
                <th class="hide">Bagian</th>
                <th class="hide">Jabatan</th>
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
                echo '<td class="id hide">' . $k->RegNo . '</td>';
                echo '<td class="nama">' . $k->NAMA . '</td>';
                echo '<td class="nik">' . $k->NIK . '</td>';
                echo '<td class="dept">' . $k->DeptAbbr . '</td>';
                echo '<td class="bag hide">' . $k->BagianName . '</td>';
                echo '<td class="jab hide">' . $k->JabatanName . '</td>';
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
        var nama = $tr.find('.nama').text();
        var nik = $tr.find('.nik').text();
        var dept = $tr.find('.dept').text();
//        var bag = $tr.find('.bag').text();
//        var jab = $tr.find('.jab').text();
        
        $('#tbl_keluarga > tbody:last-child').append(
                '<tr>\n\
                    <td class="text-center">\n\
                            <input type="button" class="btn default btn-sm red-stripe " onclick="removeRow(this)" value="Hapus"> \n\
                            <input type="hidden" name="rows[]" >\n\
                    </td>\n\
                    <td ><input name="txtNo[]" type="text" placeholder="Kamar" class="form-control "></td>\n\
                    <td class="hide"><input type="text" class="form-control " name="txtRegNo[]" value="'+id+'"></td>\n\
                    <td class="hide"><input type="text" class="form-control " name="txtFixNo[]"></td>\n\
                    <td ><input name="txtNama[]" type="text" class="form-control" readonly="readonly" value="' + nama + '" ><input type="hidden" class="form-control " name="txtTKID[]" value="K'+id+'"></td>\n\
                    <td ><input name="txtNIK[]" type="text" class="form-control" readonly="readonly" value="' + nik + '" ></td>\n\
                    <td ><input name="txtDept[]" type="text" class="form-control" readonly="readonly" value="' + dept + '" ></td>\n\
                    <td ><input type="text" class="form-control" name="txtCV[]" readonly="readonly"></td>\n\
                    <td><input name="txtKet[]" type="text" class="form-control"/></td>\n\
                    <td ><select class="form-control " name="txtHub[]" ><option value="">*Pilih</option><option value="Suami">Suami</option><option value="Istri">Istri</option><option value="Anak">Anak</option><option value="Mertua">Mertua</option><option value="Orang Tua">Orang Tua</option><option value="Ipar">Ipar</option><option value="Sepupu">Sepupu</option><option value="Adik">Adik</option><option value="Kakak">Kakak</option><option value="Cucu">Cucu</option><option value="Ponakan">Ponakan</option><option value="Janda">Janda</option></select></td>\n\
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