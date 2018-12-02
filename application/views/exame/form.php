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
            $("#data_exame" ).datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>

    <?php        
        echo "<div class =\"col-md-6 col-md-offset-2\">";
            $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'role' => 'form');
            echo form_open_multipart(base_url() ."index.php/exame/form/".$id_exame, $attributes);        

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
                    echo form_label("Degree*: ", "tipo", $attributes);
                    $data = array(
                        "1" => "PhD",
                        "2" => "MsC",
                        "3" => "Other"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_dropdown('tipo', $data, $tipo, 'class="form-control input-sm"');
                    echo "</div>";
                    echo form_error("tipo");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Student Name*: ", "nome_estudante", $attributes);
                    $data = array(
                        "name" => "nome_estudante",
                        "id" => "nome_estudante",
                        "class" => "form-control input-sm",
                        "value" => set_value("nome_estudante", $nome_estudante),
                        "placeholder" => "Insert the Student Name"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("nome_estudante");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Student identifier: ", "id_estudante", $attributes);
                    $data = array(
                        "name" => "id_estudante",
                        "id" => "id_estudante",
                        "class" => "form-control input-sm",
                        "value" => set_value("id_estudante", $id_estudante),
                        "placeholder" => "Insert the Student identifier"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("id_estudante");
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
                    echo form_label("Thesis URL: ", "tese_url", $attributes);
                    $data = array(
                        "name" => "tese_url",
                        "id" => "tese_url",
                        "class" => "form-control input-sm",
                        "value" => set_value("tese_url", $tese_url),
                        "placeholder" => "Insert the Thesis URL"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("tese_url");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Institution*: ", "instituicao", $attributes);
                    $data = array(
                        "name" => "instituicao",
                        "id" => "instituicao",
                        "class" => "form-control input-sm",
                        "value" => set_value("instituicao", $instituicao),
                        "placeholder" => "Insert the Institution"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("instituicao");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Date*: ", "data_exame", $attributes);
                    $data = array(
                        "name" => "data_exame",
                        "id" => "data_exame",
                        "class" => "form-control input-sm",
                        "value" => set_value("data_exame", $data_exame),
                        "placeholder" => "Insert the Date"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("data_exame");
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
                $attributes = array('class' => 'btn btn-sm btn-primary', 'name' => "addExame", 'value' => 'Save ' .$title);
                echo form_submit($attributes);
                echo "</div>";
            echo "</div>";
            //echo validation_errors();
            echo form_close();
        echo "</div>";
    ?>
    
</div>