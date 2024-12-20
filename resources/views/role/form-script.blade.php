<script>
    $(document).ready(function() {
        let isFetched = false;
        const income_id = @json($data->income_id ?? 0);
       

        function getIncomeData(){
            if (isFetched) return; 
            $.ajax({
            url: "{{ route('customer_income_json_data') }}", 
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                const select = $('#select-income');
                select.empty(); 
                select.append('<option value="" disabled selected>Select customer income</option>');
                
                response.forEach(incomes => {
                    select.append(`<option value="${incomes.id}" ${income_id === incomes.id ? 'selected': ''}>${formatToIDR(incomes.start_amount)} - ${formatToIDR(incomes.end_amount)}</option>`);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
         });
        }

        if(income_id){
            getIncomeData()
        }
        $('#select-income').on('focus', function(){
           getIncomeData()
        })

        tinymce.init({
            license_key: 'gpl',
            selector: 'textarea.tinymce-editor',
            plugins: 'code table lists',
            toolbar: 'undo redo | styleselect | fontselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
            font_formats: "Inter=inter"
        });

        $('#id-card-img').on('change', function(e) {
            const files= e.target.files
            if(!files || files.length <1)return
            const file = files[0]
            if(!file) return
            const image = URL.createObjectURL(file);
            // $('#id-card-preview').append(`<img src="image" />`)
            const img = $('<img id="preview" class="object-cover">'); //Equivalent: $(document.createElement('img'))
            img.attr('src', image);
            img.appendTo('#id-card-preview');
        })
    });


    
</script>