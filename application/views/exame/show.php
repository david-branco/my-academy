<div class ="container">
<h1 style ="text-align: center"><?php echo $exam['titulo']; ?></h1>
<div style ="margin-top: 50px">

<h3>Date <small><?php echo $exam['data_exame']; ?></small></h3>
<h3>Degree <small><?php echo $this->exame_model->showExameType($exam['tipo']); ?></small></h3>
<h3>Student name <small><?php echo $exam['nome_estudante']; ?></small></h3>
<h3>Institution <small><?php echo $exam['instituicao']; ?></small></h3>
<h3>Thesis URL <small><a href ="<?php echo $exam['tese_url']; ?>"><?php echo $exam['tese_url']; ?></a></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($exam['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/exame/form/" . $exam['exame_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit exam</button></a>
<?php
	if($exam['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/exame/enable_disable/".$exam['exame_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/exame/enable_disable/".$exam['exame_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>