<div class ="container">
<h1 style ="text-align: center"><?php echo $book['titulo']; ?></h1>
<div style ="margin-top: 50px">

<h3>Date <small><?php echo $book['data_data']; ?></small></h3>
<h3>Authors <small><?php echo $book['autores']; ?></small></h3>
<h3>Editors <small><?php echo $book['editores']; ?></small></h3>
<h3>Publisher <small><?php echo $book['editora']; ?></small></h3>
<h3>Chapters <small><?php echo $book['capitulo']; ?></small></h3>
<h3>Pages <small><?php echo $book['paginas']; ?></small></h3>
<h3>ISBN <small><?php echo $book['isbn']; ?></small></h3>
<h3>DOI <small><?php echo $book['doi']; ?></small></h3>
<h3>Visibility <small><?php echo $this->teacher_model->showVisibilidade($book['visibilidade']); ?></small></h3>
</div>
<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<a href ="<?php echo base_url() . "index.php/livro/form/" . $book['livro_id']; ?>"><button style ="margin-left: 10px;" type="button" class="btn btn-success">Edit book</button></a>
<?php
	if($book['visibilidade'] == 1) { echo "<a href=\"".base_url()."index.php/livro/enable_disable/".$book['livro_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Private</button></a>"; }
	else { echo "<a href=\"".base_url()."index.php/livro/enable_disable/".$book['livro_id']."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-info\">Make Public</button></a>"; }
?>
</div>