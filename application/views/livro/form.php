<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<div class ="container">
    <h1 style ="text-align: center;"><?php echo $title ?></h1>
    <script>
        $(document).ready(function() {
            $("#data_data" ).datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>

    <?php        
        echo "<div class =\"col-md-6 col-md-offset-2\">";
            $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'role' => 'form');
            echo form_open_multipart(base_url() ."index.php/livro/form/".$id_livro, $attributes);        

                if ($this->session->userdata('type') == 'A') {
                    echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("User: ", "docente_id", $attributes);

                    $docentes = $this->teacher_model->getTeachers();
                    foreach($docentes as $docente) {
                        $data[$docente->docente_id] = "ID: " .$docente->docente_id . "  - Name: ". $docente->nome;
                    }

                    echo "<div class=\"col-sm-8\">";
                    echo form_dropdown('docente_id', $data, $docente_id , 'class="form-control input-sm"');
                    echo "</div>";
                    echo form_error("docente_id");
                    echo "</div>";     
                }

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Authors*: ", "autores", $attributes);
                    $data = array(
                        "name" => "autores",
                        "id" => "autores",
                        "class" => "form-control input-sm",
                        "value" => set_value("autores", $autores),
                        "placeholder" => "Insert the Authors",
                        "rows" => "3"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_textarea($data);
                    echo "</div>";
                    echo form_error("autores");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Editors: ", "editores", $attributes);
                    $data = array(
                        "name" => "editores",
                        "id" => "editores",
                        "class" => "form-control input-sm",
                        "value" => set_value("editores", $editores),
                        "placeholder" => "Insert the Editors",
                        "rows" => "3"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_textarea($data);
                    echo "</div>";
                    echo form_error("editores");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Title*: ", "titulo", $attributes);
                    $data = array(
                        "name" => "titulo",
                        "id" => "titulo",
                        "class" => "form-control input-sm",
                        "value" => set_value("titulo", $titulo),
                        "placeholder" => "Insert the Title"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("titulo");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Volume: ", "volume", $attributes);
                    $data = array(
                        "name" => "volume",
                        "id" => "volume",
                        "class" => "form-control input-sm",
                        "value" => set_value("volume", $volume),
                        "placeholder" => "Insert the Volume"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("volume");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Chapters: ", "capitulo", $attributes);
                    $data = array(
                        "name" => "capitulo",
                        "id" => "capitulo",
                        "class" => "form-control input-sm",
                        "value" => set_value("capitulo", $capitulo),
                        "placeholder" => "Insert the Chapters"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("capitulo");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Pages: ", "paginas", $attributes);
                    $data = array(
                        "name" => "paginas",
                        "id" => "paginas",
                        "class" => "form-control input-sm",
                        "value" => set_value("paginas", $paginas),
                        "placeholder" => "Insert the Pages"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("paginas");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Publisher*: ", "editora", $attributes);
                    $data = array(
                        "name" => "editora",
                        "id" => "editora",
                        "class" => "form-control input-sm",
                        "value" => set_value("editora", $editora),
                        "placeholder" => "Insert the Publisher"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("editora");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Date*: ", "data_data", $attributes);
                    $data = array(
                        "name" => "data_data",
                        "id" => "data_data",
                        "class" => "form-control input-sm",
                        "value" => set_value("data_data", $data_data),
                        "placeholder" => "Insert the Date"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("data_data");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("ISBN: ", "isbn", $attributes);
                    $data = array(
                        "name" => "isbn",
                        "id" => "isbn",
                        "class" => "form-control input-sm",
                        "value" => set_value("isbn", $isbn),
                        "placeholder" => "Insert the ISBN"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("isbn");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("DOI: ", "doi", $attributes);
                    $data = array(
                        "name" => "doi",
                        "id" => "doi",
                        "class" => "form-control input-sm",
                        "value" => set_value("doi", $doi),
                        "placeholder" => "Insert the DOI"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("doi");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Visibility*: ", "visibilidade", $attributes);
                    $data = array(
                        "0" => "Private",
                        "1" => "Public"
                    );
                    echo "<div class=\"col-sm-8\">";
                    echo form_dropdown('visibilidade', $data, $visibilidade, 'class="form-control input-sm"');
                    echo "</div>";
                    echo form_error("visibilidade");
                echo "</div>";                

            echo "<div class=\"form-group\">";
                echo "<div class=\"col-sm-offset-2 col-sm-10\">";
                $attributes = array('class' => 'btn btn-sm btn-primary', 'name' => "addLivro", 'value' => 'Save ' .$title);
                echo form_submit($attributes);
                echo "</div>";
            echo "</div>";
            //echo validation_errors();
            echo form_close();
        echo "</div>";
    ?>
    
</div>