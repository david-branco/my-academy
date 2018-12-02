<div class ="container">

<h1 style ="text-align: center"><?php echo $teacher['nome'] ?> admin panel</h1>
    <a href="<?php echo base_url() . "index.php/login/signout/"?>"><button type="button" class="btn btn-danger btn-sm">Logout</button></a>
    <a href="<?php echo base_url() . "index.php/teacher/form/".$this->session->userdata('id'); ?>"><button type="button" class="btn btn-warning btn-sm">Edit User Data</button></a>
    <a href="<?php echo base_url() . "index.php/teacher/profile/".$this->session->userdata('id'); ?>"><button type="button" class="btn btn-info btn-sm">Show Public Profile</button></a>

<?php 
    if (!empty($this->session->flashdata('mensagem'))) {
        echo "<p class='alert alert-success'>".$this->session->flashdata('mensagem')."</p>";
    }
?>

<div style ="margin-top: 50px">
<h2 style ="display: inline">Classes</h2><a href="<?php echo base_url() . "index.php/ensino/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-primary btn-xs">Add new</button></a>
<table class="table table-striped" style ="overflow: hidden; table-layout:fixed; white-space: nowrap">
    <thead>
        <tr>
            <th width ="10%">Period</th>
            <th width ="27%">Name</th>
            <th width ="15%">Institution</th>
            <th width ="28%">Course</th>
            <th width ="7%">Visibility</th>
            <th width ="13%">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($classes as $class) { ?>
        <tr>
            <td><div style="overflow: hidden"><?php echo $class->periodo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $class->nome ?></div></td>
            <td><div style="overflow: hidden"><?php echo $class->instituicao ?></div></td>
            <td><div style="overflow: hidden"><?php echo $class->curso ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($class->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/ensino/show/" . $class->ensino_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/ensino/form/" . $class->ensino_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/ensino/delete/" . $class->ensino_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<h2 style ="display: inline">Events</h2><a href="<?php echo base_url() . "index.php/evento/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-xs btn-primary">Add new</button></a>
<table class="table table-striped" style ="overflow: hidden; table-layout:fixed; white-space: nowrap">
    <thead>
        <tr>
            <th width ="10%">Date</th>
            <th width ="19%">As</th>
            <th width ="30%">Name</th>
            <th width ="21%">Local</th>
            <th width ="7%">Visibility</th>
            <th width ="13%">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($events as $event) { ?>
        <tr>
            <td><div style="overflow: hidden"><?php echo $event->data_data ?></div></td>
            <td><div style="overflow: hidden"><?php echo $event->tipo_participacao ?></div></td>
            <td><div style="overflow: hidden"><?php echo $event->nome ?></div></td>
            <td><div style="overflow: hidden"><?php echo $event->local ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($event->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/evento/show/" . $event->evento_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/evento/form/" . $event->evento_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/evento/delete/" . $event->evento_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<h2 style ="display: inline">Thesis</h2>
<a href="<?php echo base_url() . "index.php/supervisao/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-xs btn-primary">Add new supervision</button></a>
<a href="<?php echo base_url() . "index.php/exame/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-xs btn-primary">Add new examination</button></a>
<table class="table table-striped" style ="overflow: hidden; table-layout:fixed; white-space: nowrap">
    <thead>
        <tr>
            <th width ="10%">As</th>
            <th width ="15%">Student Name</th>
            <th width ="22%">Local</th>
            <th width ="33%">Title</th>
            <th width ="7%">Visibility</th>
            <th width ="13%">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($supervisions as $supervision) { ?>
        <tr>
            <td style ="color: green"><?php echo "Supervisor"?></td>
            <td><div style="overflow: hidden"><?php echo $supervision->nome_estudante ?></div></td>
            <td><div style="overflow: hidden"><?php echo $supervision->local ?></div></td>
            <td><div style="overflow: hidden"><?php echo $supervision->titulo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($supervision->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/supervisao/show/" . $supervision->supervisao_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/supervisao/form/" . $supervision->supervisao_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/supervisao/delete/" . $supervision->supervisao_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
        <?php foreach ($exams as $exame) { ?>
        <tr>
            <td style ="color: red"><?php echo "Examinator" ?></td>
            <td><div style="overflow: hidden"><?php echo $exame->nome_estudante ?></div></td>
            <td><div style="overflow: hidden"><?php echo $exame->instituicao ?></div></td>
            <td><div style="overflow: hidden"><?php echo $exame->titulo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($exame->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/exame/show/" . $exame->exame_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/exame/form/" . $exame->exame_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/exame/delete/" . $exame->exame_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<h2 style ="display: inline">Investigations</h2>
<a href="<?php echo base_url() . "index.php/investigacao/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-xs btn-primary">Add new</button></a>
<table class="table table-striped" style ="overflow: hidden; table-layout:fixed; white-space: nowrap">
    <thead>
        <tr>
            <th width ="10%">Period</th>
            <th width ="30%">Name</th>
            <th width ="40%">Related sites</th>
            <th width ="7%">Visibility</th>
            <th width ="13%">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invs as $inv) { ?>
        <tr>
            <td><div style="overflow: hidden"><?php echo $inv->periodo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $inv->nome ?></div></td>
            <td><div style="overflow: hidden"><?php echo $inv->sites_relacionados ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($inv->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/investigacao/show/" . $inv->investigacao_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/investigacao/form/" . $inv->investigacao_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/investigacao/delete/" . $inv->investigacao_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<h2 style ="display: inline">Publications</h2>
<a href="<?php echo base_url() . "index.php/livro/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-primary btn-xs">Add new book</button></a>
<a href="<?php echo base_url() . "index.php/procedimento/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-primary btn-xs">Add new procedure</button></a>
<a href="<?php echo base_url() . "index.php/artigo/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-primary btn-xs">Add new article</button></a>
<a href="<?php echo base_url() . "index.php/export/pubsToBibtex"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success btn-xs">Download bibtex</button></a>
<a href="<?php echo base_url() . "index.php/export/pubsToPdf"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success btn-xs">Download pdf</button></a>
<table class="table table-striped" style ="overflow: hidden; table-layout:fixed; white-space: nowrap">
    <thead>
        <tr>
            <th width ="7%">Type</th>
            <th width ="10%">Date</th>
            <th width ="27%">Authors</th>
            <th width ="37%">Title</th>
            <th width ="7%">Visibility</th>
            <th width ="13%">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book) { ?>
        <tr>
            <td style ="color: red"><?php echo "Book" ?></td>
            <td><div style="overflow: hidden"><?php echo $book->data_data ?></div></td>
            <td><div style="overflow: hidden"><?php echo $book->autores ?></div></td>
            <td><div style="overflow: hidden"><?php echo $book->titulo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($book->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/livro/show/" . $book->livro_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/livro/form/" . $book->livro_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/livro/delete/" . $book->livro_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
        <?php foreach ($procedures as $procedure) { ?>
        <tr>
            <td style ="color: green"><?php echo "Proceeding" ?></td>
            <td><div style="overflow: hidden"><?php echo $procedure->data_data ?></div></td>
            <td><div style="overflow: hidden"><?php echo $procedure->autores ?></div></td>
            <td><div style="overflow: hidden"><?php echo $procedure->titulo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($procedure->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/procedimento/show/" . $procedure->procedimento_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/procedimento/form/" . $procedure->procedimento_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/procedimento/delete/" . $procedure->procedimento_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
        <?php foreach ($articles as $article) { ?>
        <tr>
            <td style ="color: blue"><?php echo "Article" ?></td>
            <td><div style="overflow: hidden"><?php echo $article->data_data ?></div></td>
            <td><div style="overflow: hidden"><?php echo $article->autores ?></div></td>
            <td><div style="overflow: hidden"><?php echo $article->titulo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($article->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/artigo/show/" . $article->artigo_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/artigo/form/" . $article->artigo_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/artigo/delete/" . $article->artigo_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<h2 style ="display: inline">Managements</h2>
<a href="<?php echo base_url() . "index.php/gestao/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-xs btn-primary">Add new</button></a>
<table class="table table-striped" style ="overflow: hidden; table-layout:fixed; white-space: nowrap">
    <thead>
        <tr>
            <th width ="10%">Year</th>
            <th width ="22%">Role</th>
            <th width ="30%">Of</th>
            <th width ="18%">Institution</th>
            <th width ="7%">Visibility</th>
            <th width ="13%">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($manages as $manage) { ?>
        <tr>
            <td><div style="overflow: hidden"><?php echo $manage->periodo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $manage->cargo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $manage->referente ?></div></td>
            <td><div style="overflow: hidden"><?php echo $manage->instituicao ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($manage->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/gestao/show/" . $manage->gestao_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/gestao/form/" . $manage->gestao_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/gestao/delete/" . $manage->gestao_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<h2 style ="display: inline">Communications</h2>
<a href="<?php echo base_url() . "index.php/comunicacao/form/"; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-xs btn-primary">Add new</button></a>
<table class="table table-striped" style ="overflow: hidden; table-layout:fixed; white-space: nowrap">
    <thead>
        <tr>
            <th width ="9%">Type</th>
            <th width ="9%">Date</th>
            <th width ="38%">Title</th>
            <th width ="24%">Event</th>
            <th width ="7%">Visibility</th>
            <th width ="13%">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($communications as $communication) { ?>
        <tr>
            <td><div style="overflow: hidden"><?php echo $this->comunicacao_model->showType($communication->tipo); ?></div></td>
            <td><div style="overflow: hidden"><?php echo $communication->data_data ?></div></td>
            <td><div style="overflow: hidden"><?php echo $communication->titulo ?></div></td>
            <td><div style="overflow: hidden"><?php echo $communication->evento ?></div></td>
            <td><div style="overflow: hidden"><?php echo $this->teacher_model->showVisibilidade($communication->visibilidade) ?></div></td>
            <td>
                <a href="<?php echo base_url() . "index.php/comunicacao/show/" . $communication->comunicacao_id; ?>"><button type="button" class="btn btn-info btn-xs">Show</button></a>
                <a href="<?php echo base_url() . "index.php/comunicacao/form/" . $communication->comunicacao_id; ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                <a href="<?php echo base_url() . "index.php/comunicacao/delete/" . $communication->comunicacao_id; ?>"><button type="button" class="btn btn-danger btn-xs">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>