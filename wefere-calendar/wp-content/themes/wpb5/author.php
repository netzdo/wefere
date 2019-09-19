<?php
$author = get_user_by( 'slug', get_query_var( 'author_name' ) );

acf_form_head(); ?>
<?php get_header() ?>
<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="title">Perfil</h1>
      </div>
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary" id="openAuthO">Conectar a Google Calendar</button>
        <button type="button" class="btn btn-primary" id="closeAuthO">Desconectar de Google Calendar</button>
      </div>
    </div>

    <ul class="nav nav-tabs" id="myTabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="calendar-tab" data-toggle="tab" href="#calendar">Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="schedule-tab" data-toggle="tab" href="#schedule">Horario</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabsContent">
      <div class="tab-pane fade show active" id="calendar">
        <div class="control-bar">
          <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center">
              <h3 id="day"><?= date_i18n('l d, F Y') ?></h3>
            </div>
            <div class="col-lg-4"></div>
          </div>
        </div>
        <?php $day = remove_accents(date_i18n('l')); ?>
        <?php
        if($work_day = get_field($day,'user_'.$author->ID)){
          $start = explode(':',$work_day[0]['entrada']);
          $start = ($start[0] * 60 * 60) + $start[1] * 60;
          $end = explode(':',$work_day[0]['salida']);
          $end = ($end[0] * 60 * 60) + $end[1] * 60;
        }

        ?>
        <input type="hidden" id="dateFlag" value="<?= date_i18n('Y-m-d') ?>T">
        <input type="hidden" id="workStart" value="<?= $start  ?>">
        <input type="hidden" id="workEnd" value="<?= $end ?>">

        <div class="row">
          <div class="col-lg-6">
            <h3 class="title-2"><i class="fas fa-calendar-check"></i> Eventos fuera del horario de trabajo</h3>
            <ul id="availableEvents"></ul>
          </div>
          <div class="col-lg-6">
            <h3 class="title-2"><i class="fas fa-calendar-times"></i> Eventos dentro del horario de trabajo</h3>
            <ul id="notAvailableEvents"></ul>
          </div>
        </div>
        <pre id="content" style="white-space: pre-wrap;">

        </pre>
      </div>
      <div class="tab-pane fade" id="schedule">
        <?php acf_form(array(
          'post_id' => 'user_'.$author->ID,
          'field_groups' => array(7),
          'submit_value' => 'Actualizar horario',
          'updated_message' => 'Horario actualizado'
        )); ?>
      </div>
    </div>

  </div>
</div>

<?php get_footer() ?>
