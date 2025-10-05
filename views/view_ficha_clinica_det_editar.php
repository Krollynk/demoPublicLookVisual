<div class="grid_box main_content">
    <h2 class="main_title_form">Ficha Clinica Detalle</h2>
    <div class="main_datos_generales">
        <div class="datos_generales">
            <div class='main_div main_div_generales'>
                <p>Código</p>
                <input size="15" type="text" class="fichaClinicaCodigo" name="fichaClinicaCodigo"
                    value="<?php echo $resultado[0]['fichaClinicaCodigo']; ?>" disabled>
            </div>
            <div class="main_div main_div_generales">
                <p>Fecha</p>
                <input size="15" type="text" class="fichaClinicaFecha" name="fichaClinicaFecha"
                    value="<?php echo $resultado[0]['fichaClinicaFecha']; ?>" disabled>
            </div>
        </div>

        <div class="main_div">
            <p>Nombre</p>
            <input size="60" type="text" class="clienteNombre" name="clienteNombre"
                value="<?php echo $resultado[0]['clienteNombre']; ?>" disabled>
        </div>
    </div>
    <h3 class="main_title_form">Sintomas</h3>
    <form action="/actualizar_ficha" class="main_form" id="main_form" method="post">
        <input type="hidden" class="fichaClinicaId" name="fichaClinicaId"
            value="<?php echo $resultado[0]['fichaClinicaId']; ?>">

        <input type="hidden" class="fichaClinicaDetCefalea" name="fichaClinicaDetCefalea" value="0">
        <input type="hidden" class="fichaClinicaDetDolorOjos" name="fichaClinicaDetDolorOjos" value="0">
        <input type="hidden" class="fichaClinicaDetArdorOjos" name="fichaClinicaDetArdorOjos" value="0">
        <input type="hidden" class="fichaClinicaDetLagrimeo" name="fichaClinicaDetLagrimeo" value="0">
        <input type="hidden" class="fichaClinicaDetPresionAlta" name="fichaClinicaDetPresionAlta" value="0">
        <input type="hidden" class="fichaClinicaDetPresionBaja" name="fichaClinicaDetPresionBaja" value="0">
        <input type="hidden" class="fichaClinicaDetFlasheos" name="fichaClinicaDetFlasheos" value="0">
        <input type="hidden" class="fichaClinicaDetMiodesopsias" name="fichaClinicaDetMiodesopsias" value="0">
        <input type="hidden" class="fichaClinicaDetEmbarazo" name="fichaClinicaDetEmbarazo" value="0">
        <input type="hidden" class="fichaClinicaDetVisionBorrosa" name="fichaClinicaDetVisionBorrosa" value="0">
        <input type="hidden" class="fichaClinicaDetVisionNublada" name="fichaClinicaDetVisionNublada" value="0">
        <input type="hidden" class="fichaClinicaDetCuerpoExtranio" name="fichaClinicaDetCuerpoExtranio" value="0">
        <input type="hidden" class="fichaClinicaDetMigrania" name="fichaClinicaDetMigrania" value="0">
        <input type="hidden" class="fichaClinicaDetFotofobia" name="fichaClinicaDetFotofobia" value="0">
        <input type="hidden" class="fichaClinicaDetDiabetes" name="fichaClinicaDetDiabetes" value="0">

        <div class="main_div">
            <p class="label_checkbox">Cefalea </p>
            <input type="checkbox" class="fichaClinicaDetCefalea" name="fichaClinicaDetCefalea"
                value="1" <?php if($resultado[0]['fichaClinicaDetCefalea'] == '1'){ echo 'checked'; } 
                if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Dolor de Ojos </p>
            <input type="checkbox" class="fichaClinicaDetDolorOjos" name="fichaClinicaDetDolorOjos"
                value="1" <?php if($resultado[0]['fichaClinicaDetDolorOjos'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Ardor de Ojos </p>
            <input type="checkbox" class="fichaClinicaDetArdorOjos" name="fichaClinicaDetArdorOjos"
                value="1" <?php if($resultado[0]['fichaClinicaDetArdorOjos'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <div class="main_div">
            <p class="label_checkbox">Lagrimeo </p>
            <input type="checkbox" class="fichaClinicaDetLagrimeo" name="fichaClinicaDetLagrimeo"
                value="1" <?php if($resultado[0]['fichaClinicaDetLagrimeo'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Presion Alta </p>
            <input type="checkbox" class="fichaClinicaDetPresionAlta" name="fichaClinicaDetPresionAlta"
                value="1" <?php if($resultado[0]['fichaClinicaDetPresionAlta'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Presion Baja </p>
            <input type="checkbox" class="fichaClinicaDetPresionBaja" name="fichaClinicaDetPresionBaja"
                value="1" <?php if($resultado[0]['fichaClinicaDetPresionBaja'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <div class="main_div">
            <p class="label_checkbox">Flasheos </p>
            <input type="checkbox" class="fichaClinicaDetFlasheos" name="fichaClinicaDetFlasheos"
                value="1" <?php if($resultado[0]['fichaClinicaDetFlasheos'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Miodesopsias </p>
            <input type="checkbox" class="fichaClinicaDetMiodesopsias" name="fichaClinicaDetMiodesopsias"
                value="1" <?php if($resultado[0]['fichaClinicaDetMiodesopsias'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Embarazo </p>
            <input type="checkbox" class="fichaClinicaDetEmbarazo" name="fichaClinicaDetEmbarazo"
                value="1" <?php if($resultado[0]['fichaClinicaDetEmbarazo'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <div class="main_div">
            <p class="label_checkbox">Vision Borrosa </p>
            <input type="checkbox" class="fichaClinicaDetVisionBorrosa" name="fichaClinicaDetVisionBorrosa"
                value="1" <?php if($resultado[0]['fichaClinicaDetVisionBorrosa'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Vision Nublada </p>
            <input type="checkbox" class="fichaClinicaDetVisionNublada" name="fichaClinicaDetVisionNublada"
                value="1" <?php if($resultado[0]['fichaClinicaDetVisionNublada'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Cuerpo Extraño </p>
            <input type="checkbox" class="fichaClinicaDetCuerpoExtranio" name="fichaClinicaDetCuerpoExtranio"
                value="1" <?php if($resultado[0]['fichaClinicaDetCuerpoExtranio'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <div class="main_div">
            <p class="label_checkbox">Migraña </p>
            <input type="checkbox" class="fichaClinicaDetMigrania" name="fichaClinicaDetMigrania"
                value="1" <?php if($resultado[0]['fichaClinicaDetMigrania'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Fotofobia </p>
            <input type="checkbox" class="fichaClinicaDetFotofobia" name="fichaClinicaDetFotofobia"
                value="1" <?php if($resultado[0]['fichaClinicaDetFotofobia'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
            <p class="label_checkbox">Diabetes </p>
            <input type="checkbox" class="fichaClinicaDetDiabetes" name="fichaClinicaDetDiabetes"
                value="1" <?php if($resultado[0]['fichaClinicaDetDiabetes'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <div class="main_div">
            <p>Otros Síntomas </p>
            <textarea rows="4" cols="48" maxlength="200" class="fichaClinicaDetOtrosSintomas"
                name="fichaClinicaDetOtrosSintomas" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>><?php echo $resultado[0]['fichaClinicaDetOtrosSintomas']; ?></textarea>
        </div>
        <input type="hidden" class="fichaClinicaDetUsaLentes" name="fichaClinicaDetUsaLentes" value="0">
        <div class="main_div">
            <p>Usa Lentes</p>
            <input type="checkbox" class="fichaClinicaDetUsaLentes" name="fichaClinicaDetUsaLentes"
                value="1" <?php if($resultado[0]['fichaClinicaDetUsaLentes'] == '1'){ echo 'checked'; } if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <h4 class="main_title_form">Agudeza Visual</h4>
        <div class="main_div">

            <table>
                <thead>
                    <tr>
                        <th width="10%">-</th>
                        <th width="18%">AVSC</th>
                        <th width="18%">AVCC</th>
                        <th width="18%">PH</th>
                        <th width="18%">RTC</th>
                        <th width="18%">FO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>OD</td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOdAvsc"
                                name="fichaClinicaDetAgvOdAvsc"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOdAvsc']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOdAvcc"
                                name="fichaClinicaDetAgvOdAvcc"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOdAvcc']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOdPh"
                                name="fichaClinicaDetAgvOdPh"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOdPh']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOdRtc"
                                name="fichaClinicaDetAgvOdRtc"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOdRtc']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOdFo"
                                name="fichaClinicaDetAgvOdFo"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOdFo']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                    </tr>
                    <tr>
                        <td>OI</td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOiAvsc" 
                                name="fichaClinicaDetAgvOiAvsc"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOiAvsc']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOiAvcc" 
                                name="fichaClinicaDetAgvOiAvcc"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOiAvcc']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOiPh" 
                                name="fichaClinicaDetAgvOiPh"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOiPh']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOiRtc" 
                                name="fichaClinicaDetAgvOiRtc"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOiRtc']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetAgvOiFo" 
                                name="fichaClinicaDetAgvOiFo"
                                value="<?php echo $resultado[0]['fichaClinicaDetAgvOiFo']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                    </tr>
                </tbody>

            </table>
        </div>
        <h4 class="main_title_form">RX Ambulatoria</h4>
        <div class="main_div">
            <table>
                <thead>
                    <tr>
                        <th width="10%"></th>
                        <th width="18%">Esfera</th>
                        <th width="18%">Cilindro</th>
                        <th width="18%">Eje</th>
                        <th width="18%">Add</th>
                        <th width="18%">Prisma</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>OD</td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOdEsf"
                                name="fichaClinicaDetRxamOdEsf"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOdEsf']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOdCil"
                                name="fichaClinicaDetRxamOdCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOdCil']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOdEje"
                                name="fichaClinicaDetRxamOdEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOdEje']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOdAdd"
                                name="fichaClinicaDetRxamOdAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOdAdd']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOdPrisma"
                                name="fichaClinicaDetRxamOdPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOdPrisma']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                    </tr>
                    <tr>
                        <td>OI</td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOiEsf" 
                                name="fichaClinicaDetRxamOiEsf"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOiEsf']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOiCil" 
                                name="fichaClinicaDetRxamOiCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOiCil']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOiEje" 
                                name="fichaClinicaDetRxamOiEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOiEje']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOiAdd" 
                                name="fichaClinicaDetRxamOiAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOiAdd']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxamOiPrisma" 
                                name="fichaClinicaDetRxamOiPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxamOiPrisma']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h4 class="main_title_form">RX Final</h4>
        <div class="main_div">
            <table>
                <thead>
                    <tr>
                        <th width="10%"></th>
                        <th width="18%">Esfera</th>
                        <th width="18%">Cilindro</th>
                        <th width="18%">Eje</th>
                        <th width="18%">Add</th>
                        <th width="18%">Prisma</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>OD</td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdEsf"
                                name="fichaClinicaDetRxfinOdEsf"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdEsf']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdCil"
                                name="fichaClinicaDetRxfinOdCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdCil']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdEje"
                                name="fichaClinicaDetRxfinOdEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdEje']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdAdd"
                                name="fichaClinicaDetRxfinOdAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdAdd']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdPrisma"
                                name="fichaClinicaDetRxfinOdPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdPrisma']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                    </tr>
                    <tr>
                        <td>OI</td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiEsf" 
                                name="fichaClinicaDetRxfinOiEsf"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiEsf']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiCil" 
                                name="fichaClinicaDetRxfinOiCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiCil']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiEje" 
                                name="fichaClinicaDetRxfinOiEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiEje']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiAdd" 
                                name="fichaClinicaDetRxfinOiAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiAdd']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiPrisma" 
                                name="fichaClinicaDetRxfinOiPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiPrisma']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="main_div">
            <p>Material</p>
            <input size="60" type="text" class="fichaClinicaDetMaterial" name="fichaClinicaDetMaterial"
                value="<?php echo $resultado[0]['fichaClinicaDetMaterial']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <div class="main_div">
            <p>DIP</p>
            <input size="30" type="text" class="fichaClinicaDetDip" name="fichaClinicaDetDip"
                value="<?php echo $resultado[0]['fichaClinicaDetDip']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <div class="main_div">
            <p>Tipo de Lente</p>
            <input size="60" type="text" class="fichaClinicaDetTipoLente" name="fichaClinicaDetTipoLente"
                value="<?php echo $resultado[0]['fichaClinicaDetTipoLente']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>>
        </div>
        <h4 class="main_title_form">RX Anterior</h4>
        <div class="main_div">
            <table>
                <thead>
                    <tr>
                        <th width="10%"></th>
                        <th width="18%">Esfera</th>
                        <th width="18%">Cilindro</th>
                        <th width="18%">Eje</th>
                        <th width="18%">Add</th>
                        <th width="18%">Prisma</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>OD</td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOdEsf"
                                name="fichaClinicaDetRxantOdEsf"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOdEsf']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOdCil"
                                name="fichaClinicaDetRxantOdCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOdCil']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOdEje"
                                name="fichaClinicaDetRxantOdEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOdEje']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOdAdd"
                                name="fichaClinicaDetRxantOdAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOdAdd']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOdPrisma"
                                name="fichaClinicaDetRxantOdPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOdPrisma']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                    </tr>
                    <tr>
                        <td>OI</td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOiEsf" 
                                name="fichaClinicaDetRxantOiEsf"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOiEsf']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOiCil" 
                                name="fichaClinicaDetRxantOiCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOiCil']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOiEje" 
                                name="fichaClinicaDetRxantOiEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOiEje']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOiAdd" 
                                name="fichaClinicaDetRxantOiAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOiAdd']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxantOiPrisma" 
                                name="fichaClinicaDetRxantOiPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxantOiPrisma']; ?>" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo 'disabled'; } ?>></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="main_div">
            <p>Recomendacion </p>
            <textarea rows="10" cols="48" maxlength="400" class="fichaClinicaDetRecomendacion"
                name="fichaClinicaDetRecomendacion" <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>><?php echo $resultado[0]['fichaClinicaDetRecomendacion']; ?></textarea>
        </div>
    </form>
</div>
<div class="grid_box main_side">
    <div class="div_main_side">
        <button type="submit" form="main_form" class="div_main_side_btn">Guardar Cambios</button>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_ficha_clinica"><button class="div_main_side_btn">No guardar</button></a>
    </div>
</div>