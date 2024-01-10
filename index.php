<?php

class Livre {
    public string $titre;
    public int $nbPages;
    private string $couleurCouverture;
    private bool $estTraduitEnAnglais;
    private string $type;

    public function __construct(string $titre, int $nbPages, string $couleurCouverture, bool $estTraduitEnAnglais, string $type)
    {
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->couleurCouverture = $couleurCouverture;
        $this->estTraduitEnAnglais = $estTraduitEnAnglais;
        $this->type = $type;
    }

    public function changerCouleur($couleur) {
        $this->couleurCouverture = $couleur;
    }

    public function traductionAnglais() {
        $this->estTraduitEnAnglais = true;
    }

    public function __toString()
    {
        $msg = "";
        $msg .= "Livre : " . $this->titre . "</br>";
        $msg .= "Nombre de pages : " . $this->nbPages . "</br>"; 
        $msg .= "Couleur de couverture : " . $this->couleurCouverture . "</br>";
        if ($this->estTraduitEnAnglais) {
            $msg .= "Livre traduit en anglais.</br>";
        } else {
            $msg .= "Livre non traduit en anglais.</br>";
        }
        return $msg;
    }

    public function ajouterPages($nbAAjouter) {
        $this->nbPages += $nbAAjouter;
    }

    public function basculerEnAnglais() {
        $this->traductionAnglais();
        $this->ajouterPages(5);
        $this->changerCouleur("verte");
    }

    /**
     * Get the value of couleurCouverture
     *
     * @return string
     */
    public function getCouleurCouverture(): string {
        return $this->couleurCouverture;
    }

    /**
     * Set the value of couleurCouverture
     *
     * @param string $couleurCouverture
     *
     * @return self
     */
    public function setCouleurCouverture(string $couleurCouverture): self {
        $this->couleurCouverture = $couleurCouverture;
        return $this;
    }

    /**
     * Get the value of estTraduitEnAnglais
     *
     * @return bool
     */
    public function getEstTraduitEnAnglais(): bool {
        return $this->estTraduitEnAnglais;
    }

    /**
     * Set the value of estTraduitEnAnglais
     *
     * @param bool $estTraduitEnAnglais
     *
     * @return self
     */
    public function setEstTraduitEnAnglais(bool $estTraduitEnAnglais): self {
        $this->estTraduitEnAnglais = $estTraduitEnAnglais;
        return $this;
    }

    /**
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }
}

class Bibliotheque {
    private array $livres;

    public function ajouterUnLivre($nouveauLivre) {
        $this->livres[] = $nouveauLivre;
    }

    public function afficherLivreParType() {
        echo "*************ROMANS************</br>";
        for ($i = 0; $i < count($this->livres); $i++) {
            if ($this->livres[$i]->getType() === "roman") {
                echo $this->livres[$i] . "</br>";
            }
        }
        echo "*************BD************</br>";
        for ($i = 0; $i < count($this->livres); $i++) {
            if ($this->livres[$i]->getType() === "BD") {
                echo $this->livres[$i] . "</br>";
            }
        }
        echo "*************POLICIERS************</br>";
        for ($i = 0; $i < count($this->livres); $i++) {
            if ($this->livres[$i]->getType() === "policier") {
                echo $this->livres[$i] . "</br>";
            }
        }
    }
}

$livre1 = new Livre("1", 500, "noir", false, "roman");
$livre2 = new Livre("2", 400, "bleu", true, "BD");
$livre3 = new Livre("3", 650, "vert", true, "policier");
$livre4 = new Livre("4", 300, "rouge", false, "BD");
$livre5 = new Livre("5", 550, "bleu", true, "roman");
$livre6 = new Livre("6", 450, "noir", false, "policier");

$biblio = new Bibliotheque();
$biblio->ajouterUnLivre($livre1);
$biblio->ajouterUnLivre($livre2);
$biblio->ajouterUnLivre($livre3);
$biblio->ajouterUnLivre($livre4);
$biblio->ajouterUnLivre($livre5);
$biblio->ajouterUnLivre($livre6);

$biblio->afficherLivreParType();