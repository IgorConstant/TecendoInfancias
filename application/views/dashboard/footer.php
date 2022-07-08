<!-- JS -->
<script src="<?php echo base_url('assets/dashboard/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/dashboard/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/dashboard/js/button.js') ?>"></script>

<!-- Datatables Claim -->
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json'
            }
        });
    });
</script>
</body>

</html>