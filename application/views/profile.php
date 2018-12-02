<div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div id="photo-header" class="text-center">
            <!-- PHOTO (AVATAR) -->
            <div id="photo">
              <?php if ($teacher['foto']) { ?>
              <img src="<?php echo base_url() . $teacher['foto']; ?>" alt="avatar">
              <?php } else { ?>
              <img src="<?php echo base_url() . '/uploads/photos/defaultphoto.png' ?>" alt="avatar">
              <?php } ?>
            </div>
            <div id="text-header">
             <h1><span><?php echo $teacher['nome']; ?></span></h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-7">
          <!-- ABOUT ME -->
          <div class="box">
            <h2>About Me</h2>
            <p style ="text-align: justify"><?php echo $teacher['info_pessoal']; ?></p>
          </div>
          <!-- EDUCATION -->
          <div class="box">
            <h2>Classes</h2>
            <ul id="education" class="clearfix">
              <?php foreach ($classes as $class) { ?>
              <li>
                <div class="year pull-left"><?php echo explode("/", $class->periodo)[0]; ?></div>
                <div class="description pull-right">
                  <h3><?php echo $class->nome; ?></h3>
                  <p><?php echo $class->curso; ?></p>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>

          <div class="box">
            <h2>Thesis</h2>
            <?php foreach ($sups as $sup) { ?>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where"><?php echo $sup->nome_estudante; ?></div>
                <div class="year"><?php echo $sup->local; ?></div>
                <div class="year"><strong>As Supervisor</strong></div>
              </div>
              <div class="col-xs-9">
                <div class="profession"><?php echo $sup->titulo; ?></div>
                <div class="description"><?php echo $sup->descricao; ?></div>
                <div class="description"><?php echo $sup->local; ?></div>
                <div class="description"><?php echo $sup->nome_coadjuvante; ?></div>
              </div>
            </div>
            <?php } ?>
            <?php foreach ($exams as $exa) { ?>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where"><?php echo $exa->nome_estudante; ?></div>
                <div class="year"><?php echo $this->exame_model->showExameType($exa->tipo); ?></div>
                <div class="year"><strong>As Examinator</strong></div>
              </div>
              <div class="col-xs-9">
                <div class="profession"><?php echo $exa->titulo; ?></div>
                <div class="description"><?php echo $exa->instituicao; ?></div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="box">
            <h2>Investigation</h2>
            <?php foreach ($invs as $inv) { ?>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where"><?php echo $inv->periodo; ?></div>
                <div class="year" style ="overflow: hidden"><a href ="<?php echo $inv->sites_relacionados; ?>" target ="_blank"><?php echo $inv->sites_relacionados; ?></a></div>
              </div>
              <div class="col-xs-9">
                <div class="profession"><?php echo $inv->nome; ?></div>
                <div class="description"><?php echo $inv->descricao; ?></div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="box">
            <h2>Publications</h2>
            <?php foreach ($books as $book) { ?>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where"><?php echo $book->data_data;?></div>
                <div class="year"><?php echo $book->editora; ?></div>
                <div class="year"><strong>Book</strong></div>
              </div>
              <div class="col-xs-9">
                <div class="profession"><?php echo $book->titulo; ?></div>
                <div class="description"><?php echo $book->autores; ?></div>
                <div class="description"><?php echo $book->capitulo; ?></div>
              </div>
            </div>
            <?php } ?>
            <?php foreach ($procs as $proc) { ?>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where"><?php echo $proc->data_data;?></div>
                <div class="year"><?php echo $proc->local; ?></div>
                <div class="year"><strong>Procedure</strong></div>
              </div>
              <div class="col-xs-9">
                <div class="profession"><?php echo $proc->titulo; ?></div>
                <div class="description"><?php echo $proc->autores; ?></div>
                <div class="description"><?php echo $proc->titulo_livro; ?></div>
              </div>
            </div>
            <?php } ?>
            <?php foreach ($arts as $art) { ?>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where"><?php echo $art->data_data;?></div>
                <div class="year"><?php echo $art->editora; ?></div>
                <div class="year"><strong>Article</strong></div>
              </div>
              <div class="col-xs-9">
                <div class="profession"><?php echo $art->titulo; ?></div>
                <div class="description"><?php echo $art->autores; ?></div>
                <div class="description"><?php echo $art->publicacao; ?></div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="box">
            <h2>Events</h2>
            <ul id="education" class="clearfix">
              <?php foreach ($events as $event) { ?>
              <li>
                <div class="year pull-left"><?php echo explode('-',$event->data_data)[0]; ?></div>
                <div class="description pull-right">
                  <h3><?php echo $event->nome; ?></h3>
                  <p><?php echo $event->tipo_participacao; ?></p>
                  <p><?php echo $event->descricao; ?></p>
                  <p><?php echo $event->local; ?></p>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-sm-5">
          <!-- CONTACT -->
          <div class="box clearfix">
            <h2>Contact</h2>
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-phone fa-fw"></span></div>
              <div class="title only pull-right"><?php echo $teacher['contato']; ?></div>
            </div>
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-envelope fa-fw"></span></div>
              <div class="title only pull-right"><?php echo $teacher['email']; ?></div>
            </div>
            <div class="contact-item">
              <div class="icon pull-left text-center"><span class="fa fa-laptop fa-fw"></span></div>
              <div class="title pull-right">Website</div>
              <div class="description pull-right"><?php echo $teacher['website']; ?></div>
            </div>
          </div>
          <!-- SKILLS -->
          <div class="box">
            <h2>Management</h2>
            <?php foreach ($manages as $manage) { ?>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where"><?php echo $manage->instituicao ?></div>
                <div class="year"><?php echo $manage->periodo; ?></div>
              </div>
              <div class="col-xs-9">
                <div class="profession"><?php echo $manage->cargo; ?></div>
                <div class="description"><?php echo $manage->referente; ?></div>
                <div class="description"><?php echo $manage->descricao; ?></div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="box">
            <h2>Communications</h2>
            <?php foreach ($communications as $com) { ?>
            <div class="job clearfix">
              <div class="col-xs-3">
                <div class="where"><?php echo $com->evento ?></div>
                <div class="year"><?php echo $com->data_data; ?></div>
              </div>
              <div class="col-xs-9">
                <div class="profession"><?php echo $com->local; ?></div>
                <div class="description"><?php echo $com->titulo; ?></div>
                <div class="description"><?php echo $com->autores; ?></div>
                <div class="description"><a href="<?php echo $com->url; ?>">Link</a></div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>