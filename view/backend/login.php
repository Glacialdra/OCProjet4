<?php $title = 'Alaska - admin'; ?>
<h1>Bienvenue. Veuillez vous identifier.</h1>


    <form method="post" action="index.php?action=authentification">
        
        <label class="id-form">Identifiant :</label>
        <input type="text" name="username" >

        <label class="id-form">Mot de passe :</label>
        <input type="password" name="password">
        
        <button type="submit" class="btn id-form btn-primary" name="login_btn">S'identifier</button>
        
    </form>

<?php $content = ob_get_clean(); ?>
<?php require('view\backend\template.php'); ?>