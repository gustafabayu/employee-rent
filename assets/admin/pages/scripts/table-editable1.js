var TableEditable = function () {

    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control " name="txtSta" id="txtSta" value="' + aData[0] + '" placeholder="Bekerja / Tidak Bekerja">';
            //jqTds[0].innerHTML = '<select class="form-control " name="txtSta" id="txtSta" value="' + aData[0] + '"><option value="">*Pilih Status</option><option value="Bekerja">Bekerja</option><option value="Tidak Bekerja">Tidak Bekerja</option></select>';
            jqTds[1].innerHTML = '<input type="text" class="form-control " name="txtPekerja" id="txtPekerja" value="' + aData[1] + '" placeholder="Karyawan / Borongan">';
            jqTds[2].innerHTML = '<input type="text" id="txtNama" name="txtNama" class="form-control " value="' + aData[2] + '" placeholder="Nama Keluarga">';
            jqTds[3].innerHTML = '<input type="text" id="txtNIK" name="txtNIK" class="form-control " value="' + aData[3] + '" placeholder="NIK">';
            jqTds[4].innerHTML = '<input type="text" id="txtDept" name="txtDept" class="form-control " value="' + aData[4] + '" placeholder="*Contoh: ITD / GAF">';
            jqTds[5].innerHTML = '<input type="text" id="txtHub" name="txtHub" class="form-control " value="' + aData[5] + '" placeholder="*Contoh: Suami / Istri / Anak">';            
            jqTds[6].innerHTML = '<a class="edit btn btn-circle btn-xs purple" href="">Save</a>';
            jqTds[7].innerHTML = '<a class="cancel btn btn-circle btn-xs yellow" href="">Cancel</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value.toUpperCase(), nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value.toUpperCase(), nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value.toUpperCase(), nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value.toUpperCase(), nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value.toUpperCase(), nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value.toUpperCase(), nRow, 5, false);
            oTable.fnUpdate('<a class="edit btn btn-circle btn-xs purple" href="">Edit</a>', nRow, 6, false);
            oTable.fnUpdate('<a class="delete btn btn-circle btn-xs yellow" href="">Delete</a>', nRow, 7, false);
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate('<a class="edit btn btn-circle btn-xs purple" href="">Edit</a>', nRow, 6, false);
            oTable.fnDraw();
        }

        var table = $('#tbl_keluarga');

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#tbl_keluarga_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: true //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#tbl_keluarga_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Anda yakin menghapus baris ini?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            oTable.fnDeleteRow(nRow);
            alert("Data telah berhasil dihapus!");
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;                
                alert("Data telah berhasil disimpan!");
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();