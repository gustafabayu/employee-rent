<script type="text/javascript">
    $('#txtAlamat').change(function () {
        var txtAlamat = {txtAlamat: $("#txtAlamat").val()};
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('transaksi/noFMmess') ?>",
            data: txtAlamat,
            success: function (msg) {
                $('#no_fm').html(msg);
            }
        });
    });
</script>

<div class="form-group"> 
    <label class="control-label col-md-3">Nomor Flow Meter
    </label>
    <div class="col-md-6">
        <input type="text" class="form-control" id="txtFlow" name="txtFlow" readonly="readonly" value="<?php $this->load->model('m_mess');
            $F = $this->m_mess->selectFlow($txtFlow); foreach ($F as $set): echo $set->Nomor; endforeach;?>"/>
    </div>
</div>