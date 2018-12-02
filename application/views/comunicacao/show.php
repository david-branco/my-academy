<div class ="container">
<h1 style ="text-align: center"><?php echo $comunicacao['titulo']; ?></h1>
<div style ="margin-top: 50px">

<h3>Date <small><?php echo $comunicacao['data_data']; ?></small></h3>
<h3>Authors <small><?php echo $comunicacao['autores']; ?></small></h3>
<h3>Event <small><?php echo $comunicacao['evento']; ?></small></h3>
<h3>Local <small><?php echo $comunicacao['local']; ?></small></h3>
<h3>URL <small><?php echo $comunicacao['url']; ?></small></h3>
<h3>Type <small><?php echo $this->comunicacao_model->showType($comunicacao['tipo']); ?></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($comunicacao['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/comunicacao/form/" . $comunicacao['comunicacao_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit communication</button></a>
<?php
	if($comunicacao['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/comunicacao/enable_disable/".$comunicacao['comunicacao_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/comunicacao/enable_disable/".$comunicacao['comunicacao_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>