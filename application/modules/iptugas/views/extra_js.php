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

</script>