<!-- Footer -->
<footer class="py-5 bg-dark" style="padding-bottom: 0px; padding-top: 0px">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; YSGLearning 2018</p>
    </div>
    <!-- /.container -->
</footer>

{{ Html::script('/vendor/popper/popper.min.js') }}
{{ Html::script('/vendor/jquery/jquery.min.js') }}
{{ Html::script('/vendor/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('/DataTables/datatables.js') }}
    <!-- <script src="/vendor/popper/popper.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/DataTables/datatables.js"></script> -->

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>
