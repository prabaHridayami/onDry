<nav style="text-align: end;height: 50px">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" style="font-family: sans-serif">
                                Page
                            </a>
                        </li>
                    </ul>
                    <ul class="pagination pagination-sm">

                        <li class="page-item disabled">
                            <a class="page-link" href="#" style="font-family: sans-serif">First</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="glyphicon glyphicon-backward"></i>
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="" style="font-family: sans-serif">First</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="">
                                <i class="glyphicon glyphicon-backward"></i>
                            </a>
                        </li>

                        <li class="page-item">
                            <a href="#">
                                1
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="">
                                2
                            </a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="">
                                <i class="glyphicon glyphicon-forward"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="">Last</a>
                        </li>

                        <li class="page-item disabled">
                            <a class="page-item">
                                <i class="glyphicon glyphicon-forward"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, td1;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            td1 = tr[i].getElementsByTagName("td")[2];
            td2 = tr[i].getElementsByTagName("td")[3];
            if (td || td1 || td2) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>