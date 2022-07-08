<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> <?php echo $titulo_pagina ?></h1>
    </div>

    <section id="error-area">
        <div class="row">
            <div class="col-12 col-sm-12">
                <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
                <?= $this->session->userdata('msg'); ?>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-12 col-sm-12 mb-4">
            <form action="" method="POST">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="tituloConteudo" class="form-label">Título do Conteúdo</label>
                        <input type="text" class="form-control" id="tituloConteudo" name="tituloConteudo">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="textoConteudo" class="form-label">Conteúdo</label>
                        <textarea class="form-control" id="textoConteudo" name="textoConteudo" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-success">Incluir Conteúdo</button>
                </div>
            </form>
        </div>
    </div>
</main>