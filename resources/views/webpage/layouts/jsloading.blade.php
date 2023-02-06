<script>

    function searching(val){
        let url = "{{env("WEBPAGE_URL")}}" +  "/search/" + val;
        window.location.href = url;
    }

    $("#search").on("keydown",function search(e) {
        if(e.keyCode == 13) {
            searching($(this).val());
        }
    });
</script>
