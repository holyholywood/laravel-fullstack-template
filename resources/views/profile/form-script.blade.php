<script>
    $(document).ready(function(){
        $('#profile_picture').on('change', function(e){
            const files= e.target.files
            if(!files || files.length <1)return
            const file = files[0]
            if(!file) return
            const image = URL.createObjectURL(file);
            $('#profile-picture-preview').attr('src', image)
        })
    })
</script>