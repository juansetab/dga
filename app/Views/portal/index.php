<main class="container">
    <div class="p-4 p-md-5 mb-4" style="background-color: #B38E5D;">
        <div class="col-md-12 px-0">
            <h1 class=""><b>Dirección General de Administración</b></h1>
            <p><b>Dirección de Recursos Humanos</b></p>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-md-8">
            <article class="blog-post">
                <h3>Portal de trámites de la DGA</h3>
                <p style="text-align:justify">Para tener acceso a este servicio, debe tener un proceso actual en existencia, de lo contrario no podrá acceder.</p>
            </article>
            <form method="POST" action="<?= base_url("accesos/start") ?>">
                <div class="col-md-6 col-sm-12">
                    <div class="col-sm-12">
                        <label for="user"><b>Usuario:</b></label>
                        <input type="text" name="user" class="form-control form-control-sm" required>
                    </div>  
                    <div class="col-sm-12">
                        <label for="pass"><b>Contraseña:</b></label>
                        <input type="password" name="pass" class="form-control form-control-sm" required>
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <button class="btn btn-sm btn-setab">Acceder</button>
                    </div>
                </div>
            </form>
        </div>
        <?= view("template/right") ?>   
    </div>
</main>