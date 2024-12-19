<script>
    $(document).ready(function(){
        $('#file').on('change', function(e) {
                const files= e.target.files
                if(!files || files.length <1)return
                const file = files[0]
                if(!file) return
                const image = URL.createObjectURL(file);
                const img = $('<img id="preview" class="object-cover">'); //Equivalent: $(document.createElement('img'))
                img.attr('src', image);
                img.appendTo('#file-preview');
        })
})
</script>