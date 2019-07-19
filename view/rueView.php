<?php $title = "Rue"; ?>
<?php ob_start(); ?>
<?php require 'headerView.php'; ?>

    <div class="container spacing">
        <div class="row">
            <div class="col-sm-12">
                <p>Habitez-vous sur Nancy ?</p>
                <div class="mb-2">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input id="oui" type="radio" class="form-check-input" name="info" value="oui" checked/>Oui
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input id="non" type="radio" class="form-check-input" name="info" value="non"/>Non
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="ville" class="row">
            <div class="col-sm-12">
                <p>Veuillez rentrer votre ville.</p>
                <form action="index.php">
                    <div class="input-group mb-2">
                        <label for="ville_nom" class="input-group-text">Ville :</label>
                        <input type="hidden" name="page" value="ville"/>
                        <input id="ville_nom" type="text" class="form-control" name="nom" placeholder="ville" required/>
                    </div>
                    <input type="submit" id="ville_btn" value="Lancer !" class="btn color-red"/>
                </form>
            </div>
        </div>
        <div id="rue" class="row">
            <div class="col-sm-12">
                <p>Veuillez rentrer votre rue.</p>
                <form action="index.php">
                    <div class="input-group mb-2">
                        <label for="rue_nom" class="input-group-text">Rue :</label>
                        <input type="hidden" name="page" value="rue"/>
                        <input id="rue_numero" type="text" class="form-control" name="numero" placeholder="n°"
                               value="<?= $numero; ?>"
                               required/>
                        <input id="rue_nom" type="text" class="form-control w-50" name="nom" placeholder="rue"
                               value="<?= $nom; ?>"
                               required/>
                    </div>
                    <input type="submit" id="rue_btn" value="Lancer !" class="btn color-red">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <span class="result-box">Rue : <?= $rue; ?></span>
                <span class="result-box">Mairie : <a href="<?= $link; ?>" target="_blank"><?= $mairie; ?></a></span>
                <span class="result-box">Bureau de vote n°<?= $code; ?> : <?= $bureau; ?></span>
            </div>
        </div>
    </div>

<? $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>