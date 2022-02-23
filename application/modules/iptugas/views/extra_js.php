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
              console.log(data);
              $("#form_kegiatan").html(data);
              $("#form_kegiatan").show();
            }

        });
        return false;
}
</script>