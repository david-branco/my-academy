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
            echo form_open_multipart(base_url() ."index.php/evento/form/".$id_evento, $attributes);        

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
                    echo form_label("Event Name*: ", "nome", $attributes);
                    $data = array(
                        "name" => "nome",
                        "id" => "nome",
                        "class" => "form-control input-sm",
                        "value" => set_value("nome", $nome),
                        "placeholder" => "Insert the Event Name"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("nome");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Type of Participation*: ", "tipo_participacao", $attributes);
                    $data = array(
                        "name" => "tipo_participacao",
                        "id" => "tipo_participacao",
                        "class" => "form-control input-sm",
                        "value" => set_value("tipo_participacao", $tipo_participacao),
                        "placeholder" => "Insert the Type of Participation"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("tipo_participacao");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Date: ", "data_data", $attributes);
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
                    echo form_label("Local*: ", "local", $attributes);
                    $data = array(
                        "name" => "local",
                        "id" => "local",
                        "class" => "form-control input-sm",
                        "value" => set_value("local", $local),
                        "placeholder" => "Insert the Local"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("local");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Description: ", "descricao", $attributes);
                    $data = array(
                        "name" => "descricao",
                        "id" => "descricao",
                        "class" => "form-control input-sm",
                        "value" => set_value("descricao", $descricao),
                        "placeholder" => "Insert a Description",
                        "rows" => "3"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_textarea($data);
                    echo "</div>";
                    echo form_error("descricao");
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
                $attributes = array('class' => 'btn btn-sm btn-primary', 'name' => "addEvento", 'value' => 'Save ' .$title);
                echo form_submit($attributes);
                echo "</div>";
            echo "</div>";
            //echo validation_errors();
            echo form_close();
        echo "</div>";
    ?>
    
</div>