<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
    else { echo "<a href=\"".base_url()."index.php/backend"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>"; }   
?>
<div class ="container">
    <h1 style ="text-align: center;"><?php echo $title ?></h1>

    <?php        
        echo "<div class =\"col-md-6 col-md-offset-2\">";
            $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'role' => 'form');
            echo form_open_multipart(base_url() ."index.php/gestao/form/".$id_gestao, $attributes);        

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
                    echo form_label("Role*: ", "cargo", $attributes);
                    $data = array(
                        "name" => "cargo",
                        "id" => "cargo",
                        "class" => "form-control input-sm",
                        "value" => set_value("cargo", $cargo),
                        "placeholder" => "Insert the Role"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("cargo");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Of*: ", "referente", $attributes);
                    $data = array(
                        "name" => "referente",
                        "id" => "referente",
                        "class" => "form-control input-sm",
                        "value" => set_value("referente", $referente),
                        "placeholder" => "Insert the Of"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("referente");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Period*: ", "periodo", $attributes);
                    $data = array(
                        "name" => "periodo",
                        "id" => "periodo",
                        "class" => "form-control input-sm",
                        "value" => set_value("periodo", $periodo),
                        "placeholder" => "Insert the Period"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("periodo");
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
                $attributes = array('class' => 'btn btn-sm btn-primary', 'name' => "addGestao", 'value' => 'Save ' .$title);
                echo form_submit($attributes);
                echo "</div>";
            echo "</div>";
            //echo validation_errors();
            echo form_close();
        echo "</div>";
    ?>
    
</div>