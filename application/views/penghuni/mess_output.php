<script type="text/javascript">
    $('#txtAlamat').change(function() {
        var txtAlamat = {txtAlamat: $("#txtAlamat").val()};
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('penghuni/mess_get_detail') ?>",
            data: txtAlamat,
            success: function(msg) {
                $('#div_mess').html(msg);
            }
        });
    });
</script>


<div class="form-group">
    <label class="control-label col-md-3">Tipe Mess <span class="required">
            * </span>
    </label>
    <div class="col-md-6">                                            
        <input type="text" class="form-control" id="txtTipe" name="txtTipe" readonly="readonly" value="<?php $this->load->model('m_mess');
            $M = $this->m_mess->selectMess($txtTipe); foreach ($M as $set): echo $set->TipeMess; endforeach;?>"/>                                                                                                
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Nomor Kwh Meter <span class="required">
            * </span>
    </label>
    <div class="col-md-6">                                            
        <input type="text" class="form-control" id="txtKwh" name="txtKwh" readonly="readonly" value="<?php $this->load->model('m_mess');
            $K = $this->m_mess->selectKwh($txtKwh); foreach ($K as $set): echo $set->Nomor; endforeach; ?>"/>                                                                                                
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Nomor Flow Meter <span class="required">
            * </span>
    </label>
    <div class="col-md-6">                                            
        <input type="text" class="form-control" id="txtFlow" name="txtFlow" readonly="readonly" value="<?php $this->load->model('m_mess');
            $F = $this->m_mess->selectFlow($txtFlow); foreach ($F as $set): echo $set->Nomor; endforeach;?>"/>                                                                                                
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3">Jumlah Kamar <span class="required">
            * </span>
    </label>
    <div class="col-md-6">                                            
        <input type="text" class="form-control" id="txtJumlah" name="txtJumlah" readonly="readonly" value="<?php echo $txtJumlah; ?>"/>                                                                                                
    </div>
</div>

