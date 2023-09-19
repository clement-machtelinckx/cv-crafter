<?php
session_start();
include "../class/Cv.php";
require('../fpdf.php'); // Assurez-vous d'avoir inclus la bibliothèque FPDF

// Vérifiez si le formulaire a été soumis
if (isset($_POST['save_as_pdf'])) {
    $id_cv = $_POST['id_cv'];

    // Obtenez les détails du CV en utilisant la méthode getCvDetails
    $cv = new Cv;
    $cvDetails = $cv->getCvDetails($id_cv);

    // Créez un objet PDF FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    

    // Affichez les expériences
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(40, 10, 'Expériences:');
    $pdf->Ln(); // Passer à la ligne suivante

    $pdf->SetFont('Arial', '', 12); // Réinitialisez la police
    foreach ($cvDetails['experiences'] as $experience) {
        $pdf->Cell(40, 10, 'Titre: ' . $experience['exp_title']);
        $pdf->Ln(); // Passer à la ligne suivante
        $pdf->Cell(40, 10, 'Date de début: ' . $experience['date_start']);
        $pdf->Ln(); // Passer à la ligne suivante
        $pdf->Cell(40, 10, 'Date de fin: ' . $experience['date_end']);
        $pdf->Ln(); // Passer à la ligne suivante
        $pdf->Cell(40, 10, 'Description: ' . $experience['exp_explanation']);
        $pdf->Ln(10); // Passer à la ligne suivante avec un espacement
    }

    // Affichez les formations
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(40, 10, 'Formations:');
    $pdf->Ln(); // Passer à la ligne suivante

    $pdf->SetFont('Arial', '', 12); // Réinitialisez la police
    foreach ($cvDetails['formations'] as $formation) {
        $pdf->Cell(40, 10, 'Titre: ' . $formation['forma_title']);
        $pdf->Ln(); // Passer à la ligne suivante
        $pdf->Cell(40, 10, 'Date de début: ' . $formation['date_start']);
        $pdf->Ln(); // Passer à la ligne suivante
        $pdf->Cell(40, 10, 'Date de fin: ' . $formation['date_end']);
        $pdf->Ln(); // Passer à la ligne suivante
        $pdf->Cell(40, 10, 'Description: ' . $formation['forma_content']);
        $pdf->Ln(10); // Passer à la ligne suivante avec un espacement
    }

    // Affichez les loisirs
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(40, 10, 'Loisirs:');
    $pdf->Ln(); // Passer à la ligne suivante

    $pdf->SetFont('Arial', '', 12); // Réinitialisez la police
    foreach ($cvDetails['loisirs'] as $loisir) {
        $pdf->Cell(40, 10, 'Titre: ' . $loisir['loisir_title']);
        $pdf->Ln(); // Passer à la ligne suivante
        $pdf->Cell(40, 10, 'Description: ' . $loisir['loisir_content']);
        $pdf->Ln(10); // Passer à la ligne suivante avec un espacement
    }

    // Générez le contenu du PDF
    $pdfContent = $pdf->Output('', 'S');
    
    // Vous pouvez également renvoyer le PDF généré au navigateur pour le téléchargement
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="cv.pdf"');
    header('../page/consult_cv.php');
    echo $pdfContent;
    exit;
}
?>
