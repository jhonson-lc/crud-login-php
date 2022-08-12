<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistema de estudiantes registrados</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.5/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.5/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.5/themes/color.css">
    <script type="text/javascript" src="jquery-easyui-1.10.5/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.5/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.5/locale/easyui-lang-es.js"></script>
</head>
<br><br>

<body>

    <form style="padding: 10px 10px 10px 20px;" action="" method="POST">
        <input id="cedula" name="CED_EST" class="easyui-textbox" label="Cedula:" style="width:20%">
        <input id="buscar" type="submit" name="buscar" value="Buscar" style="background-color: rgba(242, 243, 244, 0.5); 
        margin-left: 3px; padding:5px; border-radius: 5px;"></input>
    </form>

    <?php
    $est_cedula = "";
    if (isset($_POST['buscar'])) {
        $est_cedula = $_POST['CED_EST'];
    }
    ?>
    <main style="margin-left:20px;position:relative;">
        <table id="dg" title="Estudiantes registrados" class="easyui-datagrid" style="width:900px;height:250px" url="models/acceder.php?CED_EST=<?php echo $est_cedula ?>" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="CED_EST" width="50">Cedula</th>
                    <th field="NOM_EST" width="50">Nombre</th>
                    <th field="APE_EST" width="50">Apellido</th>
                    <th field="TEL_EST" width="50">Telefono</th>
                    <th field="DIR_EST" width="50">Dirección</th>
                </tr>
            </thead>
        </table>
        <?php
        include('models/conexion.php');
        if (empty($_SESSION['user'])) {
            echo "SESION NO INICIADA";
            die();
        } else {
            $sesion = "
            select PER_USU
            from usuarios
            where CED_USU = '" . $_SESSION["user"] . "'
            ";
            $resultado2 = mysqli_query($conn, $sesion);
            $permisoUser = mysqli_fetch_array($resultado2);
            if ($permisoUser[0] == 'ADMINISTRADOR') {
                echo '<a style="position:absolute;right:250;top:100" href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="nuevoUsuario()">Registrar Usuario</a>';
                echo '<div id="toolbar">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo estudiante</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar estudiante</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar estudiante</a>
                    <a href="models/reporte.php" class="easyui-linkbutton" iconCls="icon-remove" plain="true" target="_blank">Reporte FPDF</a>
                    <a href="phpjasperxml/examples/databasesample.php" class="easyui-linkbutton" iconCls="icon-remove" plain="true" target="_blank" onclick="reporte()">Reporte Ireport</a>
                </div>';
            }
        }
        ?>
        <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                <h3>Información del estudiante</h3>
                <div style="margin-bottom:10px">
                    <input name="CED_EST" class="easyui-textbox" maxlength="10" required="true" label="Cédula:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="NOM_EST" class="easyui-textbox" maxlength="20" required="true" label="Nombre:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="APE_EST" class="easyui-textbox" maxlength="20" required="true" label="Apellido:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="TEL_EST" class="easyui-textbox" maxlength="10" required="true" label="Teléfono:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="DIR_EST" class="easyui-textbox" maxlength="30" required="true" label="Dirección:" style="width:100%">
                </div>
            </form>
        </div>
        <div id="dlgg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttonss'">
            <form id="fmm" method="post" novalidate style="margin:0;padding:20px 50px">
                <h3>Registrar un usuario</h3>
                <div style="margin-bottom:10px">
                    <input name="cedula" class="easyui-textbox" required="true" label="Cédula:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="apellido" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="contrasena" class="easyui-textbox" required="true" label="Contraseña:" style="width:100%">
                </div>
            </form>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconcls="icon-ok" onclick="saveUser()" style="width:90px">guardar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">cancelar</a>
        </div>
        <div id="dlg-buttonss">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconcls="icon-ok" onclick="guardarUsuario()" style="width:90px">guardar usuario</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-cancel" onclick="javascript:$('#dlgg').dialog('close')" style="width:90px">cancelar</a>
        </div>
        <script type="text/javascript">
            var url;

            function newUser() {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo estudiante');
                $('#fm').form('clear');
                url = 'models/guardar.php';
            }

            function nuevoUsuario() {
                $('#dlgg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Usuario');
                $('#fmm').form('clear');
                url = 'models/guardarUsuario.php';
            }

            function editUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar estudiante');
                    $('#fm').form('load', row);
                    url = 'models/editar.php?CED_EST=' + row.CED_EST;
                    $('#dg').datagrid('reload');
                }
            }

            function saveUser() {
                $('#fm').form('submit', {
                    url: url,
                    iframe: false,
                    success: function(result) {
                        var result = eval('(' + result + ')');
                        if (!result.errorMsg) {
                            $.messager.show({
                                title: 'Exito',
                                msg: "Se guardo correctamente"
                            });
                            $('#dlg').dialog('close'); // close the dialog
                            $('#dg').datagrid('reload'); // reload the user data
                        } else {
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                    }
                });
            }

            function guardarUsuario() {
                $('#fmm').form('submit', {
                    url: url,
                    iframe: false,
                    success: function(result) {
                        var result = eval('(' + result + ')');
                        if (!result.errorMsg) {
                            $.messager.show({
                                title: 'Exito',
                                msg: "Se creó el usuario exitosamente"
                            });
                            $('#dlgg').dialog('close'); // close the dialog
                        } else {
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                    }
                });
            }

            function save() {
                var query = $('#fm').serialize();
                var url = 'models/guardar.php';
                $.post(url, query, function(response) {
                    alert(response);
                    $('#dlg').dialog('close'); // close the dialog
                    $('#dg').datagrid('reload');
                })
            }

            function destroyUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $.messager.confirm('Confirmar', 'Estás seguro de querer eliminar este estudiante?' + JSON.stringify(row), function(r) {
                        if (r) {
                            $.post('models/eliminar.php', {
                                CED_EST: row.CED_EST
                            }, function(result) {
                                if (result.success) {
                                    $('#dg').datagrid('reload'); // reload the user data
                                } else {
                                    $.messager.show({ // show error message
                                        title: 'Se Elimino',
                                        msg: result.errorMsg
                                    });
                                    $('#dg').datagrid('reload');
                                }
                            }, 'json');
                        }
                    });
                }
            }
        </script>
</body>
</main>

</html>