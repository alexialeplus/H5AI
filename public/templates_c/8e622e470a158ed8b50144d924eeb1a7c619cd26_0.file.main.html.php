<?php
/* Smarty version 3.1.30, created on 2018-02-09 10:41:22
  from "C:\wamp64\www\my_h5ai\views\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a7d7ad2832293_60135522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e622e470a158ed8b50144d924eeb1a7c619cd26' => 
    array (
      0 => 'C:\\wamp64\\www\\my_h5ai\\views\\main.html',
      1 => 1518172603,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7d7ad2832293_60135522 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>My H5ai</title>
    <link rel="stylesheet" href="http://localhost/my_h5ai/public/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://localhost/my_h5ai/public/script.js"><?php echo '</script'; ?>
>
</head>
<body>

    <div class="container">
        <nav class="navbar navbar-dark bg-dark text-white mb-4">
            <p>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['path']->value, 'track', false, 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value => $_smarty_tpl->tpl_vars['track']->value) {
?>
                    <a href=<?php echo $_smarty_tpl->tpl_vars['track']->value;?>
> <?php echo $_smarty_tpl->tpl_vars['file']->value;?>
 </a> >
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </p>
            <h1 class="font-weight-light"> My H5ai </h1>
        </nav>

        <main id="main" class="row">
            <div id="head">
                <p class="col-4 offset-4"> Nom </p>
                <p class="col-2"> Modifié le </p>
                <p class="col-2"> Taille </p>
            </div>
            <div id="left" class="col-4">
                <?php echo $_smarty_tpl->tpl_vars['listFolders']->value;?>

            </div>
            <div id="right" class="col-8">
                <div id="rightContent">
                    <?php echo $_smarty_tpl->tpl_vars['listFiles']->value;?>

                </div>
            </div>
        </main>

        <div id="overlay">
            <p> Coucou </p>
        </div>
    </div>

</body>
</html><?php }
}
