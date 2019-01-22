<?php

function processAddTaskForm () {

    // On vérifie qu'un formulaire a bien été envoyé
    if ((filter_has_var(INPUT_POST , 'title')) AND (filter_has_var(INPUT_POST , 'comments'))){

        // On initialise un compteur
        $i = 1;

        // On incrémente le compteur pour éviter d'écraser un fichier
        while (file_exists(TASKS_FOLDER . date('Y-m-d') . '-' . $i . '.txt')) {
            $i++;
        }

        // Pour éviter un message d'erreur
        if( !isset($_POST['categorie-1']) ){ $_POST['categorie-1'] = null; }
        if( !isset($_POST['categorie-2']) ){ $_POST['categorie-2'] = null; }
        if( !isset($_POST['categorie-3']) ){ $_POST['categorie-3'] = null; }
        if( !isset($_POST['categorie-4']) ){ $_POST['categorie-4'] = null; }

        // On crée un nouveau fichier task
        file_put_contents(TASKS_FOLDER . date('Y-m-d') . "-" . $i . ".txt", $_POST['title'] . "\n\r" . $_POST['categorie-1'] . "\n\r" . $_POST['categorie-2'] . "\n\r" . $_POST['categorie-3'] . "\n\r" . $_POST['categorie-4'] . "\n\r" . $_POST['comments']);

    };

}