        <script src="<?=base_url()?>assets/js/vendor/jquery.js"></script>
        <script src="<?=base_url()?>assets/js/vendor/bootstrap.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.easypiechart.min.js"></script>
        <script src="<?=base_url()?>assets/js/portfolio.jquery.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.mixitup.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.easing.1.3.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.slicknav.min.js"></script>
        <!--This is link only for gmaps-->
       
        <script src="<?=base_url()?>assets/js/plugins.js"></script>
        <script src="<?=base_url()?>assets/js/main.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
            var arrow =$('.arrow-up');
            var form =$('.login-form');
            var status = "false";

            $('#login').click(function(event){
                event.preventDefault();
                if(status==false){
                    arrow.fadeIn();
                    form.fadeIn();
                    status = true;
                }else{
                   arrow.fadeOut();
                    form.fadeOut();
                    status = false;
            }
        })
    })
        </script>

</body>
</html>