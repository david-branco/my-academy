<div class ="container">
<h1 style ="text-align: center"><?php echo $proc['titulo']; ?></h1>
<div style ="margin-top: 50px">

<h3>Date <small><?php echo $proc['data_data']; ?></small></h3>
<h3>Authors <small><?php echo $proc['autores']; ?></small></h3>
<h3>Book Title <small><?php echo $proc['titulo_livro']; ?></small></h3>
<h3>Local <small><?php echo $proc['local']; ?></small></h3>
<h3>URL <small><?php echo $proc['urls']; ?></small></h3>
<h3>ISBN <small><?php echo $proc['isbn']; ?></small></h3>
<h3>DOI <small><?php echo $proc['doi']; ?></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($proc['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/procedimento/form/" . $proc['procedimento_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit proceeding</button></a>
<?php
	if($proc['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/procedimento/enable_disable/".$proc['procedimento_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/procedimento/enable_disable/".$proc['procedimento_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>