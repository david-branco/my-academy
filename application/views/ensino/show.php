<div class ="container">
<h1 style ="text-align: center"><?php echo $class['nome']; ?></h1>

<div style ="margin-top: 50px">
<h3>Period <small><?php echo $class['periodo']; ?></small></h3>
<h3>Institution <small><?php echo $class['instituicao']; ?></small></h3>
<h3>Course <small><?php echo $class['curso']; ?></small></h3>
<h3>Number of students <small><?php echo $class['nalunos']; ?></small></h3>
<h3>URL <small><a href ="<?php echo $class['url']; ?>" target ="_blank"><?php echo $class['url']; ?></a></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($class['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/ensino/form/" . $class['ensino_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit class</button></a>
<?php
	if($class['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/ensino/enable_disable/".$class['ensino_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/ensino/enable_disable/".$class['ensino_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>