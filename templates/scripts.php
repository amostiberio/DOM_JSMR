
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
     <!-- bootstrap-datetimepicker -->
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

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
		var id_twl = $(e.relatedTarget).data('tw');
		$(e.currentTarget).find('input[name="tw"]').val(id_twl);
		
        });
		$('#modal_editlalin').on('show.bs.modal', function(e) {
			 
		var id_gerbangl = $(e.relatedTarget).data('id-gerbang');
		$(e.currentTarget).find('input[name="idgerbang"]').val(id_gerbangl);
		var id_tahunl = $(e.relatedTarget).data('tahun');
		$(e.currentTarget).find('input[name="tahun"]').val(id_tahunl);
		var id_twl = $(e.relatedTarget).data('tw');
		$(e.currentTarget).find('input[name="tw"]').val(id_twl);
		
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
		var id_tw = $(e.relatedTarget).data('tw');
		$(e.currentTarget).find('input[name="tw"]').val(id_tw);
		
        });
		$('#modal_editjmlgardu').on('show.bs.modal', function(e) {
			 
		var id_gerbang = $(e.relatedTarget).data('id-gerbang');
		$(e.currentTarget).find('input[name="idgerbang"]').val(id_gerbang);
		var id_tahun = $(e.relatedTarget).data('tahun');
		$(e.currentTarget).find('input[name="tahun"]').val(id_tahun);
		var id_tw = $(e.relatedTarget).data('tw');
		$(e.currentTarget).find('input[name="tw"]').val(id_tw);
		
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

        //untuk modal edit waktu transaksi semester 1
                  $('#modal_editwaktutransaksis1').on('show.bs.modal', function(e) {
                //untuk id nya
                 var idgerbangterbukas1 = $(e.relatedTarget).data('id-gerbangterbuka-s1');
                 $(e.currentTarget).find('input[name="edit_idgerbangterbukas1"]').val(idgerbangterbukas1);

                 var idgerbangmasuks1 = $(e.relatedTarget).data('id-gerbangmasuk-s1');
                 $(e.currentTarget).find('input[name="edit_idgerbangmasuks1"]').val(idgerbangmasuks1);

                 var idgerbangkeluars1 = $(e.relatedTarget).data('id-gerbangkeluar-s1');
                 $(e.currentTarget).find('input[name="edit_idgerbangkeluars1"]').val(idgerbangkeluars1);

                 var idgerbangterbukagtos1 = $(e.relatedTarget).data('id-gerbangterbukagto-s1');
                 $(e.currentTarget).find('input[name="edit_idgerbang_gto_terbukas1"]').val(idgerbangterbukagtos1);

                 var idgerbangmasukgtos1 = $(e.relatedTarget).data('id-gerbangmasukgto-s1');
                 $(e.currentTarget).find('input[name="edit_iderbang_gto_masuks1"]').val(idgerbangmasukgtos1);

                 var idgerbangkeluargtos1 = $(e.relatedTarget).data('id-gerbangkeluargto-s1');
                 $(e.currentTarget).find('input[name="edit_idgerbang_gto_keluars1"]').val(idgerbangkeluargtos1);

                 var idpanjangantrians1 = $(e.relatedTarget).data('id-panjangantrian-s1');
                 $(e.currentTarget).find('input[name="edit_idpanjang_antrians1"]').val(idpanjangantrians1);

                 //untuk nilainya
                 var gerbangterbukas1 = $(e.relatedTarget).data('gerbangterbuka-s1');
                 $(e.currentTarget).find('input[name="edit_gerbangterbukas1"]').val(gerbangterbukas1);
                 var gerbangmasuks1 = $(e.relatedTarget).data('gerbangmasuk-s1');
                 $(e.currentTarget).find('input[name="edit_gerbangmasuks1"]').val(gerbangmasuks1);
                 var gerbangkeluars1 = $(e.relatedTarget).data('gerbangkeluar-s1');
                 $(e.currentTarget).find('input[name="edit_gerbangkeluars1"]').val(gerbangkeluars1);
                 var gerbangterbukagtos1 = $(e.relatedTarget).data('gerbangterbukagto-s1');
                 $(e.currentTarget).find('input[name="edit_gerbang_gto_terbukas1"]').val(gerbangterbukagtos1);
                 var gerbangmasukgtos1 = $(e.relatedTarget).data('gerbangmasukgto-s1');
                 $(e.currentTarget).find('input[name="edit_gerbang_gto_masuks1"]').val(gerbangmasukgtos1);
                 var gerbangkeluargtos1 = $(e.relatedTarget).data('gerbangkeluargto-s1');
                 $(e.currentTarget).find('input[name="edit_gerbang_gto_keluars1"]').val(gerbangkeluargtos1);
                 var panjangantrians1 = $(e.relatedTarget).data('panjangantrian-s1');
                 $(e.currentTarget).find('input[name="edit_panjang_antrians1"]').val(panjangantrians1);


                 });

                 //untuk modal edit waktu transaksi admin semester 1 tw1 dan tw2
                         $('#modal_editwaktutransaksis1tw1admin').on('show.bs.modal', function(e) {
                       //untuk id nya
                        var idgerbangterbukas1 = $(e.relatedTarget).data('id-gerbangterbuka-s1');
                        $(e.currentTarget).find('input[name="edit_idgerbangterbukas1"]').val(idgerbangterbukas1);

                        var idgerbangmasuks1 = $(e.relatedTarget).data('id-gerbangmasuk-s1');
                        $(e.currentTarget).find('input[name="edit_idgerbangmasuks1"]').val(idgerbangmasuks1);

                        var idgerbangkeluars1 = $(e.relatedTarget).data('id-gerbangkeluar-s1');
                        $(e.currentTarget).find('input[name="edit_idgerbangkeluars1"]').val(idgerbangkeluars1);

                        var idgerbangterbukagtos1 = $(e.relatedTarget).data('id-gerbangterbukagto-s1');
                        $(e.currentTarget).find('input[name="edit_idgerbang_gto_terbukas1"]').val(idgerbangterbukagtos1);

                        var idgerbangmasukgtos1 = $(e.relatedTarget).data('id-gerbangmasukgto-s1');
                        $(e.currentTarget).find('input[name="edit_iderbang_gto_masuks1"]').val(idgerbangmasukgtos1);

                        var idgerbangkeluargtos1 = $(e.relatedTarget).data('id-gerbangkeluargto-s1');
                        $(e.currentTarget).find('input[name="edit_idgerbang_gto_keluars1"]').val(idgerbangkeluargtos1);

                        var idpanjangantrians1 = $(e.relatedTarget).data('id-panjangantrian-s1');
                        $(e.currentTarget).find('input[name="edit_idpanjang_antrians1"]').val(idpanjangantrians1);

                        //untuk nilainya
                        var gerbangterbukas1 = $(e.relatedTarget).data('gerbangterbuka-s1');
                        $(e.currentTarget).find('input[name="edit_gerbangterbukas1"]').val(gerbangterbukas1);
                        var gerbangmasuks1 = $(e.relatedTarget).data('gerbangmasuk-s1');
                        $(e.currentTarget).find('input[name="edit_gerbangmasuks1"]').val(gerbangmasuks1);
                        var gerbangkeluars1 = $(e.relatedTarget).data('gerbangkeluar-s1');
                        $(e.currentTarget).find('input[name="edit_gerbangkeluars1"]').val(gerbangkeluars1);
                        var gerbangterbukagtos1 = $(e.relatedTarget).data('gerbangterbukagto-s1');
                        $(e.currentTarget).find('input[name="edit_gerbang_gto_terbukas1"]').val(gerbangterbukagtos1);
                        var gerbangmasukgtos1 = $(e.relatedTarget).data('gerbangmasukgto-s1');
                        $(e.currentTarget).find('input[name="edit_gerbang_gto_masuks1"]').val(gerbangmasukgtos1);
                        var gerbangkeluargtos1 = $(e.relatedTarget).data('gerbangkeluargto-s1');
                        $(e.currentTarget).find('input[name="edit_gerbang_gto_keluars1"]').val(gerbangkeluargtos1);
                        var panjangantrians1 = $(e.relatedTarget).data('panjangantrian-s1');
                        $(e.currentTarget).find('input[name="edit_panjang_antrians1"]').val(panjangantrians1);


                        });

                 //untuk modal delete waktu transaksi admin semester 1 tw 1 dan 2
                        $('#modal_deletewaktutransaksis1tw1admin').on('show.bs.modal', function(e) {
                      //untuk id nya
                       var idgerbang = $(e.relatedTarget).data('id-gerbang');
                       $(e.currentTarget).find('input[name="edit_idgerbang"]').val(idgerbang);

                       var idsemester1= $(e.relatedTarget).data('id-semester');
                       $(e.currentTarget).find('input[name="edit_idsemester1"]').val(idsemester1);

                       var idtws1 = $(e.relatedTarget).data('id-tw');
                       $(e.currentTarget).find('input[name="edit_idtws1"]').val(idtws1);

                       });

                 //untuk modal edit waktu transaksi admin semester 2 tw 3 dan 4
                       $('#modal_editwaktutransaksis2tw3admin').on('show.bs.modal', function(e) {
                     //untuk id nya
                      var idgerbangterbukas2 = $(e.relatedTarget).data('id-gerbangterbuka-s2');
                      $(e.currentTarget).find('input[name="edit_idgerbangterbukas2"]').val(idgerbangterbukas2);

                      var idgerbangmasuks2 = $(e.relatedTarget).data('id-gerbangmasuk-s2');
                      $(e.currentTarget).find('input[name="edit_idgerbangmasuks2"]').val(idgerbangmasuks2);

                      var idgerbangkeluars2 = $(e.relatedTarget).data('id-gerbangkeluar-s2');
                      $(e.currentTarget).find('input[name="edit_idgerbangkeluars2"]').val(idgerbangkeluars2);

                      var idgerbangterbukagtos2 = $(e.relatedTarget).data('id-gerbangterbukagto-s2');
                      $(e.currentTarget).find('input[name="edit_idgerbang_gto_terbukas2"]').val(idgerbangterbukagtos2);

                      var idgerbangmasukgtos2 = $(e.relatedTarget).data('id-gerbangmasukgto-s2');
                      $(e.currentTarget).find('input[name="edit_iderbang_gto_masuks2"]').val(idgerbangmasukgtos2);

                      var idgerbangkeluargtos2 = $(e.relatedTarget).data('id-gerbangkeluargto-s2');
                      $(e.currentTarget).find('input[name="edit_idgerbang_gto_keluars2"]').val(idgerbangkeluargtos2);

                      var idpanjangantrians2 = $(e.relatedTarget).data('id-panjangantrian-s2');
                      $(e.currentTarget).find('input[name="edit_idpanjang_antrians2"]').val(idpanjangantrians2);

                      //untuk nilainya
                      var gerbangterbukas2 = $(e.relatedTarget).data('gerbangterbuka-s2');
                      $(e.currentTarget).find('input[name="edit_gerbangterbukas2"]').val(gerbangterbukas2);
                      var gerbangmasuks2 = $(e.relatedTarget).data('gerbangmasuk-s2');
                      $(e.currentTarget).find('input[name="edit_gerbangmasuks2"]').val(gerbangmasuks2);
                      var gerbangkeluars2 = $(e.relatedTarget).data('gerbangkeluar-s2');
                      $(e.currentTarget).find('input[name="edit_gerbangkeluars2"]').val(gerbangkeluars2);
                      var gerbangterbukagtos2 = $(e.relatedTarget).data('gerbangterbukagto-s2');
                      $(e.currentTarget).find('input[name="edit_gerbang_gto_terbukas2"]').val(gerbangterbukagtos2);
                      var gerbangmasukgtos2 = $(e.relatedTarget).data('gerbangmasukgto-s2');
                      $(e.currentTarget).find('input[name="edit_gerbang_gto_masuks2"]').val(gerbangmasukgtos2);
                      var gerbangkeluargtos2 = $(e.relatedTarget).data('gerbangkeluargto-s2');
                      $(e.currentTarget).find('input[name="edit_gerbang_gto_keluars2"]').val(gerbangkeluargtos2);
                      var panjangantrians2 = $(e.relatedTarget).data('panjangantrian-s2');
                      $(e.currentTarget).find('input[name="edit_panjang_antrians2"]').val(panjangantrians2);
                      });

                 //untuk modal delete waktu transaksi admin semester 2 tw 3 dan 4
                     $('#modal_deletewaktutransaksis2tw3admin').on('show.bs.modal', function(e) {
                     //untuk id nya
                     var idgerbang = $(e.relatedTarget).data('id-gerbang2');
                     $(e.currentTarget).find('input[name="edit_idgerbang"]').val(idgerbang);

                     var idsemester2= $(e.relatedTarget).data('id-semester2');
                     $(e.currentTarget).find('input[name="edit_idsemester2"]').val(idsemester2);

                     var idtws2 = $(e.relatedTarget).data('id-tw');
                     $(e.currentTarget).find('input[name="edit_idtws2"]').val(idtws2);
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

     $('#myDatepickerFilter').datetimepicker({
        format: 'YYYY'
    });

    $('#myDatepickerFormRencanaCSI').datetimepicker({
        format: 'YYYY'
    });
    $('#myDatepickerFormRealisasiCSI').datetimepicker({
        format: 'YYYY'
    });
     $('#myDatepickerFormMonitoring').datetimepicker({
        format: 'YYYY'
    });

     $('#myDatepickerFormPencapaian').datetimepicker({
        format: 'MM-YYYY'
    });
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
