<?php

namespace App\File;

/**
 * Created by PhpStorm.
 * User: leetspeakv2
 * Date: 06/01/17
 * Time: 10:58
 */
class FileManager{
    private $imgFolder;
    private $cvFolder;
    private $extensionCV;
    private $extensionIMG;

    public function __construct(){
        // Folders
        $this->cvFolder = __DIR__.'/../../../public/assets/';
        $this->imgFolder = __DIR__.'/../../../public/images/';

        // Files extension
        $this->extensionCV = array('.pdf');
        $this->extensionIMG = array('.jpeg', '.jpg', '.png');
    }

    /**
     * Fonction permettant d'enregistrer un CV sur le serveur
     * @return bool|string
     */
    public function cvUpload(){
        $extension = strrchr($_FILES['cv']['name'], '.');
        if(in_array($extension, $this->extensionCV)){
            $fichier = basename($_FILES['cv']['name']);
            if(move_uploaded_file($_FILES['cv']['tmp_name'], $this->cvFolder.$fichier)){
                return TRUE;
            }
            else{
                return "Erreur lors de l'enregistrement du fichier";
            }
        }
        else{
            return "Mauvais type de fichier";
        }
    }

    /**
     * Enregistre une image sur le serveur
     * @param $i
     * @return bool|string
     */
    public function imgUpload($i){
        $extension = strrchr($_FILES['image']['name'][$i], '.');
        if(in_array($extension, $this->extensionIMG)){
            $fichier = basename($_FILES['image']['name'][$i]);
            if(move_uploaded_file($_FILES['image']['tmp_name'][$i], $this->imgFolder.$fichier)){
                return TRUE;
            }
            else{
                return "Erreur lors de l'enregistrement du fichier";
            }
        }
        else{
            return "Mauvais type de fichier";
        }
    }
}