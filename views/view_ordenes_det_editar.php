<div class="grid_box main_content">
    <h2 class="main_title_form">Nueva Orden</h2>

    <div class="main_datos_generales">
        <div class="datos_generales">
            <div class='main_div main_div_generales'>
                <p>Código</p>
                <input size="15" type="text" class="ordenCodigo" name="ordenCodigo"
                    value="<?php echo $resultado[0]['ordenCodigo']; ?>" disabled>
            </div>
            <div class="main_div main_div_generales">
                <p>Fecha</p>
                <input size="15" type="text" class="ordenFecha" name="ordenFecha"
                    value="<?php echo $resultado[0]['ordenFecha']; ?>" disabled>
            </div>
        </div>

        <div class="main_div">
            <p>Ficha Cod.</p>
            <input size="60" type="text" class="fichaClinicaCodigo" name="fichaClinicaCodigo"
                value="<?php echo $resultado[0]['fichaClinicaCodigo']; ?>" disabled>
        </div>
        <div class="main_div">
            <p>Nombre</p>
            <input size="60" type="text" class="clienteNombre" name="clienteNombre"
                value="<?php echo $resultado[0]['clienteNombre']; ?>" disabled>
        </div>
        <div class="main_div">
            <p>Laboratorio</p>
            <input size="60" type="text" class="laboratorioNombre" name="laboratorioNombre"
                value="<?php echo $resultado[0]['laboratorioNombre']; ?>" disabled>
        </div>
        <div class="main_div">
            <p>Direccion</p>
            <input size="60" type="text" class="laboratorioDireccion" name="laboratorioDireccion"
                value="<?php echo $resultado[0]['laboratorioDireccion']; ?>" disabled>
        </div>
    </div>

    <form action="/actualizar_orden" class="main_form" id="main_form" method="post">
        <input type="hidden" class="ordenId" name="ordenId" value="<?php echo $resultado[0]['ordenId']; ?>">

        <h4 class="main_title_form">Detalles</h4>
        <div class="main_div">
            <p>Armazon</p>
            <input size="60" type="text" class="ordenDetArmazon" name="ordenDetArmazon"
                value="<?php echo $resultado[0]['ordenDetArmazon']; ?>" 
                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?> required>
        </div>
        <div class="main_div">
            <p>Material</p>
            <input size="60" type="text" class="ordenDetMaterial" name="ordenDetMaterial"
                value="<?php echo $resultado[0]['ordenDetMaterial']; ?>" 
                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?> required>
        </div>
        
        <h4 class="main_title_form">Medidas</h4>
        <div class="main_div">
            <table>
                <thead>
                    <tr>
                        <th width="18%">DIP</th>
                        <th width="18%">Altura</th>
                        <th width="18%">Puente</th>
                        <th width="18%">Horizontal</th>
                        <th width="18%">Vertical</th>
                        <th width="18%">Diagonal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" size="8" class="ordenDetDip"
                                name="ordenDetDip"
                                value="<?php echo $resultado[0]['ordenDetDip']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?> required></td>
                        <td><input type="text" size="8" class="ordenDetAltura"
                                name="ordenDetAltura"
                                value="<?php echo $resultado[0]['ordenDetAltura']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?> required></td>
                        <td><input type="text" size="8" class="ordenDetPuente"
                                name="ordenDetPuente"
                                value="<?php echo $resultado[0]['ordenDetPuente']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?> required></td>
                        <td><input type="text" size="8" class="ordenDetHorizontal"
                                name="ordenDetHorizontal"
                                value="<?php echo $resultado[0]['ordenDetHorizontal']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?> required></td>
                        <td><input type="text" size="8" class="ordenDetVertical"
                                name="ordenDetVertical"
                                value="<?php echo $resultado[0]['ordenDetVertical']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?> required></td>
                        <td><input type="text" size="8" class="ordenDetDiagonal"
                                name="ordenDetDiagonal"
                                value="<?php echo $resultado[0]['ordenDetDiagonal']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?> required></td>
                    </tr>
                    <!-- <tr>
                        <td>OI</td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiEsf" 
                                name="fichaClinicaDetRxfinOiEsf"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiEsf']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiCil" 
                                name="fichaClinicaDetRxfinOiCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiCil']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiEje" 
                                name="fichaClinicaDetRxfinOiEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiEje']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiAdd" 
                                name="fichaClinicaDetRxfinOiAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiAdd']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiPrisma" 
                                name="fichaClinicaDetRxfinOiPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiPrisma']; ?>" 
                                <?php if(isset($_GET['action']) && $_GET['action'] === 'ver'){ echo ' disabled'; } ?>></td>
                    </tr> -->
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
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdEsf']; ?>" disabled></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdCil"
                                name="fichaClinicaDetRxfinOdCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdCil']; ?>" disabled></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdEje"
                                name="fichaClinicaDetRxfinOdEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdEje']; ?>" disabled></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdAdd"
                                name="fichaClinicaDetRxfinOdAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdAdd']; ?>" disabled></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOdPrisma"
                                name="fichaClinicaDetRxfinOdPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOdPrisma']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>OI</td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiEsf" 
                                name="fichaClinicaDetRxfinOiEsf"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiEsf']; ?>" disabled></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiCil" 
                                name="fichaClinicaDetRxfinOiCil"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiCil']; ?>" disabled></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiEje" 
                                name="fichaClinicaDetRxfinOiEje"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiEje']; ?>" disabled></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiAdd" 
                                name="fichaClinicaDetRxfinOiAdd"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiAdd']; ?>" disabled></td>
                        <td><input type="text" size="8" class="fichaClinicaDetRxfinOiPrisma" 
                                name="fichaClinicaDetRxfinOiPrisma"
                                value="<?php echo $resultado[0]['fichaClinicaDetRxfinOiPrisma']; ?>" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
<div class="grid_box main_side">
    <div class="div_main_side">
        <button type="submit" form="main_form" class="div_main_side_btn">Guardar Cambios</button>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_ordenes"><button class="div_main_side_btn">No guardar</button></a>
    </div>
</div>
<script src="/js/fichaAutocompleteAjax.js"></script>
<script src="/js/laboratorioAutocompleteAjax.js"></script>