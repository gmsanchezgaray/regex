<?php
/** @var string $nombre */
/** @var string $precio */
/** @var string $stock */
/** @var string $categoria */
/** @var string $marca */
/** @var string $garantia */
/** @var string $envio */
/** @var string $descripcion */
/** @var string $nombreFoto */
/** @var string $sitioWeb */
/** @var string $observaciones */

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-lg-6">
            <label for="nombre">Nombre <span class="small text-danger">(*)</span></label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre ?>" autofocus>
        </div>
        <div class="form-group col-lg-3">
            <label for="precio">Precio <span class="small text-danger">(*)</span></label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?= $precio ?>">
        </div>
        <div class="form-group col-lg-3">
            <label for="stock">Stock <span class="small text-danger">(*)</span></label>
            <input type="text" class="form-control" id="stock" name="stock" value="<?= $stock ?>">
        </div>
    </div>
    <div class="row-cols-2 d-flex">

    <div class="form-row">
        <div class="form-group col-lg-12">
            <label for="categoria">Categoría <span class="small text-danger">(*)</span></label>
            <select id="categoria" name="categoria" class="form-control">
                <option value="">Seleccioná una categoría</option>
                <option value="1" <?php if ($categoria === '1') {echo 'selected';} ?>>Celulares</option>
                <option value="2" <?php if ($categoria === '2') {echo 'selected';} ?>>Consolas</option>
                <option value="3" <?php if ($categoria === '3') {echo 'selected';} ?>>Lavarropas</option>
                <option value="4" <?php if ($categoria === '4') {echo 'selected';} ?>>Lavasecarropas</option>
                <option value="5" <?php if ($categoria === '5') {echo 'selected';} ?>>Secarropas</option>
                <option value="6" <?php if ($categoria === '6') {echo 'selected';} ?>>Televisores</option>
            </select>
        </div>
        <div class="form-group col-lg-12">
            <label for="marca">Marca <span class="small text-danger">(*)</span></label>
            <select id="marca" name="marca" class="form-control">
                <option value="">Seleccioná una marca</option>
                <option value="1" <?php if($marca === '1'){echo "selected";} ?> >Samsung</option>
                <option value="2" <?php if($marca === '2'){echo "selected";} ?> >Drean</option>
                <option value="3" <?php if($marca === '3'){echo "selected";} ?> >LG</option>
                <option value="4" <?php if($marca === '4'){echo "selected";} ?> >Philips</option>
                <option value="5" <?php if($marca === '5'){echo "selected";} ?> >Sony</option>
            </select>
        </div>
    </div>

    <div class="ml-md-2">
        <div class="form-row">
            <div class="form-group col-lg-12">
                <p class="mb-2">Foto <span class="small text-danger">(*)</span></p>
                <div class="custom-file form-group col-lg-12">
                    <input class="sr-only" onchange="readURL(this)" type="file" name="file" id="file">
                    <label class="input-image"  for="file">
                        <img id="input-image" src="./public/boton-imagen.jpg" alt="your image" />
                    </label>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="form-group">
        <label>Garantía <span class="small text-danger">(*)</span></label>
        <div class="col-lg-12">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="garantia" id="garantia6meses" value="6" <?php if($garantia === '6'){echo "checked";} ?>>
                <label class="form-check-label" for="garantia6meses">6 meses</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="garantia" id="garantia12meses" value="12" <?php if($garantia === '12'){echo "checked";} ?>>
                <label class="form-check-label" for="garantia12meses">12 meses</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="garantia" id="garantia24meses" value="24" <?php if($garantia === '24'){echo "checked";} ?>>
                <label class="form-check-label" for="garantia24meses">24 meses</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="garantia" id="garantia36meses" value="36" <?php if($garantia === '36'){echo "checked";} ?>>
                <label class="form-check-label" for="garantia36meses">36 meses</label>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-lg-6">
            <label  for="descripcion">Descripción <span class="small text-danger">(*)</span></label>
            <div>
                <textarea  class="form-control w-100" name="descripcion" id="descripcion"  rows="4"><?= $descripcion ?></textarea>
            </div>

        </div>
        <div class="form-group col-lg-6">
            <label  for="observaciones">Observaciones</label>
            <div>
                <textarea class="form-control w-100" name="observaciones" id="observaciones"  rows="4"><?= $observaciones ?></textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="envio" id="envio" value="1" <?php if($envio === '1'){echo "checked";} ?>>
            <label class="form-check-label" for="envio">
                Envío sin cargo
            </label>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-outline-primary">Reestablecer</button>

</form>
