<script>
    window.onload = function() {
        let timerInterval
        Swal.fire({
            icon: "success",
            title: '¡Documentación se guardó correctamente',
            html: 'En unos segundos será redirigido',
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                location.href = '<?= base_url("portal_tramites/contrataciones") ?>';
            }
        });

        setTimeout(() => {
            location.href = '<?= base_url("portal_tramites/contrataciones") ?>';
        }, 42000);

    }
</script>