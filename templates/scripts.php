
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
   
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>


    <!-- Buat Print Table -->
    <script type="text/javascript" src="vendors/jspdf/libs/js-xlsx/xlsx.core.min.js"></script>
    <script type="text/javascript" src="vendors/jspdf/libs/html2canvas/html2canvas.min.js"></script>
    <script type="text/javascript" src="vendors/jspdf/tableExport.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

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
		$('#modal_deletefile').on('show.bs.modal', function(e) {
			 
		var id_realisasidelete = $(e.relatedTarget).data('id-realisasi');
		$(e.currentTarget).find('input[name="id_realisasi"]').val(id_realisasidelete);
		
        });
		$('#modal_deletelalin').on('show.bs.modal', function(e) {
			 
		var id_gerbangl = $(e.relatedTarget).data('id-gerbang');
		$(e.currentTarget).find('input[name="idgerbang"]').val(id_gerbangl);
		var id_tahunl = $(e.relatedTarget).data('tahun');
		$(e.currentTarget).find('input[name="tahun"]').val(id_tahunl);
		
        });
		$('#modal_editlalin').on('show.bs.modal', function(e) {
			 
		var id_gerbangl = $(e.relatedTarget).data('id-gerbang');
		$(e.currentTarget).find('input[name="idgerbang"]').val(id_gerbangl);
		var id_tahunl = $(e.relatedTarget).data('tahun');
		$(e.currentTarget).find('input[name="tahun"]').val(id_tahunl);
		
		var lldata1 = $(e.relatedTarget).data('data1');
        $(e.currentTarget).find('input[name="gardu_terbuka_lalin"]').val(lldata1);
        var lldata2 = $(e.relatedTarget).data('data2');
        $(e.currentTarget).find('input[name="gardu_masuk_lalin"]').val(lldata2);
        var lldata3 = $(e.relatedTarget).data('data3');
        $(e.currentTarget).find('input[name="gardu_keluar_lalin"]').val(lldata3);
        var lldata4 = $(e.relatedTarget).data('data4');
        $(e.currentTarget).find('input[name="gardu_terbuka_gto_lalin"]').val(lldata4);
		var lldata5 = $(e.relatedTarget).data('data5');
        $(e.currentTarget).find('input[name="gardu_masuk_gto_lalin"]').val(lldata5);
        var lldata6 = $(e.relatedTarget).data('data6');
        $(e.currentTarget).find('input[name="gardu_keluar_gto_lalin"]').val(lldata6);
        var lldata7 = $(e.relatedTarget).data('data7');
        $(e.currentTarget).find('input[name="epass_lalin"]').val(lldata7);
		
        });
		$('#modal_deletejmlgardu').on('show.bs.modal', function(e) {
			 
		var id_gerbang = $(e.relatedTarget).data('id-gerbang');
		$(e.currentTarget).find('input[name="idgerbang"]').val(id_gerbang);
		var id_tahun = $(e.relatedTarget).data('tahun');
		$(e.currentTarget).find('input[name="tahun"]').val(id_tahun);
		
        });
		$('#modal_editjmlgardu').on('show.bs.modal', function(e) {
			 
		var id_gerbang = $(e.relatedTarget).data('id-gerbang');
		$(e.currentTarget).find('input[name="idgerbang"]').val(id_gerbang);
		var id_tahun = $(e.relatedTarget).data('tahun');
		$(e.currentTarget).find('input[name="tahun"]').val(id_tahun);
		
		var data1 = $(e.relatedTarget).data('data1');
        $(e.currentTarget).find('input[name="gardu_terbuka_tersedia"]').val(data1);
        var data2 = $(e.relatedTarget).data('data2');
        $(e.currentTarget).find('input[name="gardu_masuk_tersedia"]').val(data2);
        var data3 = $(e.relatedTarget).data('data3');
        $(e.currentTarget).find('input[name="gardu_keluar_tersedia"]').val(data3);
        var data4 = $(e.relatedTarget).data('data4');
        $(e.currentTarget).find('input[name="gardu_terbuka_gto_tersedia"]').val(data4);
		var data5 = $(e.relatedTarget).data('data5');
        $(e.currentTarget).find('input[name="gardu_masuk_gto_tersedia"]').val(data5);
        var data6 = $(e.relatedTarget).data('data6');
        $(e.currentTarget).find('input[name="gardu_keluar_gto_tersedia"]').val(data6);
        var data7 = $(e.relatedTarget).data('data7');
        $(e.currentTarget).find('input[name="epass_tersedia"]').val(data7);
		
        });
		$('#modal_deletejmlsdm').on('show.bs.modal', function(e) {
			 
		var id_gerbangs = $(e.relatedTarget).data('id-gerbang');
		$(e.currentTarget).find('input[name="idgerbang"]').val(id_gerbangs);
		var id_tahuns = $(e.relatedTarget).data('tahun');
		$(e.currentTarget).find('input[name="tahun"]').val(id_tahuns);
		
        });
		$('#modal_editjmlsdm').on('show.bs.modal', function(e) {
			 
		var id_gerbangs = $(e.relatedTarget).data('id-gerbang');
		$(e.currentTarget).find('input[name="idgerbang"]').val(id_gerbangs);
		var id_tahuns = $(e.relatedTarget).data('tahun');
		$(e.currentTarget).find('input[name="tahun"]').val(id_tahuns);
		
		var sdata1 = $(e.relatedTarget).data('data1');
        $(e.currentTarget).find('input[name="kpl_gerbangtol"]').val(sdata1);
        var sdata2 = $(e.relatedTarget).data('data2');
        $(e.currentTarget).find('input[name="kspt"]').val(sdata2);
        var sdata3 = $(e.relatedTarget).data('data3');
        $(e.currentTarget).find('input[name="kry_jasamarga"]').val(sdata3);
        var sdata4 = $(e.relatedTarget).data('data4');
        $(e.currentTarget).find('input[name="kry_jlj"]').val(sdata4);
		var sdata5 = $(e.relatedTarget).data('data5');
        $(e.currentTarget).find('input[name="kry_jlo"]').val(sdata5);
        var sdata6 = $(e.relatedTarget).data('data6');
        $(e.currentTarget).find('input[name="sakit_permanen"]').val(sdata6);
        var sdata7 = $(e.relatedTarget).data('data7');
        $(e.currentTarget).find('input[name="tugt"]').val(sdata7);
		
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