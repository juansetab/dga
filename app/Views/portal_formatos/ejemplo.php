<div class="row">
    <div class="col-md mb-4 mb-md-0">
        <h5 class="pb-1 mb-4">Captura solicitud de empleo</h5>
        
        <form id="form_data">
            <div class="accordion mt-3"" id=" accordionData">
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <b>Información inicial</b>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Fecha:</label>
                                    <input type="date" class="form-control form-control-sm" id="inicial_fecha" name="inicial_fecha" title="FECHA DE ELABORACIÓN DE LA SOLICITUD">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Puesto contratado:</label>
                                    <select class="form-select form-select-sm" id="inicial_puesto_solicitado" name="inicial_puesto_solicitado" title="INDICAR EL PUESTO QUE SOLICITA">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="DOCENTE">DOCENTE</option>
                                        <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                        <option value="DIRECTIVO">DIRECTIVO</option>
                                        <option value="CHOFER">CHOFER</option>
                                        <option value="VELADOR">VELADOR</option>
                                        <option value="INTENDENTE">INTENDENTE</option>
                                        <option value="NIÑERA">NIÑERA</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Sueldo mensual deseado:</label>
                                    <input type="number" class="form-control form-control-sm" id="inicial_monto" name="inicial_monto" step="0.01" title="INDICAR CON NUMEROS EL SUELDO">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <b>Datos personales</b>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_nombre" name="personal_nombre">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Primer apellido:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_primer_ap" name="personal_primer_ap">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Segundo apellido:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_segundo_ap" name="personal_segundo_ap">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Estatura (metros):</label>
                                    <input type="number" class="form-control form-control-sm" id="personal_estatura" name="personal_estatura" placeholder="EJ. 1.78">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Peso (kgs):</label>
                                    <input type="number" class="form-control form-control-sm" id="personal_peso" name="personal_peso" placeholder="EJ. 56">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Calle:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_domicilio" name="personal_domicilio" placeholder="NO AÑADIR PALABRA 'CALLE'">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Número:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_numero" name="personal_numero" placeholder="NO INCLUIR '#' O 'NO.'">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Colonia:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_colonia" name="personal_colonia" placeholder="NO AÑADIR PALABRA 'COLONIA'" title="DOMICILIO (COLONIA, FRACCIONAMIENTO O BARRIO Y LOCALIDAD, EJIDO, RANCHERIA O POBLADO). DE ACUERDO AL DOMICILIO ACTUAL">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Municipio:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_municipio" name="personal_municipio">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Código postal:</label>
                                    <input type="number" class="form-control form-control-sm" id="personal_cp" name="personal_cp">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Lugar de nacimiento:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_lugar_nac" name="personal_lugar_nac" placeholder="COMO APARECE EN ACTA DE NACIMIENTO" title="COLOCAR TAL COMO LO INDICA EL ACTA DE NACIMIENTO. (LOCALIDAD, MUNICIPIO, ESTADO) NO HOSPITAL, CALLE O COLONIA">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Teléfono fijo:</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_telefono" name="personal_telefono" title="SI CUENTA CON TELEFONO FIJO COLOCAR A 10 DIGITOS. (SI NO TIENE HACER CASO OMISO A ESTA OPCION)" placeholder="MAXIMO 10 DIGITOS SIN ESPACIOS" maxlength="10" onkeyup="forceNumber(this, 10)">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Teléfono celular (10 dígitos):</label>
                                    <input type="text" class="form-control form-control-sm" id="personal_celular" name="personal_celular" placeholder="MAXIMO 10 DIGITOS SIN ESPACIOS" maxlength="10" onkeyup="forceNumber(this, 10)">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Email:</label>
                                    <input type="mail" class="form-control form-control-sm" id="personal_email" name="personal_email" placeholder="DEBE COINCIDIR CON CURRICULUM VITAE" title="COLOCAR CORREO ELECTRONICO PERSONAL. DEBE COINCIDIR CON CURRICULUM VITAE">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Estado civil:</label>
                                    <select class="form-select form-select-sm" id="personal_edo_civil" name="personal_edo_civil" onchange="soltero_casado()">
                                        <option disabled selected>SELECCIONE UNA OPCION</option>
                                        <option value="SOLTERO(A)">SOLTERO(A)</option>
                                        <option value="CASADO(A)">CASADO(A)</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <label>Vive con:</label>
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="personal_vivecon_padres" name="personal_vivecon_padres">
                                        Padres
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="personal_vivecon_familia" name="personal_vivecon_familia">
                                        Familia
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="personal_vivecon_parientes" name="personal_vivecon_parientes">
                                        Parientes
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="personal_vivecon_nadie" name="personal_vivecon_nadie">
                                        Solo
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <label>Personas que dependen de usted:</label>
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="personal_dependen_hijos" name="personal_dependen_hijos">
                                        Hijos
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="personal_dependen_conyugue" name="personal_dependen_conyugue">
                                        Cónyuge
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="personal_dependen_padres" name="personal_dependen_padres">
                                        Padres
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="personal_dependen_otros" name="personal_dependen_otros">
                                        Otros
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <b>Documentación</b>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>CURP:</label>
                                    <input type="text" class="form-control form-control-sm" id="doc_curp" name="doc_curp" maxlength="18" placeholder="18 DIGITOS">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>RFC:</label>
                                    <input type="text" class="form-control form-control-sm" id="doc_rfc" name="doc_rfc" maxlength="13" placeholder="13 DIGITOS">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Cartilla de servicio militar:</label>
                                    <input type="text" class="form-control form-control-sm" id="doc_cartilla" name="doc_cartilla" placeholder="SOLO SI ES MASCULINO" title="SI ES MASCULINO COLOCAR LA MATRICULA DE LA CARTILLA MILITAR. (EN CASO DE SER FEMENINO HACER CASO OMISO)">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>¿Tiene licencia de manejo?:</label>
                                    <select class="form-select form-select-sm" id="doc_licencia" name="doc_licencia" onchange="activefields(this, 'div_doc_tipo_licencia', 'SI')">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3" id="div_doc_tipo_licencia" style="display:none;">
                                    <label>Tipo y número de licencia:</label>
                                    <input type="text" class="form-control form-control-sm" id="doc_tipo_licencia" name="doc_tipo_licencia">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <b>Estado de salud y hábitos personales</b>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Como considera su estado de salud?:</label>
                                    <select class="form-control form-control-sm" id="salud_edo_salud" name="salud_edo_salud">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="BUENO">BUENO</option>
                                        <option value="REGULAR">REGULAR</option>
                                        <option value="MALO">MALO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Padece alguna enfermedad crónica?:</label>
                                    <select class="form-control form-control-sm" id="salud_enfermedad" name="salud_enfermedad">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>En caso que si, explique:</label>
                                    <input type="text" class="form-control form-control-sm" id="salud_edo_enfermedad" name="salud_edo_enfermedad" value="<?= isset($_GET["salud_edo_enfermedad"]) == true ? $_GET["salud_edo_enfermedad"] : "" ?>">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Practica algún deporte?:</label>
                                    <select class="form-control form-control-sm" id="salud_deporte" name="salud_deporte">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Pertenece a un club social/deportivo?:</label>
                                    <select class="form-control form-control-sm" id="salud_club" name="salud_club">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Cuál es su pasatiempo favorito?:</label>
                                    <input type="text" class="form-control form-control-sm" id="salud_pasatiempo" name="salud_pasatiempo" value="<?= isset($_GET["salud_pasatiempo"]) == true ? $_GET["salud_pasatiempo"] : "" ?>">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12   ">
                                    <label>¿Cuál es su meta en la vida?:</label>
                                    <input type="text" class="form-control form-control-sm" id="salud_meta" name="salud_meta" value="<?= isset($_GET["salud_meta"]) == true ? $_GET["salud_meta"] : "" ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <b>Datos familiares</b>
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="vive_padre" name="vive_padre" onclick="isCheckedShow('#vive_padre', '#collapseVivePadre')">
                                        Vive padre
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label>Nombre de su padre:</label>
                                    <input class="form-control form-control-sm" type="text" id="vive_padre_nombre" name="vive_padre_nombre">
                                </div>
                                <div class="collapse" id="collapseVivePadre">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Domicilio de su padre:</label>
                                                <input class="form-control form-control-sm" type="text" id="vive_padre_domicilio" name="vive_padre_domicilio">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Ocupación de su padre:</label>
                                                <input class="form-control form-control-sm" type="text" id="vive_padre_ocupacion" name="vive_padre_ocupacion">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="vive_madre" name="vive_madre" onclick="isCheckedShow('#vive_madre', '#collapseViveMadre')">
                                        Vive madre
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label>Nombre de su madre:</label>
                                    <input class="form-control form-control-sm" type="text" id="vive_madre_nombre" name="vive_madre_nombre">
                                </div>
                                <div class="collapse" id="collapseViveMadre">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Domicilio de su madre:</label>
                                                <input class="form-control form-control-sm" type="text" id="vive_madre_domicilio" name="vive_madre_domicilio">
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Ocupación de su madre:</label>
                                                <input class="form-control form-control-sm" type="text" id="vive_madre_ocupacion" name="vive_madre_ocupacion">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div>
                                        <div class="form-check form-switch form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="vive_conyuge" name="vive_conyuge" onclick="isCheckedShow('#vive_conyuge', '#collapseViveConyuge')">
                                            Vive cónyuge
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseViveConyuge">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label>Nombre de su cónyuge:</label>
                                                <input class="form-control form-control-sm" type="text" id="vive_conyuge_nombre" name="vive_conyuge_nombre">
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label>Domicilio de su cónyuge:</label>
                                                <input class="form-control form-control-sm" type="text" id="vive_conyuge_domicilio" name="vive_conyuge_domicilio">
                                            </div>
                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                <label>Ocupación de su cónyuge:</label>
                                                <input class="form-control form-control-sm" type="text" id="vive_conyuge_ocupacion" name="vive_conyuge_ocupacion">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label>Nombres y edades de los hijos:</label>
                                    <input class="form-control form-control-sm" type="text" id="vive_hijos_nombres" name="vive_hijos_nombres" placeholder="Ej. MARIA HERNANDEZ SANCHEZ, 12 AÑOS. JUAN HERNANDEZ SANCHEZ, 15 AÑOS">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <b>Escolaridad</b>
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <b class="text-center">Primaria</b>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_primaria_nombre" name="escolar_primaria_nombre">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Dirección:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_primaria_direccion" name="escolar_primaria_direccion">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>De:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_primaria_de" name="escolar_primaria_de" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>A:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_primaria_a" name="escolar_primaria_a" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <p></p>
                                <b class="text-center">Secundaria</b>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_secundaria_nombre" name="escolar_secundaria_nombre">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <label>Dirección:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_secundaria_direccion" name="escolar_secundaria_direccion">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-2">
                                    <label>De:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_secundaria_de" name="escolar_secundaria_de" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-2">
                                    <label>A:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_secundaria_a" name="escolar_secundaria_a" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <p></p>
                                <b class="text-center">Preparatoria</b>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_prepa_nombre" name="escolar_prepa_nombre">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Dirección:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_prepa_direccion" name="escolar_prepa_direccion">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>De:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_prepa_de" name="escolar_prepa_de" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>A:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_prepa_a" name="escolar_prepa_a" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <p></p>
                                <b class="text-center">Profesional</b>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_profesional_nombre" name="escolar_profesional_nombre">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Dirección:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_profesional_direccion" name="escolar_profesional_direccion">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>De:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_profesional_de" name="escolar_profesional_de" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>A:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_profesional_a" name="escolar_profesional_a" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Título recibido:</label>
                                    <select class="form-control form-control-sm" id="escolar_profesional_titulo" name="escolar_profesional_titulo">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="TITULO">TITULO</option>
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="ACTA DE EXAMEN">ACTA DE EXAMEN</option>
                                        <option value="TECNICO SUPERIOR UNIVERSITARIO">TECNICO SUPERIOR UNIVERSITARIO</option>
                                        <option value="CONSTANCIA DE TERMINACION DE ESTUDIOS">CONSTANCIA DE TERMINACION DE ESTUDIOS</option>
                                    </select>
                                </div>
                                <p></p>
                                <b class="text-center">Comercial u otras</b>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_otras_nombre" name="escolar_otras_nombre">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Dirección:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_otras_direccion" name="escolar_otras_direccion">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>De:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_otras_de" name="escolar_otras_de" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>A:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_otras_a" name="escolar_otras_a" maxlength="4" onkeyup="forceNumber(this, 4)">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Título recibido:</label>
                                    <select class="form-control form-control-sm" id="escolar_otras_titulo" name="escolar_otras_titulo">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="MAESTRIA">MAESTRIA</option>
                                        <option value="DOCTORADO">DOCTORADO</option>
                                        <option value="DIPLOMA">DIPLOMA</option>
                                    </select>
                                </div>
                                <p></p>
                                <b class="text-center">Estudios en la actualidad</b>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Escuela:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_actual_nombre" name="escolar_actual_nombre">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Horario:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_actual_horario" name="escolar_actual_horario">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Curso o carrera:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_actual_carrera" name="escolar_actual_carrera">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Grado:</label>
                                    <input type="text" class="form-control form-control-sm" id="escolar_actual_grado" name="escolar_actual_grado">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            <b>Conocimientos generales</b>
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <input type="hidden" class="form-control form-control-sm" id="conocimientos_idiomas" name="conocimientos_idiomas">
                                <div id="select_idiomas_habla" class="col-sm-12 col-md-12 col-lg-12">
                                    <label>Idiomas que habla (además de español):</label>
                                    <div class="col-sm-12">
                                        <select id="conocimientos_idiomas_select" class="form-control form-control-sm" multiple search='true'>
                                            <option value="NINGUNO">NINGUNO</option>
                                            <option value="INGLES">INGLES</option>
                                            <option value="FRANCES">FRANCES</option>
                                            <option value="ITALIANO">ITALIANO</option>
                                            <option value="CHINO">CHINO</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control form-control-sm" id="conocimientos_funciones" name="conocimientos_funciones">
                                <div id="select_conocimientos_funciones" class="col-sm-12 col-md-12 col-lg-12">
                                    <label>Funciones de oficina que domina:</label>
                                    <div class="col-sm-12">
                                        <select id="conocimientos_idiomas_select" class="form-control form-control-sm" multiple search='true'>
                                            <option value="NINGUNA">NINGUNA</option>
                                            <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                            <option value="REDACCION">REDACCION</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label>Máquinas de taller/oficina que maneja:</label>
                                    <input type="text" class="form-control form-control-sm" id="conocimientos_maquinas" name="conocimientos_maquinas" placeholder="SEPARAR POR COMAS">
                                </div>
                                <input type="hidden" class="form-control form-control-sm" id="conocimientos_software" name="conocimientos_software">
                                <div id="select_conocimientos_software" class="col-sm-12 col-md-12 col-lg-12">
                                    <label>Software que domina:</label>
                                    <div class="col-sm-12">
                                        <select id="conocimientos_software_select" class="form-control form-control-sm" multiple search='true'>
                                            <option value="NINGUNO">NINGUNO</option>
                                            <option value="WORD">WORD</option>
                                            <option value="EXCEL">EXCEL</option>
                                            <option value="POWER POINT">POWER POINT</option>
                                            <option value="AUTOCAD">AUTOCAD</option>
                                            <option value="ILUSTRATOR">ILUSTRATOR</option>
                                            <option value="CORELDRAW">CORELDRAW</option>
                                            <option value="CLASSROOM">CLASSROOM</option>
                                            <option value="PHOTOSHOP">PHOTOSHOP</option>
                                            <option value="REVIT">REVIT</option>
                                            <option value="ZOOM">ZOOM</option>
                                            <option value="GOOGLE MEET">GOOGLE MEET</option>
                                            <option value="ADOBE">ADOBE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label>Otras funciones que domina:</label>
                                    <input type="text" class="form-control form-control-sm" id="conocimientos_otros" name="conocimientos_otros" placeholder="SEPARAR POR COMAS, SI NO TIENE DEJAR EN BLANCO">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            <b>Empleo actual y anteriores</b>
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <b class="text-center">Empleo actual o último</b>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Fecha inicial laboral:</label>
                                    <input type="date" class="form-control form-control-sm" id="empleo_ultimo1_inicio" name="empleo_ultimo1_inicio">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Fecha final laboral:</label>
                                    <input type="date" class="form-control form-control-sm" id="empleo_ultimo1_final" name="empleo_ultimo1_final">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Nombre de la compañía:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo1_nombre" name="empleo_ultimo1_nombre">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Puesto desempeñado:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo1_puesto" name="empleo_ultimo1_puesto">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>Domicilio:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo1_domicilio" name="empleo_ultimo1_domicilio">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Teléfono:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo1_tel" name="empleo_ultimo1_tel" maxlength="10" onkeyup="forceNumber(this, 10)">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Motivo de separación:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo1_motivo" name="empleo_ultimo1_motivo">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Nombre de jefe directo:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo1_nombre_jefe" name="empleo_ultimo1_nombre_jefe">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Puesto de jefe directo:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo1_puesto_jefe" name="empleo_ultimo1_puesto_jefe">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>¿Podemos solicitar informes de usted? ¿Por qué?:</label>
                                    <div class="input-group  input-group-sm">
                                        <select class="form-control form-control-sm" id="empleo_ultimo1_informes_sino" name="empleo_ultimo1_informes_sino">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <input type="text" class="form-control form-control-sm" id="empleo_ultimo1_informes" name="empleo_ultimo1_informes">
                                    </div>
                                </div>
                                <p></p>
                                <b class="text-center">Empleo anterior</b>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Fecha inicial laboral:</label>
                                    <input type="date" class="form-control form-control-sm" id="empleo_ultimo2_inicio" name="empleo_ultimo2_inicio">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Fecha final laboral:</label>
                                    <input type="date" class="form-control form-control-sm" id="empleo_ultimo2_final" name="empleo_ultimo2_final">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Nombre de la compañía:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo2_nombre" name="empleo_ultimo2_nombre">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Puesto desempeñado:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo2_puesto" name="empleo_ultimo2_puesto">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>Domicilio:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo2_domicilio" name="empleo_ultimo2_domicilio">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Teléfono:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo2_tel" name="empleo_ultimo2_tel" maxlength="10" onkeyup="forceNumber(this, 10)">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Motivo de separación:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo2_motivo" name="empleo_ultimo2_motivo">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Nombre de jefe directo:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo2_nombre_jefe" name="empleo_ultimo2_nombre_jefe">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Puesto de jefe directo:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo2_puesto_jefe" name="empleo_ultimo2_puesto_jefe">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>¿Podemos solicitar informes de usted? ¿Por qué?:</label>
                                    <div class="input-group  input-group-sm">
                                        <select class="form-control form-control-sm" id="empleo_ultimo2_informes_sino" name="empleo_ultimo2_informes_sino">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <input type="text" class="form-control form-control-sm" id="empleo_ultimo2_informes" name="empleo_ultimo2_informes">
                                    </div>
                                </div>
                                <p></p>
                                <b class="text-center">Empleo anterior</b>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Fecha inicial laboral:</label>
                                    <input type="date" class="form-control form-control-sm" id="empleo_ultimo3_inicio" name="empleo_ultimo3_inicio">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Fecha final laboral:</label>
                                    <input type="date" class="form-control form-control-sm" id="empleo_ultimo3_final" name="empleo_ultimo3_final">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Nombre de la compañía:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo3_nombre" name="empleo_ultimo3_nombre">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Puesto desempeñado:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo3_puesto" name="empleo_ultimo3_puesto">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>Domicilio:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo3_domicilio" name="empleo_ultimo3_domicilio">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Teléfono:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo3_tel" name="empleo_ultimo3_tel" maxlength="10" onkeyup="forceNumber(this, 10)">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Motivo de separación:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo3_motivo" name="empleo_ultimo3_motivo">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Nombre de jefe directo:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo3_nombre_jefe" name="empleo_ultimo3_nombre_jefe">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>Puesto de jefe directo:</label>
                                    <input type="text" class="form-control form-control-sm" id="empleo_ultimo3_puesto_jefe" name="empleo_ultimo3_puesto_jefe">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>¿Podemos solicitar informes de usted? ¿Por qué?:</label>
                                    <div class="input-group  input-group-sm">
                                        <select class="form-control form-control-sm" id="empleo_ultimo3_informes_sino" name="empleo_ultimo3_informes_sino">
                                            <option value="">SELECCIONE UNA OPCION</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <input type="text" class="form-control form-control-sm" id="empleo_ultimo3_informes" name="empleo_ultimo3_informes">
                                    </div>
                                </div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingNine">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            <b>Referencias personales</b>
                        </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <b class="text-center">Referencia 1 (Diferente de las cartas de recomendación)</b>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref1_nombre" name="referencias_ref1_nombre">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>Teléfono:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref1_telefono" name="referencias_ref1_telefono" maxlength="10" onkeyup="forceNumber(this, 10)">
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <label>Domicilio:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref1_domicilio" name="referencias_ref1_domicilio">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Ocupación:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref1_ocupacion" name="referencias_ref1_ocupacion">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Años de conocerlo:</label>
                                    <input type="number" class="form-control form-control-sm" id="referencias_ref1_tiempo" name="referencias_ref1_tiempo">
                                </div>
                                <p></p>
                                <b class="text-center">Referencia 2 (Diferente de las cartas de recomendación)</b>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref2_nombre" name="referencias_ref2_nombre">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>Teléfono:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref2_telefono" name="referencias_ref2_telefono" maxlength="10" onkeyup="forceNumber(this, 10)">
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <label>Domicilio:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref2_domicilio" name="referencias_ref2_domicilio">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Ocupación:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref2_ocupacion" name="referencias_ref2_ocupacion">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Años de conocerlo:</label>
                                    <input type="number" class="form-control form-control-sm" id="referencias_ref2_tiempo" name="referencias_ref2_tiempo">
                                </div>
                                <p></p>
                                <b class="text-center">Referencia 3 (Diferente de las cartas de recomendación)</b>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref3_nombre" name="referencias_ref3_nombre">
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <label>Teléfono:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref3_telefono" name="referencias_ref3_telefono" maxlength="10" onkeyup="forceNumber(this, 10)">
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <label>Domicilio:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref3_domicilio" name="referencias_ref3_domicilio">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Ocupación:</label>
                                    <input type="text" class="form-control form-control-sm" id="referencias_ref3_ocupacion" name="referencias_ref3_ocupacion">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Años de conocerlo:</label>
                                    <input type="number" class="form-control form-control-sm" id="referencias_ref3_tiempo" name="referencias_ref3_tiempo">
                                </div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingTen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                            <b>Datos generales</b>
                        </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Como supo del empleo?:</label>
                                    <select class="form-control form-control-sm" id="general_supo_empleo" name="general_supo_empleo">
                                        <option value="" selected>SELECCIONE UNA OPCION</option>
                                        <option value="ANUNCIO">ANUNCIO</option>
                                        <option value="INTERNET">INTERNET</option>
                                        <option value="CONVOCATORIA">CONVOCATORIA</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Tiene parientes trabajando aquí?:</label>
                                    <select class="form-control form-control-sm" id="general_parientes" name="general_parientes">
                                        <option value="" selected>SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Ha estado afiliado a un sindicato?:</label>
                                    <select class="form-control form-control-sm" id="general_sindicato" name="general_sindicato">
                                        <option value="" selected>SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Tiene disponibilidad de horario?:</label>
                                    <select class="form-control form-control-sm" id="general_horario" name="general_horario">
                                        <option value="" selected>SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Tiene problemas de traslado?:</label>
                                    <select class="form-control form-control-sm" id="general_traslado" name="general_traslado">
                                        <option value="" selected>SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Tiene disposición de viajar?:</label>
                                    <select class="form-control form-control-sm" id="general_viajar" name="general_viajar">
                                        <option value="" selected>SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>¿Disposición de cambio de residencia?:</label>
                                    <select class="form-control form-control-sm" id="general_residencia" name="general_residencia">
                                        <option value="" selected>SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="headingEleven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                            <b>Datos económicos</b>
                        </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionData">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>¿Tiene usted otros ingresos? Importe mensual:</label>
                                    <div class="input-group  input-group-sm">
                                        <select class="form-control form-control-sm" id="economico_ingresos_sino" name="economico_ingresos_sino">
                                            <option value="" selected>SELECCIONE UNA OPCION</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <input type="number" class="form-control form-control-sm" id="economico_ingresos_monto" name="economico_ingresos_monto" placeholder="IMPORTE MENSUAL" value="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>¿Su cónyuge trabaja? Percepción Mensual:</label>
                                    <div class="input-group  input-group-sm">
                                        <select class="form-control form-control-sm" id="economico_conyugue_sino" name="economico_conyugue_sino">
                                            <option value="" selected>SELECCIONE UNA OPCION</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                            <option value="NO TENGO">NO TENGO</option </select>
                                            <input type="number" class="form-control form-control-sm" id="economico_conyugue_monto" name="economico_conyugue_monto" placeholder="PERCEPCION MENSUAL" value="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>¿Vive en casa propia? ¿Valor aproximado?:</label>
                                    <div class="input-group  input-group-sm">
                                        <select class="form-control form-control-sm" id="economico_casa_sino" name="economico_casa_sino">
                                            <option value="" selected>SELECCIONE UNA OPCION</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <input type="number" class="form-control form-control-sm" id="economico_casa_monto" name="economico_casa_monto" placeholder="VALOR APROXIMADO" value="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>¿Paga renta? Importe:</label>
                                    <div class="input-group  input-group-sm">
                                        <select class="form-control form-control-sm" id="economico_renta_sino" name="economico_renta_sino">
                                            <option value="" selected>SELECCIONE UNA OPCION</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <input type="number" class="form-control form-control-sm" id="economico_renta_monto" name="economico_renta_monto" placeholder="IMPORTE" value="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>¿Tiene automóvil propio?</label>
                                    <select class="form-control form-control-sm" id="economico_coche_sino" name="economico_coche_sino">
                                        <option value="" selected>SELECCIONE UNA OPCION</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>¿Tiene deudas? Importe:</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-control form-control-sm" id="economico_deudas_sino" name="economico_deudas_sino">
                                            <option value="" selected>SELECCIONE UNA OPCION</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <input type="number" class="form-control form-control-sm" id="economico_deudas_monto" name="economico_deudas_monto" placeholder="IMPORTE" value="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>¿Cuánto abona mensualmente?</label>
                                    <input type="number" class="form-control form-control-sm" id="economico_deudas_abono" name="economico_deudas_abono" placeholder="IMPORTE" value="0" step="0.01">
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label>¿A cuánto ascienden sus gastos al mes?</label>
                                    <input type="number" class="form-control form-control-sm" id="economico_gastos" name="economico_gastos" placeholder="IMPORTE" value="0" step="0.01">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<br>
<div class="text-center">
    <button type="button" class="btn btn-primary" onclick="sendData()">Generar</button>
</div>
<script>
    window.onload = function() {
    
        document.querySelectorAll("input, select").forEach(function(current) {
            current.addEventListener("blur", function() {
                if (this.type != "checkbox") {
                    this.value = this.value.normalize("NFD").replace(/([^n\u0300-\u036f]|n(?!\u0303(?![\u0300-\u036f])))[\u0300-\u036f]+/gi, "$1").normalize().toUpperCase();
                }
                window.localStorage.setItem(this.id, this.value);
            });
        });
        document.querySelectorAll("input, select").forEach(function(current) {
            if (window.localStorage.getItem(current.id) !== null) {
                if (current.type != "checkbox") {
                    current.value = window.localStorage.getItem(current.id);
                }
            }
        });
        document.querySelector("#doc_curp").addEventListener("change", function() {
            if (this.value.length > 10) {
                if (document.querySelector("#doc_rfc").value.length > 10) {
                    if (document.querySelector("#doc_curp").value.substring(0, 10) != document.querySelector("#doc_rfc").value.substring(0, 10)) {
                        Swal.fire('Aviso', 'Primeros 10 dígitos de CURP no coinciden con RFC, revise y continue', 'warning');
                    }
                }
            }
        });
        document.querySelector("#doc_rfc").addEventListener("change", function() {
            if (this.value.length > 10) {
                if (document.querySelector("#doc_curp").value.length > 10) {
                    if (document.querySelector("#doc_curp").value.substring(0, 10) != document.querySelector("#doc_rfc").value.substring(0, 10)) {
                        Swal.fire('Aviso', 'Primeros 10 dígitos de CURP no coinciden con RFC, revise y continue', 'warning');
                    }
                }
            }
        });

        Swal.fire({
            title: '<strong>INSTRUCCIONES</strong>',
            icon: 'info',
            html: `<ul class="text-start">
                        <li>Lea con cuidado las indicaciones de cada uno de los campos</li>
                        <li>Solo aparecen los campos que requiere la SETAB</li>
                        <li>Todo debe ser rellenado en mayúsculas sin acentos</li>
                        <li>Revise toda la información antes de generar el PDF</li>
                        <li>Su información está protegida por el <b>aviso de privacidad</b></li>
                    </ul>`,
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '¡Entendido!',
        })
    }

    function calculaEdad() {
        var birthday_date = new Date(document.querySelector("#personal_fecha_nac").value);
        var ageDifMs = Date.now() - birthday_date.getTime();
        var ageDate = new Date(ageDifMs);
        document.querySelector("#personal_edad").value = (Math.abs(ageDate.getUTCFullYear() - 1970)) + " AÑOS";
        return Math.abs(ageDate.getUTCFullYear() - 1970);
    }

    function sendData() {
        multiselectToText("select_idiomas_habla", "conocimientos_idiomas");
        multiselectToText("select_conocimientos_funciones", "conocimientos_funciones");
        multiselectToText("select_conocimientos_software", "conocimientos_software");
        Swal.fire({
            title: 'Aviso',
            text: "Esta información es almacenada en su computadora, nosotros no guardamos ninguna información en nuestros servidores",
            showDenyButton: true,
            confirmButtonText: 'Generar solicitud de empleo',
            denyButtonText: `Cancelar`,
            icon: "info"
        }).then((result) => {
            if (result.isConfirmed) {
                if (validateData()) {
                    var form = document.querySelector('form');
                    form.action = '<?= base_url("formularios/genera_solicitud_empleo") ?>';
                    form.method = 'POST';
                    form.target = '_blank';
                    form.submit();
                }
            } else if (result.isDenied) {
                Swal.fire('Se ha cancelado el documento', 'No se generará la solicitud', 'error');
            }
        })
    }

    function validateData() {
        /** INFORMACIÓN INICIAL */
        informacion_inicial = [
            ["inicial_fecha", "Fecha"],
            ["inicial_puesto_solicitado", "Puesto contratado"],
            ["inicial_monto", "Sueldo mensual"]
        ];
        for (const item of informacion_inicial) {
            if (!isEmptyOrnull("'" + item[1] + "' en Información inicial", document.querySelector("#" + item[0]).value))
                return false;
        }
        /** DATOS PERSONALES */
        datos_personales = [
            ["personal_nombre", "Nombre"],
            ["personal_primer_ap", "Primer apellido"],
            ["personal_segundo_ap", "Segundo apellido"],
            ["personal_estatura", "Estatura"],
            ["personal_peso", "Peso"],
            ["personal_domicilio", "Calle"],
            ["personal_colonia", "Colonia"],
            ["personal_municipio", "Municipio"],
            ["personal_cp", "Código Postal"],
            ["personal_lugar_nac", "Lugar de nacimiento "],
            ["personal_celular", "Teléfono celular"],
            ["personal_email", "Email"],
            ["personal_edo_civil", "Estado civil"]
        ];
        for (const item of datos_personales) {
            if (!isEmptyOrnull("'" + item[1] + "' en Datos personales", document.querySelector("#" + item[0]).value))
                return false;
        }
        numero_domicilio = document.querySelector("#personal_numero").value;
        if (numero_domicilio.substring(0, 3) == "NO." || numero_domicilio.substring(0, 1) == "#" || numero_domicilio == "0") {
            Swal.fire({
                icon: 'warning',
                title: 'Información incorrecta',
                html: "No se permite ingresar '<b>#</b>', '<b>NO.</b>', '<b>NO</b>' en el número de domicilio. Si su domicilio no tiene número deberá escribir '<b>S/N</b>'. Otras abreviaciones como '<b>MZ.</b>', '<b>LT.</b>', '<b>DEPTO.</b>' si están permitidas",
            });
            return false;
        }
        calle_domicilio = document.querySelector("#personal_domicilio").value;
        if (calle_domicilio.substring(0, 6) == "CALLE " || calle_domicilio.substring(0, 3) == "C. ") {
            Swal.fire({
                icon: 'warning',
                title: 'Información incorrecta',
                html: "No se permite ingresar '<b>CALLE</b>', '<b>C.</b>', en la calle del domicilio. '<b>ANDADOR</b>', '<b>AVENIDA</b>' y otras si están permitidas",
            });
            return false;
        }
        calle_colonia = document.querySelector("#personal_colonia").value;
        if (calle_colonia.substring(0, 5) == "COL. " || calle_colonia.substring(0, 8) == "COLONIA ") {
            Swal.fire({
                icon: 'warning',
                title: 'Falta Información',
                html: "No se permite ingresar '<b>COLONIA</b>', '<b>COL.</b>', en la colonia del domicilio. '<b>FRACCIONAMIENTO</b>', '<b>R/A.</b>' y otras si están permitidas",
            });
            return false;
        }
        //"Información no permitida", "No debe ingresar '#', 'NO.', 'NO' en el número. Si su domicilio no tiene número de domicilio deberá escribir 'S/N'. Otras abreviaciones como 'MZ.', 'LT.', 'DEPTO.' si están permitidas"
        vive_con = ["padres", "familia", "parientes", "nadie"];
        all_vive_con = 0;
        for (const value of vive_con) {
            if (document.querySelector("#personal_vivecon_" + value).checked == true)
                all_vive_con += 1;
        }
        if (all_vive_con == 0)
            return isError("Falta información", "Debe seleccionar por lo menos una opción de con quien vive en Datos personales");
        dependen = ["hijos", "conyugue", "padres", "otros"];
        all_dependen = 0;
        for (const value of dependen) {
            if (document.querySelector("#personal_dependen_" + value).checked == true)
                all_dependen += 1;
        }
        if (all_dependen == 0)
            return isError("Falta información", "Debe seleccionar por lo menos una opción de quienes dependen de usted en Datos personales");
        /** DOCUMENTACIÓN */
        curp = document.querySelector("#doc_curp").value;
        var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
            validado = curp.match(re);
        if (!validado) {
            return isError("Error al validar la CURP", "Ha ingresado un formato de CURP no válido, revise y reintente");
        }
        rfc = document.querySelector("#doc_rfc").value;
        var re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/,
            validado = rfc.match(re);
        if (!validado) {
            return isError("Error al validar el RFC", "Ha ingresado un formato de RFC no válido, revise y reintente");
        }
        if (document.querySelector("#doc_licencia").value == "SI" && document.querySelector("#doc_tipo_licencia").value == "") {
            return isError("Falta información", "Si tiene licencia de manejo, debe tipear el tipo y número de licencia en Documentación");
        }
        if (curp.substring(10, 11) == "H" && document.querySelector("#doc_cartilla").value == "") {
            return isError("Falta información", "Todos los trabajadores de género masculino deben agregar el número de su cartilla militar");
        }
        /** ESTADO DE SALUD Y HABITOS PERSONALES */
        estado_salud = [
            ["salud_edo_salud", "Estado de salud actual"],
            ["salud_enfermedad", "Pacede alguna enfermedad crónica"],
            ["salud_club", "Pertenece a algun club social o deportivo"],
            ["salud_deporte", "Que deporte practica"],
            ["salud_pasatiempo", "Pasatiempo favorito"],
            ["salud_meta", "Meta en la vida"]
        ];
        for (const item of estado_salud) {
            if (!isEmptyOrnull("'" + item[1] + "' en Estado de salud y hábitos personales", document.querySelector("#" + item[0]).value))
                return false;
        }
        /** DATOS FAMILIARES */
        dependen = ["padre", "madre", "conyuge"];
        all_dependen = 0;
        for (const value of dependen) {
            if (document.querySelector("#vive_" + value).checked == true) {
                domicilio = document.querySelector("#vive_" + value + "_domicilio").value;
                ocupacion = document.querySelector("#vive_" + value + "_ocupacion").value;
                if (domicilio == "" || ocupacion == "")
                    return isError("Falta información", "Falta información de " + value + " en Datos familiares");
            }
            if (value == "conyuge") {
                if (document.querySelector("#vive_conyuge").checked == true && document.querySelector("#vive_conyuge_nombre").value == "")
                    return isError("Falta información", "Falta información de conyuge en Datos familiares");
            } else {
                if (document.querySelector("#vive_" + value + "_nombre").value == "")
                    return isError("Falta información", "Falta información del nombre de " + value + " e n Datos familiares");
            }
        }
        if (document.querySelector("#personal_edo_civil").value == "SOLTERO(A)" && document.querySelector("#vive_conyuge").checked == true) {
            return isError("Información no coincide", "Si es soltero, no debe activar 'Vive cónyuge'");
        }
        if (document.querySelector("#personal_edo_civil").value == "CASADO(A)" && document.querySelector("#vive_conyuge").checked == false) {
            return isError("Información no coincide", "Si es casado, debe activar 'Vive cónyuge' y rellenar la información");
        }
        /** DATOS ESCOLARES */
        dependen = ["primaria", "secundaria"];
        for (const value of dependen) {
            nombre = document.querySelector("#escolar_" + value + "_nombre").value;
            direccion = document.querySelector("#escolar_" + value + "_direccion").value;
            de = document.querySelector("#escolar_" + value + "_de").value;
            a = document.querySelector("#escolar_" + value + "_a").value;
            if (nombre == "" || direccion == "" || de == "" || a == "")
                return isError("Falta información", "Falta información de " + value + " en Escolaridad");
            anios_minimos = value == "primaria" ? 6 : 3;
            if (a - de < anios_minimos)
                return isError("Información no válida", "Años de estudio en " + value + " no coinciden con el mínimo");
        }
        dependen = ["profesional", "otras"];
        for (const value of dependen) {
            nombre = document.querySelector("#escolar_" + value + "_nombre").value;
            direccion = document.querySelector("#escolar_" + value + "_direccion").value;
            de = document.querySelector("#escolar_" + value + "_de").value;
            a = document.querySelector("#escolar_" + value + "_a").value;
            titulo = document.querySelector("#escolar_" + value + "_titulo").value;
            is_empty = nombre == "" && direccion == "" && de == "" && a == "" && titulo == "" ? true : false;
            is_full = nombre != "" && direccion != "" && de != "" && a != "" && titulo != "" ? true : false;
            if (is_empty == false && is_full == false)
                return isError("Falta información", "Falta información de " + value + " en Escolaridad ");
            if (a - de < 0)
                return isError("Información no válida", "Años de estudio en " + value + " no concuerda con un número válido");
        }

        nombre = document.querySelector("#escolar_prepa_nombre").value;
        direccion = document.querySelector("#escolar_prepa_direccion").value;
        de = document.querySelector("#escolar_prepa_de").value;
        a = document.querySelector("#escolar_prepa_a").value;
        is_empty = nombre == "" && direccion == "" && de == "" && a == "" ? true : false;
        is_full = nombre != "" && direccion != "" && de != "" && a != "" ? true : false;
        if (is_empty == false && is_full == false)
            return isError("Falta información", "Falta información de Preparatoria en Escolaridad ");
        if (a - de < 0)
            return isError("Información no válida", "Años de estudio en Preparatoria no concuerda con un número válido");

        nombre = document.querySelector("#escolar_actual_nombre").value;
        horario = document.querySelector("#escolar_actual_horario").value;
        carrera = document.querySelector("#escolar_actual_carrera").value;
        grado = document.querySelector("#escolar_actual_grado").value;
        is_empty = nombre == "" && horario == "" && carrera == "" && grado == "" ? true : false;
        is_full = nombre != "" && horario != "" && carrera != "" && grado != "" ? true : false;
        if (is_empty == false && is_full == false)
            return isError("Falta información", "Falta información de Estudios actuales en Escolaridad");

        /** CONOCIMIENTOS GENERALES */
        conocimientos = [
            ["conocimientos_idiomas", "Idiomas que habla"],
            ["conocimientos_funciones", "Funciones de oficina que domina"],
            ["conocimientos_maquinas", "Máquinas de taller/oficina que maneja"],
            ["conocimientos_software", "Software que domina"]
        ];
        for (const item of conocimientos) {
            if (!isEmptyOrnull("'" + item[1] + "' en Conocimientos generales", document.querySelector("#" + item[0]).value))
                return false;
        }
        /** EMPLEO ACTUAL Y ANTERIORES */
        empleos = [
            [1, "Empleo actual o último"],
            [2, "Empleo anterior 1"],
            [3, "Empleo anterior 2"]
        ];
        for (const item of empleos) {
            fecha_ini = document.querySelector("#empleo_ultimo" + item[0] + "_inicio").value;
            fecha_fin = document.querySelector("#empleo_ultimo" + item[0] + "_final").value;
            compania = document.querySelector("#empleo_ultimo" + item[0] + "_nombre").value;
            puesto = document.querySelector("#empleo_ultimo" + item[0] + "_puesto").value;
            domicilio = document.querySelector("#empleo_ultimo" + item[0] + "_domicilio").value;
            telefono = document.querySelector("#empleo_ultimo" + item[0] + "_tel").value;
            separacion = document.querySelector("#empleo_ultimo" + item[0] + "_motivo").value;
            nombre_jefe = document.querySelector("#empleo_ultimo" + item[0] + "_nombre_jefe").value;
            puesto_jefe = document.querySelector("#empleo_ultimo" + item[0] + "_puesto_jefe").value;
            informes_sino = document.querySelector("#empleo_ultimo" + item[0] + "_informes_sino").value;
            informes_porque = document.querySelector("#empleo_ultimo" + item[0] + "_informes").value;
            is_empty = fecha_ini == "" && fecha_fin == "" && compania == "" && puesto == "" && domicilio == "" && telefono == "" && separacion == "" && nombre_jefe == "" && puesto_jefe == "" && informes_sino == "" ? true : false;
            is_full = fecha_ini != "" && fecha_fin != "" && compania != "" && puesto != "" && domicilio != "" && telefono != "" && separacion != "" && nombre_jefe != "" && puesto_jefe != "" && informes_sino != "" ? true : false;
            if (is_empty == false && is_full == false)
                return isError("Falta información", "'" + item[1] + "' en Empleo actual y anteriores debe tener todos los campos capturados o ninguno");
            if (informes_sino == "NO" && informes_porque == "")
                return isError("Falta información", "En '" + item[1] + "' si selecciona que no podemos solicitar informes de usted, debe añadir el porqué");

        }
        /** REFERENCIAS PERSONALES */
        for (i = 1; i < 4; i++) {
            nombre = document.querySelector("#referencias_ref" + i + "_nombre").value;
            telefono = document.querySelector("#referencias_ref" + i + "_telefono").value;
            domicilio = document.querySelector("#referencias_ref" + i + "_domicilio").value;
            ocupacion = document.querySelector("#referencias_ref" + i + "_ocupacion").value;
            tiempo = document.querySelector("#referencias_ref" + i + "_tiempo").value;
            if (nombre === "" || telefono == "" || domicilio == "" || ocupacion == "" || tiempo == "")
                return isError("Falta información", "Referencia " + i + " en Referencias personales debe tener todos los campos capturados");
        }
        /** DATOS GENERALES */
        generales = [
            ["general_supo_empleo", "¿Como supo del empleo?"],
            ["general_parientes", "¿Tiene parientes trabajando aquí?"],
            ["general_sindicato", "¿Ha estado afiliado a un sindicato?"],
            ["general_horario", "¿Tiene disponibilidad de horario?"],
            ["general_traslado", "¿Tiene problemas de traslado?"],
            ["general_viajar", "¿Tiene disposición de viajar?"],
            ["general_residencia", "¿Disposición de cambio de residencia?"]
        ];
        for (const item of generales) {
            if (!isEmptyOrnull("'" + item[1] + "' en Datos generales", document.querySelector("#" + item[0]).value))
                return false;
        }
        /** DATOS ECONÓMICOS */
        economicos = [
            ["economico_ingresos", true, "¿Tiene usted otros ingresos?", "importe"],
            ["economico_conyugue", true, "¿Su cónyuge trabaja?", "percepción"],
            ["economico_casa", true, "¿Vive en casa propia?", "valor aproximado"],
            ["economico_renta", true, "¿Paga renta?", "importe"],
            ["economico_coche", false, "¿Tiene automóvil propio?"],
            ["economico_deudas", true, "¿Tiene deudas?", "importe"]
        ];
        for (const item of economicos) {
            if (!isEmptyOrnull("'" + item[2] + "' en Datos económicos", document.querySelector("#" + item[0] + "_sino").value))
                return false;
            if (item[1] == true && document.querySelector("#" + item[0] + "_sino").value == "SI") {
                if (!isEmptyOrnull(item[3] + " de '" + item[2] + "' en Datos económicos", document.querySelector("#" + item[0] + "_monto").value))
                    return false;
            }
            if (item[1] == true && document.querySelector("#" + item[0] + "_sino").value == "NO" && document.querySelector("#" + item[0] + "_monto").value > 1) {
                isError("Información no coincide", "En el campo '" + item[2] + "' seleccionó 'NO' y en el campo '" + item[3] + "' escribió cantidad. Debe dejar en cero o seleccionar 'SI'");
                return false;
            }
        }
        if ((document.querySelector("#economico_deudas_abono").value < 1 || document.querySelector("#economico_deudas_abono").value == "") && document.querySelector("#economico_deudas_sino").value == "SI") {
            return isError("Falta información", "Si tiene deudas, ingresar su abono mensual");
        }
        if ((document.querySelector("#economico_gastos").value < 1 || document.querySelector("#economico_gastos").value == "")) {
            return isError("Falta información", "Debe ingresar a cuanto ascienden sus gastos mensuales en Datos económicos");
        }
        return true;
    }

    function isEmptyOrnull(field, value) {
        if (value == null || value == "" || value == "0000-00-00" || value == 0)
            return isError("Falta información", "El campo " + field + " no es válido, revise y reintente");
        else
            return true;
    }

    function isError(title, text) {
        Swal.fire(title, text, 'warning');
        return false;
    }

    function isCheckedShow(id, collapsible) {
        var myCollapse = document.querySelector(collapsible)
        if (document.querySelector(id).checked == true) {
            var bsCollapse = new bootstrap.Collapse(myCollapse, {
                show: true
            })
        } else {
            var bsCollapse = new bootstrap.Collapse(myCollapse, {
                hide: true
            })
        }

    }

    function activefields(element, items, condition_activate) {
        var values = items.split(',');
        if (element.value == condition_activate)
            display = "";
        else
            display = "none";
        for (value of values) {
            document.querySelector("#" + value).style.display = display;
        }
    }

    function forceNumber(element, limit) {
        const reg = new RegExp('^[0-9]+$');
        if (!reg.test(element.value.substring(element.value.length - 1))) {
            element.value = element.value.substring(0, (element.value.length - 1));
        }
        array = element.value.split("");
        string = "";
        array.forEach(function(value) {
            if (reg.test(value)) {
                string += value;
            }
        });
        element.value = string;
    }

    function multiselectToText(multiselectDiv, input) {
        array = [];
        document.querySelectorAll(`#${multiselectDiv} .optext`).forEach((multiSelect) => {
            value = multiSelect.innerHTML.replace('<span class="optdel" title="Quitar">🗙</span>', "");
            array.push(value);
        });
        document.querySelector(`#${input}`).value = array.join(', ');
    }

    function soltero_casado() {
        if (document.querySelector("#personal_edo_civil").value == "SOLTERO(A)") {
            document.querySelector("#vive_conyuge_nombre").readOnly = true;
            document.querySelector("#vive_conyuge_domicilio").readOnly = true;
            document.querySelector("#vive_conyuge_ocupacion").readOnly = true;
            document.querySelector("#vive_conyuge_nombre").value = "";
            document.querySelector("#vive_conyuge_domicilio").value = "";
            document.querySelector("#vive_conyuge_ocupacion").value = "";
            document.querySelector("#vive_conyuge").checked = false;
        } else {
            document.querySelector("#vive_conyuge_nombre").readOnly = false;
            document.querySelector("#vive_conyuge_domicilio").readOnly = false;
            document.querySelector("#vive_conyuge_ocupacion").readOnly = false;
            document.querySelector("#vive_conyuge").checked = true;
        }
        isCheckedShow('#vive_conyuge', '#collapseViveConyuge');
    }
</script>