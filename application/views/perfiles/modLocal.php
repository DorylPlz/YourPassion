<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script language="javascript" type="text/javascript">  


$(document).ready(function(){

//Creación de grupo
<?php foreach ($regiones->result_array() as $region){?>

    var <?php echo $region['n_romano']; ?> = [
        <?php foreach ($comunas->result_array() as $comuna){
            if($region['n_region'] == $comuna['fk_id_region']){?>

                 {display: "<?php echo $comuna['comu_nombre']; ?>", value: "<?php echo $comuna['id_comuna']; ?>" },

        <?php }} ?>
        {display: "Otra", value: "0" }
    ];

<?php } ?>

//If parent option is changed
$("#parent_selection").change(function() {
        var parent = $(this).val(); //get option value from parent 
        
        switch(parent){ //using switch compare selected option and populate child
            <?php foreach ($regiones->result_array() as $region){?>
              case '<?php echo $region['n_region']; ?>':
                list(<?php echo $region['n_romano']; ?>);
                break;
            <?php } ?> 
            default: //default child option is blank
                $("#child_selection").html('');  
                break;
           }
});

//function to populate child select box
function list(array_list)
{
    $("#child_selection").html(""); //reset child options
    $(array_list).each(function (i) { //populate child options 
        $("#child_selection").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
    });
}



$("#genero").change(function() {
    var gen = $(this).val()
    switch(gen){
        case '0':
                $('#new_gen').show();
            break;
        default: //default child option is blank
                $('#new_gen').hide(); 
            break;
    }

});



});
</script>


<?php foreach($local as $dataLocal){ ?>

        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            
                        
                            <article class="detailed-logo">
                                <figure>
                                <?php if($imgPerfil != null){ foreach($imgPerfil as $img){?>
                                        <img style="width:114px; height:85px; position:relative;" src="<?php echo base_url('assets/images/profile/local'); ?>/<?php echo $img['img_ruta'];?>" alt="">
                                    <?php }}else{ ?>
                                        <img style="width:114px; height:85px; position:relative;" src="<?php echo base_url('assets/images/'); ?>/logoYP.png" alt="">
                                    <?php } ?>
                                </figure>
                                <div class="details">
                                    <h2 class="box-title"><?php echo $dataLocal->local_nombre; ?><small><i class="soap-icon-departure yellow-color"></i><span class="fourty-space"><?php echo $dataLocal->comu_nombre; ?>, <?php echo $dataLocal->region_nombre; ?></span></small></h2>
                                    <!--<span class="price clearfix">
                                        <span class="pull-right">5</span>
                                    </span>-->

                                        <form method="POST" action="<?=site_url("local/cambio_img")?>" enctype="multipart/form-data">
                                              <input type="hidden" class="form-control" name="local" id="local" value="<?php echo $dataLocal->id_local; ?>">
                                            <div class="col-md-12" data-for="message">
                                                <input type="file" name="image" id="image"><br/>
                                            </div>
                                            
                                            <button href="" value="upload" type="submit" class="button yellow full-width uppercase btn-small">Cambiar imagen de perfil</button>
                                         
                                        </form>
                                </div>
                            </article>
                        
                        
                        
                        
                        
                            <div class="travelo-box contact-us-box">
                                
                                    <ul class="contact-address">
                                        <li class="address">
                                            <i class="soap-icon-address circle"></i>
                                            <h5 class="title">Detalles</h5>
                                            <p><label>Región:</label><?php echo $dataLocal->region_nombre;?></p>
                                            <p><label>Comuna:</label><?php echo $dataLocal->comu_nombre;?></p>
                                            <p><label>Calle:</label><?php echo $dataLocal->loc_calle;  ?></p>
                                            <p><label>Numero:</label><?php echo $dataLocal->loc_numero; ?></p>
                                            <p><label>Correo:</label><?php echo $dataLocal->local_email; ?></p>
                                            <p><label>Numero de contacto:</label><?php echo $dataLocal->local_tel; ?></p>
                                        </li>
                                    </ul>
                               
                            </div>

                        </div>
                        
                        <div class="col-sm-8 col-md-9">
                            <div class="travelo-box">
                                    <h4 class="box-title">Modificar descripción</h4>
                                    <div class="alert small-box" style="display: none;"></div>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea id="desc" rows="6" class="input-text full-width" placeholder="Descripción"></textarea>
                                    </div>
                                    <button type="submit" onclick="NuevaDesc(<?php echo $dataLocal->id_local; ?>)" class="btn-medium uppercase">Modificar</button>
                            </div>

                            <div class="col-sm-13 col-md-13">
                            <div class="travelo-box">
                            <div id="home" class="tab-pane fade in active">
                                    <h2>Modificación de grupo: <?php echo $dataLocal->local_nombre; ?></h2>
                                            <h5 class="skin-color">Información básica</h5>
                                            <form method="post" action="<?php echo site_url('localAjax/Modificar'); ?>">
                                                <input type="hidden" value="<?php echo $dataLocal->id_local; ?>" name="local" />
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Nombre</label>
                                                        <input type="text" name="nombre_local" class="input-text full-width" placeholder="<?php echo $dataLocal->local_nombre; ?>">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="skin-color">Localidad</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Región</label>
                                                        <select class="full-width" name="region" id="parent_selection">
                                                            <option value="">-- Seleccionar Región --</option>
                                                            <?php foreach ($regiones->result_array() as $region){?>
                                                               <option value="<?php echo $region['n_region']; ?>"><?php echo $region['region_nombre']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Comuna</label>

                                                        <select class="full-width" name="comuna" id="child_selection">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Calle</label>
                                                        <input type="text" class="input-text full-width" name="calle_local" placeholder="<?php echo $dataLocal->loc_calle; ?>">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Numero</label>
                                                        <input type="number" class="input-text full-width" name="n_calle" placeholder="<?php echo $dataLocal->loc_numero; ?>">
                                                    </div>
                                                </div> 
                                            
                                                <hr>
                                                <h5 class="skin-color">Contacto</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Email de contacto del grupo</label>
                                                        <input type="email" class="input-text full-width" name="email_local" placeholder="<?php echo $dataLocal->local_email; ?>">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Numero de contacto</label>
                                                        <input type="number" class="input-text full-width" name="n_local" placeholder="<?php echo $dataLocal->local_tel; ?>">
                                                    </div>
                                                </div>
                                            
                                            
                                                <hr>
                                                <button type="submit" class="btn-medium uppercase">Modificar</button>
                                            </form>
                                  </div>
                            </div>
                        </div>




                        </div>
                        
                        
                        
                        
                    </div>

                </div>
            </div>
        </section>
        <script>
       
       function NuevaDesc(local) {
        
        var ndesc = $("#desc").val();
        $.ajax({
            url: '<?php echo site_url('localAjax/nuevaDesc'); ?>',
            type: 'POST',
            data: {
                local: local,
                ndesc: ndesc
            },
            success: function (respuesta) {
                if(respuesta == 1){
                    Swal.fire({
                        title: 'Se ha modificado la descripción',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar'
                    })
                }else if(respuesta == 0){
                    Swal.fire({
                        title: 'Ha ocurrido un error',
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar'
                    })
                }else{
                    Swal.fire({
                        title: 'Acceso denegado',
                        type: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar'
                    })
                }
                


            },
            error: function () {
                Swal.fire({
                        title: 'Ha ocurrido un error',
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar'
                    })
            }
        });
    }

   
       </script>


<?php } ?>