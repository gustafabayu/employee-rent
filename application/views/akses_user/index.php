
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
                            <i class="fa fa-cogs font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Daftar Akses User</span>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <?php
                        if ($this->input->get('msg') == 'success') {
                            echo "<div class='alert alert-success alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Tambah</b> akses berhasil..</div>";
                        } elseif ($this->input->get('msg') == 'failed') {
                            echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data tidak berhasil..</div>";
                        }
                        ?>
                        <form action="<?php echo site_url('akses_user/simpan'); ?>" method="post" role="form" class="form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Level User <span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <select class="form-control select2me" name="txtLevelID" data-placeholder="Pilih Group..">
                                                    <option value=""></option>
                                                    <?php foreach ($getLevelUser as $set){
                                                        echo'<option value="'.$set->LevelID.'">'.$set->GroupName.'</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">

                                                <div id="tbllist">
                                                    <table class="table table-bordered table-hover table-hover" id="akses">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 100px" class="text-center table-checkbox">
                                                                    Pilih
                                                                </th>
                                                                <th>Menu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($getMenu as $menu): ?>
                                                                <tr class="odd gradeX">
                                                                    <td class="text-center">
                                                                        <label class="pos-rel">
                                                                            <input name="txtMenuID[]" type="checkbox" class="checkboxes" value="<?php echo $menu->MenuID; ?>" >
                                                                        </label>
                                                                    </td>
                                                                    <td> <strong><?php echo $menu->MenuLabel; ?></strong></td>
                                                                </tr>

                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary btn-block" id='btnsimpan'>
                                                    <span class="ace-icon fa fa-save bigger-130">&nbsp;</span>SIMPAN
                                                </button>
                                            </div>
                                        </div>
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
