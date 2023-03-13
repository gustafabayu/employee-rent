<script type="text/javascript">
    $('#txtAlamat').change(function () {
        var txtAlamat = {txtAlamat: $("#txtAlamat").val()};
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('transaksi/noKMmess') ?>",
            data: txtAlamat,
            success: function (msg) {
                $('#no_km').html(msg);
            }
        });
    });
</script>

<div class="form-group">
    <label class="control-label col-md-3">Nomor Kwh Meter 
    </label>
    <div class="col-md-6">                                            
        <input type="text" class="form-control" id="txtKwh" name="txtKwh" readonly="readonly" value="<?php $this->load->model('m_mess');
            $K = $this->m_mess->selectKwh($txtKwh); foreach ($K as $set): echo $set->Nomor; endforeach; ?>"/>                                                                                                
    </div>
</div>