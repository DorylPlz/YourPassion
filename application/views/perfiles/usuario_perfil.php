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

<script language="javascript" type="text/javascript">  
$(document).ready(function(){

//Creación de local
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
$("#parent_selection2").change(function() {
        var parent = $(this).val(); //get option value from parent 
        
        switch(parent){ //using switch compare selected option and populate child
            <?php foreach ($regiones->result_array() as $region){?>
              case '<?php echo $region['n_region']; ?>':
                list(<?php echo $region['n_romano']; ?>);
                break;
            <?php } ?> 
            default: //default child option is blank
                $("#child_selection2").html('');  
                break;
           }
});

//function to populate child select box
function list(array_list)
{
    $("#child_selection2").html(""); //reset child options
    $(array_list).each(function (i) { //populate child options 
        $("#child_selection2").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
    });
}




});
</script>



        <section id="content" class="gray-area">
            <div class="container">
                <div id="main">
                    <div class="tab-container full-width-style arrow-left dashboard">
                        <ul class="tabs">
                            <li class="active"><a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i>Perfil</a></li>
                            <li class=""><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Eventos</a></li>
                            <li class=""><a data-toggle="tab" href="#wishlist"><i class="soap-icon-wishlist circle"></i>Grupos seguidos</a></li>
                            <li class=""><a data-toggle="tab" href="#misgrupos"><i class="soap-icon-friends circle"></i>Mis Grupos</a></li>
                            <li class=""><a data-toggle="tab" href="#travel-stories"><i class="soap-icon-conference circle"></i>Opiniones</a></li>
                            <?php foreach ($perfil->result_array() as $row){ if($this->session->userdata('id_usu')==$row['id_usu']){ ?>
                            <li class=""><a data-toggle="tab" href="#settings"><i class="soap-icon-settings circle"></i>Configuración</a></li>
                            <li class=""><a data-toggle="tab" href="#nuevogrupo"><i class="soap-icon-friends circle"></i>Nuevo grupo</a></li>
                        <?php }} ?>
                        </ul>



                    <?php foreach ($perfil->result_array() as $row){ if($this->session->userdata('id_usu')==$row['id_usu']){ 
                        if($invGrupos != null){
                            $i = 0;
                            $tgl = 0; 
                            foreach($invGrupos->result() as $gruposinvitados){$i++; }?>
                        <div class="col-sm-10">
                            <h2>Invitaciones</h2>
                            <div class="toggle-container box">
                                
                                
                                <div class="panel style1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" href="#tgg1" data-toggle="collapse">Invitaciones: <?php echo $i ?></a>
                                    </h4>
                                    <div class="panel-collapse collapse" id="tgg1">
                                        <div class="panel-content">
                                            
                                            <?php foreach($invGrupos->result() as $gruposinvitados){ 
                                                $tgl++; ?>

                                                <div class="toggle-container box">
                                                    <div class="panel style1">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" href="#tgl<?php echo $tgl; ?>" data-toggle="collapse"><?php echo $gruposinvitados->gru_nombre; ?>, <?php echo $gruposinvitados->gen_nombre; ?>, <?php echo $gruposinvitados->usu_cargo; ?></a>
                                                        </h4>
                                                        <div class="panel-collapse collapse" id="tgl<?php echo $tgl; ?>">
                                                            <div class="panel-content">
                                                                <div class="pricing-table white box">
                                                                    <form method="post" action="<?php echo site_url('grupo/confInvitacion'); ?>">
                                                                        <input type="hidden" name="one" value="<?php echo $this->session->userdata('id_usu2'); ?>">
                                                                        <input type="hidden" name="two" value="<?php echo $gruposinvitados->id_entrada; ?>">
                                                                        <input type="hidden" name="three" value="<?php echo $gruposinvitados->id_grupo; ?>">
                                                                        <div class="header clearfix">
                                                                            <i class="soap-icon-friends circle yellow-color"></i><h4 class="box-title"><span><?php echo $gruposinvitados->gru_nombre; ?><small><?php echo $gruposinvitados->gen_nombre; ?></small></span></h4>
                                                                        </div>
                                                                        <p class="description">
                                                                            Se te ha invitado a ser parte de <b><?php echo $gruposinvitados->gru_nombre; ?></b> tomando el rol de <b><?php echo $gruposinvitados->usu_cargo; ?></b>
                                                                        </p>
                                                                        <ul class="check-square features">
                                                                            <li><?php echo $gruposinvitados->tipo_nombre; ?></li>
                                                                            <li><?php echo $gruposinvitados->gen_nombre; ?></li>
                                                                            <li><?php echo $gruposinvitados->region_nombre; ?></li>
                                                                            <li><?php echo $gruposinvitados->comu_nombre; ?></li>
                                                                            <li><?php echo $gruposinvitados->gru_formacion; ?></li>
                                                                        </ul>
                                                                        <button class="button btn-medium yellow" id="submit" name="submit" type="submit" value ="1">Aceptar</button>
                                                                        <button class="button btn-medium orange" id="submit" name="submit" type="submit" value ="2">Rechazar</button> 
                                                                    </form>
                                                                </div>
                                                            </div><!-- end content -->
                                                        </div>
                                                    </div>
                                                </div>

                                                


                                            <?php } ?>

                                            <hr/>
                                        </div><!-- end content -->
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <?php }}} ?>





                        <div class="tab-content">
                            <div id="profile" class="tab-pane fade in active">
                                <div class="view-profile">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                            <a title="" href="#"><img width="270" height="263" alt="" src="http://placehold.it/270x263"></a>
                                        </figure>
                                        <div class="details">
                                            <?php foreach ($perfil->result_array() as $row){?>
                                                                    
                                            <h2 class="box-title fullname"><?php echo $row['usu_nombre']; ?></h2>
                                            <dl class="term-description">
                                                <dt>Nombre:</dt><dd><?php echo $row['usu_nombre']; ?></dd>
                                                <dt>Fecha de nacimiento:</dt><dd><?php echo $row['usu_nacimiento']; ?></dd>
                                            </dl>
                                            <?php } ?>
                                        </div>
                                    </article>
                                    <hr>
                                    <h2>Descripción</h2>
                                        <div class="intro">
                                        <?php  if($row['usu_desc']==NULL){ ?><p>No hay descripción para mostrar</p>
                                        <?php }else{ ?>
                                            <p><?php echo $row['usu_desc'];  ?></p>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <h2>Grupos a los que sigue</h2>
                                    <div class="suggestions image-carousel style2" data-animation="slide" data-item-width="170" data-item-margin="22">
                                        <ul class="slides">
                                            
                                            <?php if($getSeguidos != 0){
                                                foreach ($perfil->result_array() as $row){?>

                                                <li>
                                                    <a href="<?php echo site_url('main/perfil_grupo'); ?>" class="hover-effect">
                                                        <img src="http://placehold.it/170x170" alt="" />
                                                    </a>
                                                    <h5 class="caption">Grupo 1</h5>
                                                </li>


                                            <?php }}else{ ?><p>No hay grupos para mostrar</p><?php } ?>
                                            
                                        </ul>
                                    </div>
                                    <hr>
                                    
                                </div>
                                
                            </div>
                            <div id="booking" class="tab-pane fade">
                                <h2>Eventos a los que has asistido o asistirás</h2>
                                <div class="filter-section gray-area clearfix">
                                    <form>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" checked="checked" />
                                            All Types
                                        </label>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" />
                                            Hotels
                                        </label>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" />
                                            Flights
                                        </label>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" />
                                            Cars
                                        </label>
                                        <label class="radio radio-inline">
                                            <input type="radio" name="filter" />
                                            Cruises
                                        </label>
                                        <div class="pull-right col-md-6 action">
                                            <h5 class="pull-left no-margin col-md-4">Sort results by:</h5>
                                            <button class="btn-small white gray-color">UPCOMING</button>
                                            <button class="btn-small white gray-color">CANCELLED</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="booking-history">
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">NOV</label>
                                            <label class="date">23</label>
                                            <label class="day">SAT</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-support blue-color circle"></i>Indianapolis to Paris<small>you are flying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>saturday, nov 23, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">Proximo</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">NOV</label>
                                            <label class="date">30</label>
                                            <label class="day">SAT</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-support blue-color circle"></i>England to Rome<small>you are flying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>saturday, nov 30, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">Proximo</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">11</label>
                                            <label class="day">MON</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-support blue-color circle"></i>Hilton Hotel &amp; Resorts<small>2 adults staying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>monday, dec 11, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">Proximo</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">18</label>
                                            <label class="day">THU</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-support blue-color circle"></i>Economy Car<small>you are driving</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>thursday, dec 18, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">Proximo</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">22</label>
                                            <label class="day">SUN</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-support blue-color circle"></i>Baja Mexico<small>3 adults going on cruise</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>sunday, dec 22, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">Proximo</button>
                                    </div>
                                    <div class="booking-info clearfix cancelled">
                                        <div class="date">
                                            <label class="month">NOV</label>
                                            <label class="date">30</label>
                                            <label class="day">SAT</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-support circle"></i>England to Rome<small>you are flying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>saturday, nov 30, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">Finalizado</button>
                                    </div>
                                    <div class="booking-info clearfix cancelled">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">18</label>
                                            <label class="day">THU</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-support circle"></i>Economy Car<small>you are driving</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>thursday, dec 18, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">Finalizado</button>
                                    </div>
                                </div>

                            </div>
                            <div id="wishlist" class="tab-pane fade">
                                <h2>Tus grupos seguidos</h2>
                                <div class="row image-box listing-style2 add-clearfix">
                                    
                                    <?php if($getSeguidos != 0){
                                                foreach ($perfil->result_array() as $row){?>

                                    <div class="col-sm-6 col-md-4">
                                        <article class="box">
                                            <figure>
                                                <a class="hover-effect" title="" href="#"><img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                            </figure>
                                            <div class="details">
                                                <a class="pull-right button uppercase" href="" title="View all">select</a>
                                                <h4 class="box-title">Savona to Italy</h4>
                                                <label class="price-wrapper">
                                                    <span class="price-per-unit">$170</span>avg/night
                                                </label>
                                            </div>
                                        </article>
                                    </div>
                                    <?php }}else{ ?><div class="col-sm-6 col-md-4"><p>No hay grupos para mostrar</p><?php } ?>

                                    </div>
                                </div>
                            </div>

                            <div id="misgrupos" class="tab-pane fade">

                                <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#grupodisplay">Grupo</a></li>
                                  <li><a data-toggle="tab" href="#localdisplay">Local</a></li>
                                  <li><a data-toggle="tab" href="#organizadoradisplay">Productoras</a></li>
                                </ul>
                                <div class="tab-content">
                                  <div id="grupodisplay" class="tab-pane fade in active">

                                        <h2>Mis Grupos</h2>
                                        <div class="row image-box listing-style2 add-clearfix">
                                            
                                            <?php if($getGruposUsu != null){
                                                foreach ($getGruposUsu->result_array() as $misgrupos){?>

                                                    <div class="col-sm-6 col-md-4">
                                                        <article class="box">
                                                            <figure>
                                                                <a class="hover-effect" title="" href="<?php echo site_url('grupo/perfil_grupo?profile=');?><?php echo $misgrupos['fk_id_grupo']; ?>&nombre=<?php echo $misgrupos['gru_nombre']; ?>">
                                                                <img style="width:300px; height:160px;position:relative;" src="<?php echo base_url('assets/images/profile'); ?>/<?php echo $misgrupos['img_ruta'];?>" alt=""></a>
                                                                
                                                            </figure>
                                                            <div class="details">
                                                                <a class="pull-right button uppercase" href="<?php echo site_url('grupo/perfil_grupo?profile=');?><?php echo $misgrupos['fk_id_grupo']; ?>&nombre=<?php echo $misgrupos['gru_nombre']; ?>" title="View all">Ir</a>
                                                                <h4 class="box-title"><?php echo $misgrupos['gru_nombre']; ?></h4>
                                                                <label class="price-wrapper">
                                                                    <?php echo $misgrupos['gen_nombre']; ?><br/><?php echo $misgrupos['tipo_nombre']; ?>
                                                                </label>
                                                            </div>
                                                        </article>
                                                    </div>


                                            <?php }}else{ ?>
                                                <div class="col-sm-6 col-md-4"><p>No hay grupos para mostrar</p></div>
                                            <?php } ?>
                                    </div>
                                </div>
                              <div id="localdisplay" class="tab-pane fade">
                                <h2>Mis Locales</h2>
                                <div class="row image-box listing-style2 add-clearfix">
                                    <?php if($getLocalesUsu != null){
                                                foreach ($getLocalesUsu->result_array() as $mislocales){?>

                                                    <div class="col-sm-6 col-md-4">
                                                        <article class="box">
                                                            <figure>
                                                                <a class="hover-effect" title="" href="<?php echo site_url('local/perfil_local');?>/<?php echo $mislocales['fk_id_local']; ?>/<?php echo $mislocales['local_nombre']; ?>">
                                                                <img width="300" height="160" alt="" src="http://placehold.it/300x160"></a>
                                                            </figure>
                                                            <div class="details">
                                                                <a class="pull-right button uppercase" href="<?php echo site_url('local/perfil_local');echo"/"; echo $mislocales['fk_id_local']; ?>/<?php echo $mislocales['local_nombre']; ?>" title="View all">Ir</a>
                                                                <h4 class="box-title"><?php echo $mislocales['local_nombre']; ?></h4>
                                                                <label class="price-wrapper">
                                                                </label>
                                                            </div>
                                                        </article>
                                                    </div>


                                            <?php }}else{ ?>
                                                <div class="col-sm-6 col-md-4"><p>No hay locales para mostrar</p></div>
                                            <?php } ?>
                                        </div>
                                </div>

                                <div id="organizadoradisplay" class="tab-pane fade">
                                    <h2>Mis Productoras</h2>
                                        <div class="row image-box listing-style2 add-clearfix">


                                            <div class="col-sm-6 col-md-4"><p>No hay Productoras para mostrar</p></div>







                                        </div>
                                </div>



                        </div>


                            </div>

                            <div id="travel-stories" class="tab-pane fade">
                                <h2>Opiniones</h2>
                                        <?php if($getopiniones != 0){
                                                foreach ($getopiniones->result_array() as $opiniones){?>

                                                    <div class="guest-review table-wrapper">
                                                        <div class="col-xs-3 col-md-2 author table-cell">
                                                            <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                                            <p class="name">Evento</p>
                                                            <p class="date">Local</p>
                                                        </div>
                                                        <div class="col-xs-9 col-md-10 table-cell comment-container">
                                                            <div class="comment-header clearfix">
                                                                <h4 class="comment-title">We had great experience while our stay and Hilton Hotels!</h4>
                                                                <div class="review-score">
                                                                    <div class="five-stars-container"><div class="five-stars" style="width: 80%;"></div></div>
                                                                    <span class="score">4.0/5.0</span>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stand dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php }}else{ ?>
                                                <p>No hay grupos para mostrar</p>
                                        <?php } ?>
                                
                            </div>

                            <?php if($this->session->userdata('id_usu')==$row['id_usu']){ ?>
                            <div id="settings" class="tab-pane fade">
                                <h2>Configuración de cuenta</h2>
                                <h5 class="skin-color">Cambio de contraseña</h5>
                                <form action="profile/modificar_perfil" method="post">
                                    <input type="hidden" value="<?php echo $this->session->userdata('id_usu');?>" name="key" />
                                    <input type="hidden" value="<?php echo $this->session->userdata('id_usu2');?>" name="key2" />
                                    <input type="hidden" value="<?php echo $this->session->userdata('email');?>" name="key3" />
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Contraseña anterior</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Contraseña nueva</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Confirmar nueva contraseña</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-medium">Actualizar contraseña</button>
                                    </div>
                                </form>
                                <hr>
                                <h5 class="skin-color">Cambiar Email</h5>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Email anterior</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Nuevo Email</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Confirmar nuevo Email</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-medium">Actualizar Email</button>
                                    </div>
                                </form>
                                <hr>
                                <h5 class="skin-color">Enviarme Emails cuando</h5>
                                <form>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Un grupo que sigo tiene un evento.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Un local que sigo tiene un evento.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Una organizadora que sigo hace un evento.
                                        </label>
                                    </div>
                                    <button class="btn-medium uppercase">Actualizar</button>
                                </form>
                            </div>


                            <div id="nuevogrupo" class="tab-pane fade">


                                <ul class="nav nav-tabs">
                                  <li class="active"><a data-toggle="tab" href="#home">Grupo</a></li>
                                  <li><a data-toggle="tab" href="#menu1">Local</a></li>
                                  <li><a data-toggle="tab" href="#menu2">Productora</a></li>
                                </ul>

                                <div class="tab-content">
                                  <div id="home" class="tab-pane fade in active">
                                    <h2>Creación de un nuevo grupo</h2>
                                            <h5 class="skin-color">Información básica</h5>
                                            <form method="post" action="new_group">
                                                <input type="hidden" value="<?php echo $this->session->userdata('id_usu2');?>" name="key" />
                                                <input type="hidden" value="<?php echo $this->session->userdata('email');?>" name="key2" />
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Nombre</label>
                                                        <input type="text" name="nombre_grupo" class="input-text full-width">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <div class="form-group">
                                                            <label>Fecha de Formación</label>
                                                            <input type="date" name="fformacion" class="input-text full-width form-control" placeholder="Día-Mes-Año" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Tipo</label>
                                                        <select class="full-width" name="tipo_grupo">
                                                            <option value="">--Seleccionar--</option>
                                                            <?php foreach ($tipogrupo->result_array() as $tipo){?>
                                                                    <option value="<?php echo $tipo['id_tipo']; ?>"><?php echo $tipo['tipo_nombre']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Genero</label>
                                                        <select class="full-width" name="genero_grupo" id="genero">
                                                                    <option value="">--Seleccionar--</option>
                                                                    <option value="0">Mi genero no aparece</option>
                                                                    <?php foreach ($generosgrupo->result_array() as $genero){?>
                                                                        <option value="<?php echo $genero['id_genero']; ?>"><?php echo $genero['gen_nombre']; ?></option>
                                                                    <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4" id="new_gen" style="display:none;">
                                                        <label>Ingresa tu genero</label>
                                                        <input type="text" class="input-text full-width" name="new_genero" >
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="skin-color">Localidad</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Región</label>
                                                        <select class="full-width" name="region" id="parent_selection">
                                                            <option value="">-- Please Select --</option>
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
                                            
                                                <hr>
                                                <h5 class="skin-color">Contacto</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Email de contacto del grupo</label>
                                                        <input type="email" class="input-text full-width" name="email_grupo">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Numero de contacto</label>
                                                        <input type="number" class="input-text full-width" name="n_grupo">
                                                    </div>
                                                </div>
                                            
                                            
                                                <hr>
                                                <button type="submit" class="btn-medium uppercase">Crear</button>
                                            </form>
                                  </div>
                                  <div id="menu1" class="tab-pane fade">
                                    <h3>Registro de Local</h3>
                                            <h5 class="skin-color">Información básica</h5>
                                            <form method="post" action="new_local" enctype="multipart/form-data">
                                                <input type="hidden" value="<?php echo $this->session->userdata('id_usu2');?>" name="keyL" />
                                                <input type="hidden" value="<?php echo $this->session->userdata('email');?>" name="key2L" />
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Nombre del local</label>
                                                        <input type="text" name="nombrelocal" class="input-text full-width">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>RUT del Local</label>
                                                        <input type="text" name="rutlocal" class="input-text full-width">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <h5 class="skin-color">Dueño</h5>
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Nombre del dueño</label>
                                                        <input type="text" name="nombred" class="input-text full-width">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>RUT del dueño</label>
                                                        <input type="text" name="rutd" class="input-text full-width">
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="skin-color">Localidad</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Región</label>
                                                        <select class="full-width" name="regionlocal" id="parent_selection2">
                                                            <option value="">-- Please Select --</option>
                                                            <?php foreach ($regiones->result_array() as $region){?>
                                                               <option value="<?php echo $region['n_region']; ?>"><?php echo $region['region_nombre']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Comuna</label>

                                                        <select class="full-width" name="comunalocal" id="child_selection2">
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Calle</label>

                                                        <input type="text" class="input-text full-width" name="callelocal">
                                                    </div>

                                                </div> 

                                                <div class="row form-group">
                                                     
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Numero</label>

                                                        <input type="number" class="input-text full-width" name="ndireccionlocal">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Codigo Postal(Opcional)</label>

                                                        <input type="number" class="input-text full-width" name="codPostallocal">
                                                    </div>
                                                </div>

                                            
                                                <hr>
                                                <h5 class="skin-color">Contacto</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Email de contacto</label>
                                                        <input type="email" class="input-text full-width" name="emaillocal">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Numero de contacto</label>
                                                        <input type="number" class="input-text full-width" name="numerolocal">
                                                    </div>
                                                </div>
                                            
                                                <hr>
                                                <h5 class="skin-color">Archivos</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Copia del documento de propiedad</label>
                                                        <input type="file" name="propiedadlocalfile" id="propiedadlocalfile">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Copia de carnet de propietario</label>
                                                        <input type="file" name="carnetlocalfile" id="carnetlocalfile">
                                                    </div>

                                                </div>
                                                <hr/>
                                                <h5 class="skin-color">Importante</h5>
                                                    <p>El rut del propietario debe coincidir con el del carnet entregado.</p>

                                                    <p>Los archivos entregados serán utilizados para confirmar que el local existe.</p>

                                                    <p>El local será registrado, pero no será identificado como un local verificado.</p>

                                                    <p>Los archivos enviados serán verificados en un plazo maximo de 5 días habiles por nuestro equipo, si todo está correcto, su local pasará a ser un local verificado.</p>
                                            
                                                <br>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="c" value="A" required> Acepto los términos y condiciones de YourPassion.
                                                    </label>
                                                </div>
                                                
                                                <br>
                                                <button type="submit" class="btn-medium uppercase" value="upload">Crear</button>
                                            </form>
                                  </div>
                                  <div id="menu2" class="tab-pane fade">
                                    <h3>Registro de Productora</h3>
                                    <form method="post" action="new_productora" enctype="multipart/form-data">
                                                <input type="hidden" value="<?php echo $this->session->userdata('id_usu2');?>" name="keyL" />
                                                <input type="hidden" value="<?php echo $this->session->userdata('email');?>" name="key2L" />
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Nombre de la Productora</label>
                                                        <input type="text" name="nombreproductora" class="input-text full-width">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>RUT de la Entidad</label>
                                                        <input type="text" name="rutentidad" class="input-text full-width">
                                                    </div>
                                                </div>
                                                <hr/>
                                                <h5 class="skin-color">Dueño</h5>
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Nombre del Dueño</label>
                                                        <input type="text" name="nombre_dp" class="input-text full-width">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>RUT del Dueño</label>
                                                        <input type="text" name="rut_dp" class="input-text full-width">
                                                    </div>
                                                </div>
                                                <hr>

                                                <h5 class="skin-color">Contacto</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Email de Contacto</label>
                                                        <input type="email" class="input-text full-width" name="emailproductora">
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Numero de Contacto</label>
                                                        <input type="number" class="input-text full-width" name="numeroproductora">
                                                    </div>
                                                </div>
                                            
                                                <hr>
                                                <h5 class="skin-color">Archivos</h5>
                                            
                                                <div class="row form-group">
                                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                                        <label>Copia de carnet de propietario</label>
                                                        <input type="file" name="carnetproductorafile" id="carnetproductorafile">
                                                    </div>

                                                </div>
                                                <hr/>
                                                <h5 class="skin-color">Importante</h5>
                                                    <p>El rut del propietario debe coincidir con el del carnet entregado.</p>

                                                    <p>La productora será registrada, pero no será identificada como una productora verificada.</p>

                                                    <p>Los archivos enviados serán verificados en un plazo maximo de 5 días habiles por nuestro equipo, si todo está correcto, su productora pasará a ser una productora verificada.</p>
                                            
                                                <br>

                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="c" value="A" required> Acepto los términos y condiciones de YourPassion.
                                                    </label>
                                                </div>
                                                
                                                <br>
                                                <button type="submit" class="btn-medium uppercase" value="upload">Crear</button>
                                            </form>
                                  </div>
                                </div>

                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>