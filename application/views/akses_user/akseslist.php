 
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Akses User <small>Daftar Akses User</small></h1>
        </div>            
    </div>
</div>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">                    
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green-sharp bold uppercase">Daftar Akses User</span>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <form action="<?php echo site_url('akses_user/akses/simpan'); ?>" id="form_akses" method="post" role="form" class="form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo $pesan; ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Group User <span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <select class="form-control select2me" name="txtLevelID" id="dropdownGroupUser" data-placeholder="Pilih Group.." required="">
                                                    <option value=""></option>
                                                    <?php foreach ($getLevelUser as $set){
                                                        echo'<option value="' .$set->LevelID. '">' .$set->GroupName. '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">

                                                <div id="tbllist">
                                                    <table class="table table-striped table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="center" style="width:90px">Pilih</th>
                                                                <th>Menu</th>
                                                                <th>Kategori</th>
                                                            </tr>
                                                        </thead>                                                        
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle btn-primary" name="simpan" value="submit"><i class="fa fa-floppy-o"></i> Simpan</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                    
            </div>
        </div>           
    </div>
</div>    

<script type="text/javascript">
    
    $("#dropdownGroupUser").change(function() {
        var selectValues = $("#dropdownGroupUser").val();
        if (selectValues === 0)
        {
            var msg = "<table class='table table-striped table-hover table-bordered'>\n\
                                                <thead><tr>\n\
                                                <th>Pilih</th><th>Menu</th><th>Kategori</th>\n\
                                                </tr></thead></table>";
            $('#tbllist').html(msg);
        }
        else
        {
            var levelid = {levelid: $("#dropdownGroupUser").val()};
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('akses_user/akses_listmenu') ?>",
                data: levelid,
                success: function(msg) {
                    $('#tbllist').html(msg);
                }
            });
        }

        return false;
    });
</script>