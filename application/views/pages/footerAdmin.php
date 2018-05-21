</body>
<script>
    $(document).ready(function{
        load_data();

        $('search_text')
        function load_data(query){
            $.ajax({
                url:"<?php echo base_url()?>admins/fetch",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('#home').html(data);
                }
            });
        }

    });
</script>