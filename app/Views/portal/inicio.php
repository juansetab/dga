<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-8">
          <div class="card-body">
            <h5 class="card-title text-primary">Bienvenido al portal de trámites de la Dirección General de Administración</h5>
            <p class="mb-4 text-justify">La finalidad de incorporar este sistema es agilizar los trámites a modo que no sea necesario trasladarse a la Secretaría de Educación de Tabasco solo si se requiere</p>
          </div>
        </div>
        <div class="col-sm-4 text-center text-sm-left">
          <div class="card-body">
            <img src="<?= base_url("public/images/escudo-letras-setab.png") ?>" height="140" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<h5 class="pb-1 mb-4">Atajos rápidos</h5>
<div class="row">
  <div class="col-md-6 col-lg-4">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Documentación estatal</h5>
        <p class="card-text">Subir documentación para nuevo ingreso o reingreso de alta estatal</p>
        <a href="<?= base_url("portal/tramites_documentacion_estatal") ?>" class="btn btn-setab1">Subir documentación</a>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Rellena solicitud de empleo</h5>
        <p class="card-text">Genera una solicitud de empleo en base a los lineamientos de la SETAB</p>
        <a href="<?= base_url("portal/solicitud_empleo_estatal") ?>" class="btn btn-setab1">Ir a formulario</a>
      </div>
    </div>
  </div>

</div>
<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-12">
          <div class="card-body">
            <h5 class="card-title text-primary">Aviso de privacidad simplificado</h5>
            <p style="text-align: justify;">La Secretaría de Educación del Estado con domicilio en la calle Héroes del 47 S/N Colonia Gil y Sáenz (antes El Águila), Villahermosa, Tabasco Código Postal 86080, Teléfono
              993 427 01 61 Ext. 412, utilizará sus datos personales recabados con el propósito de identificación, elaboración de informes estadísticos, seguridad, informe sobre nuevos trámites,
              evaluar la calidad de los mismos y dar cumplimiento a obligaciones que el marco jurídico le confiere a esta Dependencia.</p>
            <p style="text-align: justify;">Para mayor información acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de privacidad integral a través de:</p>
            <p style="text-align: justify;"><a href="https://tabasco.gob.mx/avisos-de-privacidad-1">https://tabasco.gob.mx/avisos-de-privacidad-1</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  window.onload = function() {
    Swal.fire({
      icon: 'info',
      title: 'Bienvenido al portal de trámites de la DGA',
      text: '¿Desea reportar un problema? Comuníquese al siguiente correo: juanmanuel.trinidad@correo.setab.gob.mx',
      confirmButtonColor: '#B38E5D'
    });
  }
</script>