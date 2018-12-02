<div class ="container">
<h1 style ="text-align: center"><?php echo $event['nome']; ?></h1>
<div style ="margin-top: 50px">

<h3>Date <small><?php echo $event['data_data']; ?></small></h3>
<h3>Participation type <small><?php echo $event['tipo_participacao']; ?></small></h3>
<h3>Local <small><?php echo $event['local']; ?></small></h3>
<h3>Description <small><?php echo $event['descricao']; ?></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($event['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/evento/form/" . $event['evento_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit event</button></a>
<?php
	if($event['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/evento/enable_disable/".$event['evento_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/evento/enable_disable/".$event['evento_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>