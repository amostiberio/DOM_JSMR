
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
   
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>


    <!-- Buat Print Table -->
    <script type="text/javascript" src="../vendors/jspdf/libs/js-xlsx/xlsx.core.min.js"></script>
    <script type="text/javascript" src="../vendors/jspdf/libs/html2canvas/html2canvas.min.js"></script>
    <script type="text/javascript" src="../vendors/jspdf/tableExport.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
   
    <!-- <script src="https://code.jquery.com/jquery-1.11.3.js"></script> -->
    <script>
        $(document).ready(function(){
            $("#tw1").click(function (){
                if ($("#tw1").prop("checked")){
                    $("#hidden1").show();
                }else{
                    $("#hidden1").hide();
                }              
            });
        });
    </script>



<!-- Admin -->
    <!--Menu BPT-->
     <script>
    $('#list-cabangbpt1').on('change', function(){
        var id_cabang = this.value;
        $.ajax({
            type: "POST",
            url: "get_programbpt.php",
            data:'id_cabang='+id_cabang,
            success: function(result){
                $("#program-listsemua1").html(result);
            }
        });
    });
    </script>

     <script>
    $('#list-cabangbpt2').on('change', function(){
        var id_cabang = this.value;
        $.ajax({
            type: "POST",
            url: "get_programbpt.php",
            data:'id_cabang='+id_cabang,
            success: function(result){
                $("#program-listsemua2").html(result);
            }
        });
    });
    </script>

    <script>
    $('#program-listsemua2').on('change', function(){
        var id_pk = this.value;
        $.ajax({
            type: "POST",
            url: "get_subprogrambpt.php",
            data:'id_pk='+id_pk,
            success: function(result){
                $("#subprogram-list").html(result);
            }
        });
    });
    </script>

    <!--Menu BPLL-->
     <script>
    $('#list-cabangbpll1').on('change', function(){
        var id_cabang = this.value;
        $.ajax({
            type: "POST",
            url: "get_programbpll.php",
            data:'id_cabang='+id_cabang,
            success: function(result){
                $("#program-listsemua1").html(result);
            }
        });
    });
    </script>

     <script>
    $('#list-cabangbpll2').on('change', function(){
        var id_cabang = this.value;
        $.ajax({
            type: "POST",
            url: "get_programbpll.php",
            data:'id_cabang='+id_cabang,
            success: function(result){
                $("#program-listsemua2").html(result);
            }
        });
    });
    </script>

    <script>
    $('#program-listsemua2').on('change', function(){
        var id_pk = this.value;
        $.ajax({
            type: "POST",
            url: "get_subprogrambpll.php",
            data:'id_pk='+id_pk,
            success: function(result){
                $("#subprogram-list").html(result);
            }
        });
    });
    </script>


    <!--Menu SPOJT-->
     <script>
    $('#list-cabangspojt1').on('change', function(){
        var id_cabang = this.value;
        $.ajax({
            type: "POST",
            url: "get_programspojt.php",
            data:'id_cabang='+id_cabang,
            success: function(result){
                $("#program-listsemua1").html(result);
            }
        });
    });
    </script>

     <script>
    $('#list-cabangspojt2').on('change', function(){
        var id_cabang = this.value;
        $.ajax({
            type: "POST",
            url: "get_programspojt.php",
            data:'id_cabang='+id_cabang,
            success: function(result){
                $("#program-listsemua2").html(result);
            }
        });
    });
    </script>

    <script>
    $('#program-listsemua2').on('change', function(){
        var id_pk = this.value;
        $.ajax({
            type: "POST",
            url: "get_subprogramspojt.php",
            data:'id_pk='+id_pk,
            success: function(result){
                $("#subprogram-list").html(result);
            }
        });
    });
    </script>
    <!--Menu SPJT-->
     <script>
    $('#list-cabangspjt1').on('change', function(){
        var id_cabang = this.value;
        $.ajax({
            type: "POST",
            url: "get_programspjt.php",
            data:'id_cabang='+id_cabang,
            success: function(result){
                $("#program-listsemua1").html(result);
            }
        });
    });
    </script>

     <script>
    $('#list-cabangspjt2').on('change', function(){
        var id_cabang = this.value;
        $.ajax({
            type: "POST",
            url: "get_programspjt.php",
            data:'id_cabang='+id_cabang,
            success: function(result){
                $("#program-listsemua2").html(result);
            }
        });
    });
    </script>

    <script>
    $('#program-listsemua2').on('change', function(){
        var id_pk = this.value;
        $.ajax({
            type: "POST",
            url: "get_subprogramspjt.php",
            data:'id_pk='+id_pk,
            success: function(result){
                $("#subprogram-list").html(result);
            }
        });
    });
    </script>

    
<!-- User -->
     <script>
    $('#program-list1').on('change', function(){
        var id_pk = this.value;
        $.ajax({
            type: "POST",
            url: "get_subprogram.php",
            data:'id_pk='+id_pk,
            success: function(result){
                $("#subprogram-list").html(result);
            }
        });
    });
    </script>
	
     <script>
    $('#program-list2').on('change', function(){
        var id_pk = this.value;
        $.ajax({
            type: "POST",
            url: "get_subprogram.php",
            data:'id_pk='+id_pk,
            success: function(result){
                $("#subprogram-list2").html(result);
            }
        });
    });
    </script>
    <script>
        $('#modal_editrencana').on('show.bs.modal', function(e) {

        var idtwrc1 = $(e.relatedTarget).data('id-twrc1');
        $(e.currentTarget).find('input[name="editidtwrc1"]').val(idtwrc1);
        
        var idtwrc2 = $(e.relatedTarget).data('id-twrc2');
        $(e.currentTarget).find('input[name="editidtwrc2"]').val(idtwrc2);
        
        var idtwrc3 = $(e.relatedTarget).data('id-twrc3');
        $(e.currentTarget).find('input[name="editidtwrc3"]').val(idtwrc3);
        
        var idtwrc4 = $(e.relatedTarget).data('id-twrc4');
        $(e.currentTarget).find('input[name="editidtwrc4"]').val(idtwrc4);
        

        var twrc1 = $(e.relatedTarget).data('twrc1');
        $(e.currentTarget).find('input[name="edittwrc1"]').val(twrc1);
        var twrc2 = $(e.relatedTarget).data('twrc2');
        $(e.currentTarget).find('input[name="edittwrc2"]').val(twrc2);
        var twrc3 = $(e.relatedTarget).data('twrc3');
        $(e.currentTarget).find('input[name="edittwrc3"]').val(twrc3);
        var twrc4 = $(e.relatedTarget).data('twrc4');
        $(e.currentTarget).find('input[name="edittwrc4"]').val(twrc4);
        
        
        
        });

         $('#modal_deleterencana').on('show.bs.modal', function(e) {

        var idtwrc1 = $(e.relatedTarget).data('id-twrc1');
        $(e.currentTarget).find('input[name="editidtwrc1"]').val(idtwrc1);
        
        var idtwrc2 = $(e.relatedTarget).data('id-twrc2');
        $(e.currentTarget).find('input[name="editidtwrc2"]').val(idtwrc2);
        
        var idtwrc3 = $(e.relatedTarget).data('id-twrc3');
        $(e.currentTarget).find('input[name="editidtwrc3"]').val(idtwrc3);
        
        var idtwrc4 = $(e.relatedTarget).data('id-twrc4');
        $(e.currentTarget).find('input[name="editidtwrc4"]').val(idtwrc4);
        

        var twrc1 = $(e.relatedTarget).data('twrc1');
        $(e.currentTarget).find('input[name="edittwrc1"]').val(twrc1);
        var twrc2 = $(e.relatedTarget).data('twrc2');
        $(e.currentTarget).find('input[name="edittwrc2"]').val(twrc2);
        var twrc3 = $(e.relatedTarget).data('twrc3');
        $(e.currentTarget).find('input[name="edittwrc3"]').val(twrc3);
        var twrc4 = $(e.relatedTarget).data('twrc4');
        $(e.currentTarget).find('input[name="edittwrc4"]').val(twrc4);
        
        
        
        });

         $('#modal_editrealisasi').on('show.bs.modal', function(e) {

        
        var idtwrl1 = $(e.relatedTarget).data('id-twrl1');
        $(e.currentTarget).find('input[name="editidtwrl1"]').val(idtwrl1);
        
        var idtwrl2 = $(e.relatedTarget).data('id-twrl2');
        $(e.currentTarget).find('input[name="editidtwrl2"]').val(idtwrl2);
        
        var idtwrl3 = $(e.relatedTarget).data('id-twrl3');
        $(e.currentTarget).find('input[name="editidtwrl3"]').val(idtwrl3);
        
        var idtwrl4 = $(e.relatedTarget).data('id-twrl4');
        $(e.currentTarget).find('input[name="editidtwrl4"]').val(idtwrl4);
        
        
        
        });



         $('#modal_deleterealisasi').on('show.bs.modal', function(e) {

        var idtwrl1 = $(e.relatedTarget).data('id-twrl1');
        $(e.currentTarget).find('input[name="editidtwrl1"]').val(idtwrl1);
        
        var idtwrl2 = $(e.relatedTarget).data('id-twrl2');
        $(e.currentTarget).find('input[name="editidtwrl2"]').val(idtwrl2);
        
        var idtwrl3 = $(e.relatedTarget).data('id-twrl3');
        $(e.currentTarget).find('input[name="editidtwrl3"]').val(idtwrl3);
        
        var idtwrl4 = $(e.relatedTarget).data('id-twrl4');
        $(e.currentTarget).find('input[name="editidtwrl4"]').val(idtwrl4);
        
        
        
        
        });

         $('#modal_EditUser').on('show.bs.modal', function(e) {

        var username = $(e.relatedTarget).data('username');
        $(e.currentTarget).find('input[name="Username"]').val(username);
        
        var password = $(e.relatedTarget).data('password');
        $(e.currentTarget).find('input[name="Password"]').val(password);
        
      
        
        
        });

        $('#modal_deleteUser').on('show.bs.modal', function(e) {

        var iduser = $(e.relatedTarget).data('id-user');
        $(e.currentTarget).find('input[name="idUserCabang"]').val(iduser);
     
        
        
        });

        </script>

        <script type="text/javaScript">

    function doExport(selector, params) {
      var options = {
        //ignoreRow: [1,11,12,-2],
        //ignoreColumn: [0,-1],
        //pdfmake: {enabled: true},
        tableName: 'Laporan',
        worksheetName: 'Laporan Data Monitoring '
      };

      $.extend(true, options, params);

      $(selector).tableExport(options);
    }

    function DoOnCellHtmlData(cell, row, col, data) {
      var result = "";
      if (data != "") {
        var html = $.parseHTML( data );

        $.each( html, function() {
          if ( typeof $(this).html() === 'undefined' )
            result += $(this).text();
          else if ( $(this).is("input") )
            result += $('#'+$(this).attr('id')).val();
          else if ( $(this).is("select") )
            result += $('#'+$(this).attr('id')+" option:selected").text();
          else if ( $(this).hasClass('no_export') !== true )
            result += $(this).html();
        });
      }
      return result;
    }

    function DoOnMsoNumberFormat(cell, row, col) {
      var result = "";
      if (row > 0 && col == 0)
        result = "\\@";
      return result;
    }

  </script>
  <style>
.table th {
   vertical-align: middle ; text-align: center ;"
}
.buttonleft {
  width:60%;
  display:inline;
  overflow: auto;
  white-space: nowrap;
  margin:0px auto;
}
.buttonleftfloat {
  float:left;
  margin-right: 10px;
}
.buttonright {
  width:60%;
  display:inline;
  overflow: auto;
  white-space: nowrap;
  margin:0px auto;
}
.buttonrightfloat {
  float:right;
  margin-right: 10px;
}
</style>
    <?php ?>