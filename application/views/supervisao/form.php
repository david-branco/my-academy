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
            $("#data_inicial, #data_final" ).datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>

    <?php        
        echo "<div class =\"col-md-6 col-md-offset-2\">";
            $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'role' => 'form');
            echo form_open_multipart(base_url() ."index.php/supervisao/form/".$id_supervisao, $attributes);        

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
                        "1" => "PHD",
                        "2" => "MSC",
                        "3" => "Other"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_dropdown('tipo', $data, $tipo, 'class="form-control input-sm"');
                    echo "</div>";
                    echo form_error("tipo");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Status*: ", "estado", $attributes);
                    $data = array(
                        "1" => "Undergoing",
                        "2" => "Concluded",
                        "3" => "Other"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_dropdown('estado', $data, $estado, 'class="form-control input-sm"');
                    echo "</div>";
                    echo form_error("estado");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Local: ", "local", $attributes);
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
                    echo form_label("Program Description: ", "descricao", $attributes);
                    $data = array(
                        "name" => "descricao",
                        "id" => "descricao",
                        "class" => "form-control input-sm",
                        "value" => set_value("descricao", $descricao),
                        "placeholder" => "Insert the Program Description"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("descricao");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Program Address: ", "endereco", $attributes);
                    $data = array(
                        "name" => "endereco",
                        "id" => "endereco",
                        "class" => "form-control input-sm",
                        "value" => set_value("endereco", $endereco),
                        "placeholder" => "Insert the Program Address"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("endereco");
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
                    echo form_label("Co-Supervisor Name: ", "nome_coadjuvante", $attributes);
                    $data = array(
                        "name" => "nome_coadjuvante",
                        "id" => "nome_coadjuvante",
                        "class" => "form-control input-sm",
                        "value" => set_value("nome_coadjuvante", $nome_coadjuvante),
                        "placeholder" => "Insert the Co-Supervisor Name"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("nome_coadjuvante");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Co-Supervisor Instituition: ", "instituicao_coadjuvante", $attributes);
                    $data = array(
                        "name" => "instituicao_coadjuvante",
                        "id" => "instituicao_coadjuvante",
                        "class" => "form-control input-sm",
                        "value" => set_value("instituicao_coadjuvante", $instituicao_coadjuvante),
                        "placeholder" => "Insert the Co-Supervisor Instituition"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("instituicao_coadjuvante");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Begin Date: ", "data_inicial", $attributes);
                    $data = array(
                        "name" => "data_inicial",
                        "id" => "data_inicial",
                        "class" => "form-control input-sm",
                        "value" => set_value("data_inicial", $data_inicial),
                        "placeholder" => "Insert the Begin Date"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("data_inicial");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("End Date: ", "data_final", $attributes);
                    $data = array(
                        "name" => "data_final",
                        "id" => "data_final",
                        "class" => "form-control input-sm",
                        "value" => set_value("data_final", $data_final),
                        "placeholder" => "Insert the End Date"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("data_final");
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
                $attributes = array('class' => 'btn btn-sm btn-primary', 'name' => "addSupervisao", 'value' => 'Save ' .$title);
                echo form_submit($attributes);
                echo "</div>";
            echo "</div>";
            //echo validation_errors();
            echo form_close();
        echo "</div>";
    ?>
    
</div>