
<form action="" method="post" class="container row">
    <div class="col-md-12">
      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="nombre">Nombre <span class="small text-danger">(*)</span></label>
              <input type="text" name="nombre" class="form-control" id="nombre">
          </div>
          <div class="form-group col-md-12">
              <label for="correo">E-mail <span class="small text-danger">(*)</span></label>
              <input type="email" name="correo" class="form-control" id="correo">
          </div>
          <div class="form-group col-md-12">
              <label for="usuario">Usuario<span class="small text-danger">(*)</span></label>
              <input type="text" name="usuario" class="form-control" id="usuario">
          </div>
          <div class="form-group col-md-12">
              <label for="contrasena">Contraseña<span class="small text-danger">(*)</span></label>
              <input type="password" name="contrasena" class="form-control" id="contrasena">
          </div>
          <div class="form-group col-md-12">
              <label for="rol">Rol <span class="small text-danger">(*)</span></label>
              <select id="rol" name="rol" class="form-control">
                  <option value="">Seleccioná una rol</option>
                  <option value="1">Administrador</option>
                  <option value="2">Supervisor</option>
                  <option value="3">Vendedor</option>
                  <option value="4">Cliente</option>
              </select>
          </div>
      </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary ml-md-2">Crear usuario</button>
            <button type="reset" class="btn btn-outline-primary ml-md-2">Reestablecer</button>
        </div>
    </div>
  </form>
     