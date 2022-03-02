<script>
function kredit(selectObject) {
  var tggl = selectObject.value;  
   $.ajax({
            type : "POST",
            url  : "<?php echo base_url('iptugas/get_skp_bulanan')?>",
            data : {tggl: tggl,
                    },
            cache:false,
            success: function(data){
              $("#form_kegiatan").html(data);
              $("#form_kegiatan").show();
            }

        });
        return false;
}

function keg_get(selectObject)
{
  var kegiatan = selectObject.value;
  $.ajax({
      type : "POST",
      url  : "<?php echo base_url('iptugas/get_satuan')?>",
      data : {kegiatan: kegiatan,
              },
      cache:false,
      success: function(data){
        var returnedData = JSON.parse(data);
        document.getElementById('satuan').value = returnedData.kuantitas;
        document.getElementById('outputkerja').value = returnedData.output;
      }

  });
  return false;
}

function verifikasi(id_tugas, obj)
{
  var id_tugas = id_tugas;

  
  if($(obj).is(":checked")){
    var check = 1;
  }else{
    var check = 0;
  }

  // console.log(id_tugas);
  // console.log(check);
  $.ajax({
      type : "POST",
      url  : "<?php echo base_url('iptugas/verifikasi')?>",
      data : {id_tugas: id_tugas,
              check: check
              },
      cache:false,
      success: function(data){
        //alert('berhasil');
        toad_alert();

      }

  });
  return false;
}
</script>

<script>
  function toad_alert()
{
	Command: toastr["success"]("Berhasil");
	
	$(document).ready(function() {
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "100",
	  "hideDuration": "500",
	  "timeOut": "1000",
	  "extendedTimeOut": "500",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}

	});
}
</script>