<div class ="container">
<h1 style ="text-align: center"><?php echo $artigo['titulo']; ?></h1>
<div style ="margin-top: 50px">

<h3>Date <small><?php echo $artigo['data_data']; ?></small></h3>
<h3>Authors <small><?php echo $artigo['autores']; ?></small></h3>
<h3>Publication <small><?php echo $artigo['publicacao']; ?></small></h3>
<h3>Publisher <small><?php echo $artigo['editora']; ?></small></h3>
<h3>Volume <small><?php echo $artigo['volume']; ?></small></h3>
<h3>ISSN <small><?php echo $artigo['issn']; ?></small></h3>
<h3>DOI <small><?php echo $artigo['doi']; ?></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($artigo['visibilidade']); ?></small></h3>
</div>
<?php 
	if ($this->session->userdata('type') == 'A') {
		echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
	}
	else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }	
?>
<a href ="<?php echo base_url() . "index.php/artigo/form/" . $artigo['artigo_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit article</button></a>
<?php
	if($artigo['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/artigo/enable_disable/".$artigo['artigo_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/artigo/enable_disable/".$artigo['artigo_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>
