<div class ="container">
<h1 style ="text-align: center"><?php echo $sup['titulo']; ?></h1>
<div style ="margin-top: 50px">

<h3>Start Date <small><?php echo $sup['data_inicial']; ?></small></h3>
<h3>Concluded Date <small><?php echo $sup['data_final']; ?></small></h3>
<h3>Student Name <small><?php echo $sup['nome_estudante']; ?></small></h3>
<h3>Degree <small><?php echo $this->supervisao_model->showExameType($sup['tipo']); ?></small></h3>
<h3>Status <small><?php echo $this->supervisao_model->showSupervisionStatus($sup['estado']); ?></small></h3>
<h3>Local <small><?php echo $sup['local']; ?></small></h3>
<h3>Description <small><?php echo $sup['descricao']; ?></small></h3>
<h3>URL <small><?php echo $sup['endereco']; ?></small></h3>
<h3>DOI <small><?php echo $sup['doi']; ?></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($sup['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/supervisao/form/" . $sup['supervisao_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit supervision</button></a>
<?php
	if($sup['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/supervisao/enable_disable/".$sup['supervisao_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/supervisao/enable_disable/".$sup['supervisao_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>