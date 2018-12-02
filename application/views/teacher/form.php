<?php 
    if ($this->session->userdata('type') == 'A') {
        echo "<a href=\"".base_url()."index.php/admin"."\"><button style =\"margin-left: 10px;\" type=\"button\" class=\"btn btn-warning\">Get Back</button></a>";
    }
?>
<div class ="container">
    <h1 style ="text-align: center;"><?php echo $title ?></h1>

    <?php        
        echo "<div class =\"col-md-6 col-md-offset-2\">";
            $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'role' => 'form');
            echo form_open_multipart(base_url() ."index.php/teacher/form/".$id_docente, $attributes);        

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Full Name*: ", "nome", $attributes);
                    $data = array(
                        "name" => "nome",
                        "id" => "nome",
                        "class" => "form-control input-sm",
                        "value" => set_value("nome", $nome),
                        "placeholder" => "Insert your Full Name"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("nome");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Password*: ", "password", $attributes);
                    $data = array(
                        "name" => "password",
                        "id" => "password",
                        "class" => "form-control input-sm",
                        "value" => set_value("password"),
                        "placeholder" => "Insert your Password"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_password($data);
                    echo "</div>";
                    echo form_error("password");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Confirm Password*: ", "confpassword", $attributes);
                    $data = array(
                        "name" => "confpassword",
                        "id" => "confpassword",
                        "class" => "form-control input-sm",
                        "value" => set_value("confpassword"),
                        "placeholder" => "Confirm your Password"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_password($data);
                    echo "</div>";
                    echo form_error("confpassword");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Email*: ", "email", $attributes);
                    $data = array(
                        "name" => "email",
                        "id" => "email",
                        "class" => "form-control input-sm",
                        "value" => set_value("email", $email),
                        "placeholder" => "Insert your Email"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("email");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Website: ", "website", $attributes);
                    $data = array(
                        "name" => "website",
                        "id" => "website",
                        "class" => "form-control input-sm",
                        "value" => set_value("website", $website),
                        "placeholder" => "Insert your Website"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("website");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Contact: ", "contato", $attributes);
                    $data = array(
                        "name" => "contato",
                        "id" => "contato",
                        "class" => "form-control input-sm",
                        "value" => set_value("contato", $contato),
                        "placeholder" => "Insert your Contact"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_input($data);
                    echo "</div>";
                    echo form_error("contato");
                echo "</div>";
                
                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Personal Information: ", "info_pessoal", $attributes);
                    $data = array(
                        "name" => "info_pessoal",
                        "id" => "info_pessoal",
                        "class" => "form-control input-sm",
                        "value" => set_value("info_pessoal", $info_pessoal),
                        "placeholder" => "Insert your Personal Information"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_textarea($data);
                    echo "</div>";
                    echo form_error("info_pessoal");
                echo "</div>";

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Academic Background: ", "info_academica", $attributes);
                    $data = array(
                        "name" => "info_academica",
                        "id" => "info_academica",
                        "class" => "form-control input-sm",
                        "value" => set_value("info_academica", $info_academica),
                        "placeholder" => "Insert your Academic Background"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_textarea($data);
                    echo "</div>";
                    echo form_error("info_academica");
                echo "</div>"; 

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Personal Hobbies: ", "info_hobbies", $attributes);
                    $data = array(
                        "name" => "info_hobbies",
                        "id" => "info_hobbies",
                        "class" => "form-control input-sm",
                        "value" => set_value("info_hobbies", $info_hobbies),
                        "placeholder" => "Insert your Personal Hobbies"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_textarea($data);
                    echo "</div>";
                    echo form_error("info_hobbies");
                echo "</div>";  

                echo "<div class=\"form-group\">";
                    $attributes = array('class' => 'col-sm-4 control-label');
                    echo form_label("Photo: ", "foto", $attributes);
                    $data = array(
                        "name" => "foto",
                        "id" => "foto",
                        "class" => "form-control input-sm",
                        "value" => set_value("foto"),
                        "placeholder" => "Insert your Photo"
                    );
                    echo "<div class=\"col-sm-8\">";
                        echo form_upload($data);
                    echo "</div>";
                    echo form_error("foto");
                    echo $erros_upload;
                echo "</div>";   

            echo "<div class=\"form-group\">";
                echo "<div class=\"col-sm-offset-2 col-sm-10\">";
                $attributes = array('class' => 'btn btn-sm btn-primary', 'name' => "addArtigo", 'value' => 'Save ' .$title);
                echo form_submit($attributes);
                echo "</div>";
            echo "</div>";
            //echo validation_errors();
            echo form_close();
        echo "</div>";
    ?>
    
</div>