<div class ="container">
<h1 style ="text-align: center"><?php echo $inv['nome']; ?></h1>
<div style ="margin-top: 50px">

<h3>Periodo <small><?php echo $inv['periodo']; ?></small></h3>
<h3>Description <small><?php echo $inv['descricao']; ?></small></h3>
<h3>Related sites <small><?php echo $inv['sites_relacionados']; ?></small></h3>
<h3>Publications <small><?php echo $inv['publicacoes']; ?></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($inv['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/investigacao/form/" . $inv['investigacao_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit investigation</button></a>
<?php
	if($inv['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/investigacao/enable_disable/".$inv['investigacao_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/investigacao/enable_disable/".$inv['investigacao_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>