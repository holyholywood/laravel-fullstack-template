<script>
    $(document).ready(function() {
        let isFetched = false;
        const role_id = @json($data->roles[0]->id ?? 0);

        function getRoleData(){
            if (isFetched) return; 
            $.ajax({
            url: "{{ route('role_json_data') }}", 
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                const select = $('#select-role');
                select.empty(); 
                select.append('<option value="" disabled selected>Select role</option>');
                
                response.forEach(role => {
                    select.append(`<option value="${role.id}" ${role_id === role.id ? 'selected': ''} class="capitalize">${role.name.toLowerCase().replaceAll("_", " ")}</option>`);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
         });
        }

        if(role_id){
            getRoleData()
        }
        $('#select-role').on('focus', function(){
           getRoleData()
        })

    });


    
</script>