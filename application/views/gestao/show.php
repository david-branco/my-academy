<div class ="container">
<h1 style ="text-align: center"><?php echo $manage['cargo'] . " of " . $manage['referente'] ; ?></h1>
<div style ="margin-top: 50px">

<h3>Period <small><?php echo $manage['periodo']; ?></small></h3>
<h3>Institution <small><?php echo $manage['instituicao']; ?></small></h3>
<h3>Description <small><?php echo $manage['descricao']; ?></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($manage['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/gestao/form/" . $manage['gestao_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit management</button></a>
<?php
	if($manage['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/gestao/enable_disable/".$manage['gestao_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/gestao/enable_disable/".$manage['gestao_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>